<?php
	session_start();
	include_once('includes/checkLogged.php');
	$page="user";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
		include_once('includes/conn.php');
		$id = $_POST['id'];

		// update code
		if(isset($_POST['update'])){
			try{
				
				$fullName = $_POST['fullName'];
				$email = $_POST['email'];
				$gender = $_POST['gender'];
				$active = isset($_POST['active']);
				$sql = "UPDATE `users` SET `fullName`=?,`email`=?,`gender`=?,`active`=? WHERE id = ?";
				$stmtUpdate = $conn->prepare($sql);
				$stmtUpdate->execute([$fullName, $email, $gender, $active, $id]);
				$msg = "Updated successfully";
				$alertType = "alert-success";
			} catch(PDOException $e) {
				$msg = $e->getMessage();
				$alertType = "alert-danger";
			}
		}
		
		// get the user data
		try{
			$sql = "SELECT * FROM users WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$id]);
			$result = $stmt->fetch();
			$id = $result['id'];
			$fullName = $result['fullName'];
			$email = $result['email'];
			$gender = $result['gender'];
			$active = $result['active'];
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
		<title>Edit User</title>
	</head>

	<body>
		<?php
			include_once('includes/nav.php');
			include_once('includes/alert.php');
			if(isset($id)){
		?>
		<div class="container">
			<form action="" method="POST" class="m-auto" style="max-width:600px">
				<h3 class="my-4">Edit / Update User</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="fullName" value="<?php echo $fullName ?>" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="email" class="col-md-5 col-form-label">Email</label>
					<div class="col-md-7"><input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo $email ?>"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="password" class="col-md-5 col-form-label">Password</label>
					<div class="col-md-7"><input type="password" class="form-control form-control-lg" id="password" name="password" value=""></div>
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="male" class="col-md-5 col-form-label">Male</label>
					<div class="col-md-7"><input type="radio" id="male" value="1" name="gender" <?php echo $gender ? 'checked' : '' ?>></div>
				</div>
				<div class="form-group mb-3 row"><label for="female" class="col-md-5 col-form-label">Female</label>
					<div class="col-md-7"><input type="radio" id="female" value="0" name="gender" <?php echo $gender ? '' : 'checked' ?>></div>
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="active" class="col-md-5 col-form-label">active</label>
					<div class="col-md-7"><input type="checkbox" class="form-control form-control-lg" id="active" name="active" <?php echo $active ? 'checked' : '' ?>></div>
				</div>
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit" name="update">Update</button></div>
				</div>
			</form>
		</div>
		<?php
			}
		?>
	</body>

</html>