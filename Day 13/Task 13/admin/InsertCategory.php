<?php
	session_start();
	include_once('includes/checkLogged.php');
	$page="category";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        include_once('includes/conn.php');
        try{
            $sql = "INSERT INTO `categories`(`category_name`) VALUES (?)";
			$category_name = $_POST['category_name'];
            $stmt = $conn->prepare($sql);
            $stmt->execute([$category_name]);
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
		<title>Insert Category</title>
	</head>

	<body>
		<?php
			include_once('includes/nav.php');
			include_once('includes/alert.php');
		?>
		<div class="container">
			<form method="POST" action="" class="m-auto" style="max-width:600px">
				<h3 class="my-4">Insert Category</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row">
					<label for="category_name" class="col-md-5 col-form-label">Category Name</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="category_name" name="category_name" required>
					</div>
				</div>
				
				<div class="form-group mb-3 row">
					<label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7">
						<button class="btn btn-primary btn-lg" type="submit">Insert</button>
					</div>
				</div>
			</form>
		</div>
	</body>

</html>