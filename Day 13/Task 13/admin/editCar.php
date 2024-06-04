<?php
session_start();
include_once('includes/checkLogged.php');
include_once('includes/conn.php');
$page = "cars";

// get all categories
$sql = "SELECT * FROM `categories`";
$stmtCat = $conn->prepare($sql);
$stmtCat->execute();
$result = $stmtCat->fetchAll();

// Fetch the car details to edit
$carId = $_GET['id'];
$sql = "SELECT * FROM cars WHERE id = ?";
$stmtCar = $conn->prepare($sql);
$stmtCar->execute([$carId]);
$car = $stmtCar->fetch();

$title = $car['title'];
$content = $car['content'];
$model = $car['model'];
$price = $car['price'];
$type = $car['type'];
$consumption = $car['consumption'];
$options = $car['options'];
$cat_id = $car['cat_id'];
$published = $car['published'];
$image = $car['image'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once('includes/upload.php');
    $title = $_POST['title'];
    $content = $_POST['content'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $consumption = $_POST['consumption'];
    $options = $_POST['options'];
    $cat_id = $_POST['cat_id'];
    $published = isset($_POST['published']) ? 1 : 0;
    $image_name = !empty($image_name) ? $image_name : $image;

    try {
        $sql = "UPDATE cars SET title = ?, cat_id = ?, price = ?, image = ?, content = ?, model = ?, type = ?, consumption = ?, options = ?, published = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $cat_id, $price, $image_name, $content, $model, $type, $consumption, $options, $published, $carId]);
        $msg = "Updated Successfully";
        $alertType = "alert-success";
    } catch (PDOException $e) {
        $msg = $e->getMessage();
        $alertType = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('includes/head.php') ?>
    <title>Edit Car</title>
</head>

<body>
    <?php
    include_once('includes/nav.php');
    include_once('includes/alert.php');
    ?>
    <div class="container">
        <form method="POST" action="" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
            <h3 class="my-4">Edit Car</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="title2" class="col-md-5 col-form-label">Car Title</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="title2" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="content4" class="col-md-5 col-form-label">Content</label>
                <div class="col-md-7">
                    <textarea class="form-control form-control-lg" id="content4" name="content" required><?php echo htmlspecialchars($content); ?></textarea>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="price6" class="col-md-5 col-form-label">Price</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="price6" name="price" value="<?php echo htmlspecialchars($price); ?>">
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="model6" class="col-md-5 col-form-label">Model</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="model6" name="model" value="<?php echo htmlspecialchars($model); ?>">
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
                <div class="col-md-7">
                    <select class="form-select custom-select form-control" id="select-option1" name="type">
                        <option value="">Please select the type</option>
                        <option value="1" <?php echo $type == 1 ? 'selected' : ''; ?>>Auto</option>
                        <option value="0" <?php echo $type == 0 ? 'selected' : ''; ?>>Manual</option>
                    </select>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="options" class="col-md-5 col-form-label">Properties</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="options" name="options" value="<?php echo htmlspecialchars($options); ?>">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="category_name" class="col-md-5 col-form-label">Category</label>
                <div class="col-md-7">
                    <select name="cat_id" id="category_name" class="form-control">
                        <option value="">Please select car</option>
                        <?php
                        foreach ($result as $row) {
                            $category = $row['category_name'];
                            $catid = $row['id'];
                        ?>
                            <option value="<?php echo $catid ?>" <?php echo $catid == $cat_id ? 'selected' : ''; ?>><?php echo $category ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="consumption" class="col-md-5 col-form-label">Consumption</label>
                <div class="col-md-7">
                    <input type="number" class="form-control form-control-lg" id="consumption" name="consumption" value="<?php echo htmlspecialchars($consumption); ?>">
                </div>
            </div>
            <hr class="my-4" />
            <div>
                <label for="image" class="col-md-5 col-form-label">Select Image</label>
                <input type="file" id="image" name="image" accept="image/*">
                <?php if (!empty($image)) { ?>
                    <div>
                        <img src="uploads/<?php echo htmlspecialchars($image); ?>" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                    </div>
                <?php } ?>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="published" class="col-md-5 col-form-label">Published</label>
                <div class="col-md-7">
                    <input type="checkbox" class="form-control form-control-lg" id="published" name="published" <?php echo $published == 1 ? 'checked' : ''; ?>>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="insert10" class="col-md-5 col-form-label"></label>
                <div class="col-md-7">
                    <button class="btn btn-primary btn-lg" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
