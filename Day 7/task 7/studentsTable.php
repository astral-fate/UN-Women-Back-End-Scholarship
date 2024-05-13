<?php
include_once('conn.php');
$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Students Data</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Mobile</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>

    <?php
     foreach($stmt->fetchAll() as $row){
      echo "<tr>";
      echo '<td>' .  $row['name']; '</td>';
      echo '<td>' .  $row['phone']; '</td>';
      echo '<td>' .  $row['city']; '</td>';
      echo "<br>";
      }
     ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
