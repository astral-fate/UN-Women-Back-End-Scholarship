<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
  <h2>Alerts</h2>

<?php
$status = 'warning';
if ($status == "success") {
?>
    <div class="alert alert-success">
        <strong>Success!</strong> This alert box could indicate a successful or positive action.
    </div>
<?php
} elseif ($status == "warning") {
?>
    <div class="alert alert-warning">
        <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    </div>

<?php
}
?>

</div>
</body>
