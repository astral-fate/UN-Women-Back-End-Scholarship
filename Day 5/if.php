
<!DOCTYPE html>
<?php
// echo $_POST['fname'];


?>
<html>
<body>

<?php

if(isset($_POST['fname'])){

    echo '<div class="alert alert-success">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>' ;
}
?>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 
