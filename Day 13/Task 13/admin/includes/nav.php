
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">UNW Car Rental</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li class="dropdown <?php echo $page == "user" ? 'active' : '' ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="users.php">Users List</a></li>
          <li><a href="insertUser.php">Add User</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo $page == "cars" ? 'active' : '' ?>""><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cars.php">Car List</a></li>
          <li><a href="InsertCar.php">Add Car</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo $page == "category" ? 'active' : '' ?>""><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="categories.php">Category List</a></li>
          <li><a href="InsertCategory.php">Add Category</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>