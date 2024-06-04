<?php
    session_start();
    include_once('includes/checkLogged.php');
    $page="cars";
    include_once('includes/conn.php');
    try{
        $sql = "SELECT cars.id, cars.image, cars.title, categories.category_name  FROM cars INNER JOIN categories ON categories.id = cars.cat_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch(PDOException $e) {
        $msg = $e->getMessage();
        $alertType = "alert-danger";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('includes/head.php') ?>
  <title>Users</title>
</head>

<body>
<?php
    include_once('includes/nav.php');
    include_once('includes/alert.php');
?>
<div class="container">
  <h2>Users List</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Image</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
        foreach($stmt->fetchAll() as $row){
            $id = $row['id'] ;
            $image = $row['image'] ;
            $title = $row['title'] ;
            $category_name = $row['category_name'] ;
    ?>
      <tr>
        <td><?php echo $title ?></td>
        <td><?php echo $category_name ?></td>
        <td>
            <img src="../img/<?php echo $image ?>" alt="<?php echo $title ?>" style="height:100px; border-radius:5px;">
        </td>
        <td>
            <form action="editCar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" value="Edit">
            </form>
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>
