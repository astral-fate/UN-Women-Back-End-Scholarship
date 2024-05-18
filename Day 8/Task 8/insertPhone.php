<?php
include_once('conn.php');
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert New Phone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){

  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $email = $_POST['email'];  
  
  try {
     
      $sql = "INSERT INTO users (name, mobile, address, email) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$name, $mobile, $address, $email]);
      echo "Record inserted successfully";
  } catch(PDOException $e) {
      $msg = $e->getMessage();
      echo "Error: " . $msg;
  }
}
?>

<div class="container">
  <h2>Insert New Phone</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
