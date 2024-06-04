<?php
    session_start();
    include_once('includes/checkLogged.php');
    $page="user";
    include_once('includes/conn.php');
    try{
        $sql = "SELECT * FROM users";
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
        <th>Full Name</th>
        <th>Email</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
        foreach($stmt->fetchAll() as $row){
            $id = $row['id'] ;
            $fullName = $row['fullName'] ;
            $email = $row['email'] ;
    ?>
      <tr>
        <td><?php echo $fullName ?></td>
        <td><?php echo $email ?></td>
        <td>
            <form action="editUser.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>
