<?php
session_start();
//include_once('includes/checkLogged.php');
include_once('includes/conn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['insert'])) {  // Change from 'update' to 'insert'
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $active = isset($_POST['active']) ? 1 : 0;

        try {
            $sql = "INSERT INTO users (fullName, email, gender, active) VALUES (?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($sql);
            $stmtInsert->execute([$fullName, $email, $gender, $active]);
            $msg = "Inserted successfully";
            $alertType = "alert-success";
        } catch (PDOException $e) {
            $msg = $e->getMessage();
            $alertType = "alert-danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Insert User</title>
</head>
<body>
<?php
    //include_once('includes/nav.php');
    include_once('includes/alert.php');

    // No need to fetch user data for insertion
?>
<div class="container">
    <form action="" method="POST" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
        <h3 class="my-4">Insert New User</h3>
        <div class="form-group mb-3 row">
            <label for="title2" class="col-md-5 col-form-label">Name</label>
            <div class="col-md-7">
                <input type="text" class="form-control form-control-lg" id="title2" name="fullName" value="">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label for="email" class="col-md-5 col-form-label">Email</label>
            <div class="col-md-7">
                <input type="email" class="form-control form-control-lg" id="email" name="email" value="">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label for="password" class="col-md-5 col-form-label">Password</label>
            <div class="col-md-7">
                <input type="password" class="form-control form-control-lg" id="password" name="password" value="">
            </div>
        </div>
        <hr class="my-4">
        <div class="form-group mb-3 row">
            <label for="male" class="col-md-5 col-form-label">Male</label>
            <div class="col-md-7">
                <input type="radio" id="male" name="gender" value="1">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label for="female" class="col-md-5 col-form-label">Female</label>
            <div class="col-md-7">
                <input type="radio" id="female" name="gender" value="0">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label for="active" class="col-md-5 col-form-label">Active</label>
            <div class="col-md-7">
                <input type="checkbox" class="form-control form-control-lg" id="active" name="active">
            </div>
        </div>
        <!-- No need for hidden ID input for insertion -->
        <hr class="my-4">
        <div class="form-group mb-3 row">
            <div class="col-md-7">
                <button type="submit" name="insert" class="btn btn-primary btn-lg">Insert</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
