<?php
session_start();
$current_date = strtotime("2024-05-02"); // Convert the current date to a UNIX timestamp
$deadline_date = strtotime("2024-05-11"); // Convert the deadline date to a UNIX timestamp

// Compare the dates
if ($current_date > $deadline_date) {
    // If the current date is after the deadline date, display a message
    echo "<p>The deadline for submitting or modifying applications has passed.</p>";
 
    exit(); // Exit to prevent further execution of the script.
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CollegeApplication";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validation functions
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    return strlen($password) >= 8;
}

function validatePhoneNumber($phone) {
    return preg_match('/^\d{10}$/', $phone); // Validates a 10 digit number
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $department = $conn->real_escape_string($_POST['department']);

    // Validate inputs
    if (!validateEmail($email)) {
        $_SESSION['error_message'] = "Invalid email format.";
    } elseif (!validatePassword($password)) {
        $_SESSION['error_message'] = "Password must be at least 8 characters.";
    } elseif (!validatePhoneNumber($phone)) {
        $_SESSION['error_message'] = "Invalid phone number format. Please enter a 10 digit phone number.";
    } else {
        // After validating the inputs, retrieve values from the form
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $dob = $conn->real_escape_string($_POST['dob']);
        $address = $conn->real_escape_string($_POST['address']);
        $city = $conn->real_escape_string($_POST['city']);
        $state = $conn->real_escape_string($_POST['state']);
        $country = $conn->real_escape_string($_POST['country']);
        $zipcode = $conn->real_escape_string($_POST['zipcode']);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, lastname, email, password, phone, dob, address, city, state, country, zipcode, department) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssssssss", $username, $lastname, $email, $hashed_password, $phone, $dob, $address, $city, $state, $country, $zipcode, $department);
            try {
                $stmt->execute();
                $_SESSION['success_message'] = 'Registration successful! You can now log in.';
                header('Location: signin.php');
                exit();
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) { // Handle duplicate entry
                    $_SESSION['error_message'] = "This email address is already registered. Please use a different email.";
                } else {
                    $_SESSION['error_message'] = "An error occurred during registration: " . $e->getMessage();
                }
            }
            $stmt->close();
        } else {
            $_SESSION['error_message'] = "Error preparing statement: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="static/styles.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
            unset($_SESSION['success_message']);
        }
        ?>
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" required><br>
    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" required><br>
    <label for="city">City:</label><br>
    <input type="text" id="city" name="city" required><br>
    <label for="state">State:</label><br>
    <input type="text" id="state" name="state" required><br>
    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country" required><br>
    <label for="zipcode">Zip Code:</label><br>
    <input type="text" id="zipcode" name="zipcode" required><br>
    <label for="department">Department:</label><br>
    <select id="department" name="department" required>
    <option value="Engineering">Engineering</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Cybersecurity">Cybersecurity</option>
</select><br>

            <label for="pdf">Upload PDF:</label><br>
            <input type="file" id="pdf" name="pdf"><br>
            <label for="image">Upload Image:</label><br>
            <input type="file" id="image" name="image"><br>
            <button type="submit">Sign Up</button>
        </form>
        <a href="home.php">Back to Home</a>
    </div>
</body>
</html>
