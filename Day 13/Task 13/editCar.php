<?php
session_start();
include_once('includes/checkLogged.php');
include_once('includes/conn.php');
$page = "cars";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedTitle = $_POST['title'];
    $content = $_POST['content'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $consumption = $_POST['consumption'];
    $options = $_POST['options'];
    $cat_id = $_POST['cat_id'];
    $published = isset($_POST['published']) ? 1 : 0;
    $featured = isset($_POST['featured']) ? 1 : 0;

    if (!empty($_FILES['image']['name'])) {
        include_once('includes/upload.php');
    } else {
        $image_name = $_POST['oldImage'];
    }

    try {
        $sql = "UPDATE `cars` SET `title`=?, `image`=?, `content`=?, `model`=?, `type`=?, `consumption`=?, `options`=?, `cat_id`=?, `published`=?, `featured`=? WHERE `id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$updatedTitle, $image_name, $content, $model, $type, $consumption, $options, $cat_id, $published, $featured, $id]);
        $msg = "Updated Successfully";
        $alertType = "alert-success";
    } catch (PDOException $e) {
        $msg = $e->getMessage();
        $alertType = "alert-danger";
    }
}

try {
    $sql = "SELECT * FROM `cars` WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    $alertType = "alert-danger";
}

// Fetch categories
try {
    $sql = "SELECT * FROM `categories`";
    $stmtCat = $conn->prepare($sql);
    $stmtCat->execute();
    $result = $stmtCat->fetchAll();
} catch (PDOException $e) {
    $msg = $e->getMessage();
    $alertType = "alert-danger";
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
                    <input type="text" class="form-control form-control-lg" id="title2" name="title" value="<?php echo $car['title']; ?>" required>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="content4" class="col-md-5 col-form-label">Content</label>
                <div class="col-md-7">
                    <textarea class="form-control form-control-lg" id="content4" name="content" required><?php echo $car['content']; ?></textarea>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="price6" class="col-md-5 col-form-label">Price</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="price6" name="price" value="<?php echo $car['price']; ?>">
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="model6" class="col-md-5 col-form-label">Model</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="model6" name="model" value="<?php echo $car['model']; ?>">
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
                <div class="col-md-7">
                    <select class="form-select custom-select form-control" id="select-option1" name="type">
                        <option value="1" <?php echo $car['type'] ? 'selected' : ''; ?>>Auto</option>
                        <option value="0" <?php echo !$car['type'] ? 'selected' : ''; ?>>Manual</option>
                    </select>
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="options" class="col-md-5 col-form-label">Properties</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-lg" id="options" name="options" value="<?php echo $car['options']; ?>">
                </div>
            </div>
            <hr class="bg-transparent border-0 py-1" />
            <div class="form-group mb-3 row">
                <label for="category_name" class="col-md-5 col-form-label">Category</label>
                <div class="col-md-7">
                    <select name="cat_id" id="category_name" class="form-control">
                        <?php
                        foreach ($result as $row) {
                            $category = $row['category_name'];
                            $catid = $row['id'];
                            $selectedCar = ($catid == $car['cat_id']) ? 'selected' : '';
                            echo "<option value=\"$catid\" $selectedCar>$category</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="consumption" class="col-md-5 col-form-label">Consumption</label>
                <div class="col-md-7">
                    <input type="number" class="form-control form-control-lg" id="consumption" name="consumption" value="<?php echo $car['consumption']; ?>">
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="published" class="col-md-5 col-form-label">Published</label>
                <div class="col-md-7">
                    <input type="checkbox" class="form-control form-control-lg" id="published" name="published" <?php echo $car['published'] ? 'checked' : ''; ?>>
                </div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row">
                <label for="featured" class="col-md-5 col-form-label">Featured</label>
                <div class="col-md-7">
                    <input type="checkbox" class="form-control form-control-lg" id="featured" name="featured" <?php echo $car['featured'] ? 'checked' : ''; ?>>
                </div>
            </div>
            <hr class="my-4" />
            <div>
                <p><img src="../img/<?php echo $car['image']; ?>" alt=""></p>
                <label for="image" class="col-md-5 col-form-label">Select Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <hr class="my-4" />
            <input type="hidden" value="<?php echo $car['image']; ?>" name="oldImage">
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
