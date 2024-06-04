<?php
	session_start();
	include_once('includes/checkLogged.php');
	
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        include_once('includes/conn.php');
		include_once('includes/upload.php');
        $clientName = $_POST['clientName'];
        $profession = $_POST['profession'];
        $content = $_POST['content'];

        try{
            $sql = "INSERT INTO `testimonials`(`clientName`, `profession`, `content`, `image`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$clientName, $profession, $content, $image_name]);
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
		<title>Insert Testimonials</title>
	</head>

	<body>
		<?php
			include_once('includes/nav.php');
			include_once('includes/alert.php');
		?>
		<div class="container">
			<form action="" method="POST" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Edit / Update Testimonials</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="clientName" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="profession"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required></textarea></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>