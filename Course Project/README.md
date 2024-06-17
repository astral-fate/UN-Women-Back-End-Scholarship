# Education Website Project

## Table of Contents
- [Requirements](#Requirements)
- [Database Schema](#Database-Schema)
- [Admin Panel](#Admin-Panel)
- [Filteration & Pagination](#Filteration-&-Pagination)

## Requirements
Components

## Admin Panel

### Sign Up ✅

### Log in

### Add User ✅

### Edit User ✅

### Add Categories ✅

### Manage Categories 

### Add Meetings ✅

### Manage Meetings

## Displaying the name of the logged in user ✅




```

if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];
    try {
        $sql = "SELECT `name` FROM `users` WHERE `Email` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $fullName = $user['name'];
        } else {
            $fullName = "User";
        }
    } catch(PDOException $e) {
        $msg = $e->getMessage();
        $alertType = "alert-danger";
    }
} else {
    $fullName = "Guest";
}
?>


Displaying the name of the logged in user

          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo htmlspecialchars($fullName); ?></h2>
          </div>

```

<img width="755" alt="image" src="https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/2c268d6a-15f9-4d74-82d2-097c7a3f7292">

<img width="956" alt="image" src="https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/59e947e1-2c81-4dcb-94e2-94ade9ecb647">


