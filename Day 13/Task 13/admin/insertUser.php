<?php
	session_start();
	include_once('includes/checkLogged.php');
	$page="user";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        include_once('includes/conn.php');
		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$active = 1;

        try{
            $sql = "INSERT INTO `users`(`fullName`, `email`, `password`, `gender`, `active`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fullName, $email, $password, $gender, $active]);
            $msg = "Inserted Successfully";
            $alertType = "alert-success";
        } catch(PDOException $e) {
            $msg = $e->getMessage();
            $alertType = "alert-danger";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<?php include_once('includes/head.php') ?>
		<title>Add New User</title>
	</head>

	<body>
		<?php
			include_once('includes/nav.php');
			include_once('includes/alert.php');
		?>
		<div class="container">
			<form action="" method="POST" class="m-auto" style="max-width:600px">
				<h3 class="my-4">Add New User</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="fullName" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="email" class="col-md-5 col-form-label">Email</label>
					<div class="col-md-7"><input type="email" class="form-control form-control-lg" id="email" name="email"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="password" class="col-md-5 col-form-label">Password</label>
					<div class="col-md-7"><input type="password" class="form-control form-control-lg" id="password" name="password"></div>
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="male" class="col-md-5 col-form-label">Male</label>
					<div class="col-md-7"><input type="radio" id="male" value="1" name="gender"></div>
				</div>
				<div class="form-group mb-3 row"><label for="female" class="col-md-5 col-form-label">Female</label>
					<div class="col-md-7"><input type="radio" id="female" value="0" name="gender"></div>
				</div>
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>