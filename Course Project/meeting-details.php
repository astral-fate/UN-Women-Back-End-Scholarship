<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

try {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;dbname=project_r10", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Get the course ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$course) {
        throw new Exception("Course not found");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education Template - Meeting Detail Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php" class="logo">Edu Meeting</a>
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="meetings.php" class="active">Meetings</a></li>
                            <li><a href="index.php">Apply Now</a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="meetings.php">Upcoming Meetings</a></li>
                                    <li><a href="meeting-details.php">Meeting Details</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php">Courses</a></li>
                            <li><a href="index.php">Contact Us</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <section class="heading-page header-text" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Get all details</h6>
                    <h2><?php echo htmlspecialchars($course['Title']); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="meeting-single-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span><?php echo htmlspecialchars($course['Price']); ?>$</span>
                                    </div>
                                    <div class="date">
                                        <h6><?php echo date('F', strtotime($course['Date'])); ?> <span><?php echo date('d', strtotime($course['Date'])); ?></span></h6>
                                    </div>
                                    <a href="meeting-details.php"><img src="assets/images/<?php echo htmlspecialchars($course['Image']); ?>" alt="Course Image"></a>
                                </div>
                                <div class="down-content">
                                    <a href="meeting-details.php"><h4><?php echo htmlspecialchars($course['Title']); ?></h4></a>
                                    <p><?php echo htmlspecialchars($course['Content']); ?></p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="hours">
                                                <h5>Hours</h5>
                                                <p>Monday - Friday: 07:00 AM - 13:00 PM<br>Saturday- Sunday: 09:00 AM - 15:00 PM</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="location">
                                                <h5>Location</h5>
                                                <p><?php echo htmlspecialchars($course['Location']); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="book now">
                                                <h5>Book Now</h5>
                                                <p>010-020-0340<br>090-080-0760</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="share">
                                                <h5>Share:</h5>
                                                <ul>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#">Twitter</a>,</li>
                                                    <li><a href="#">Linkedin</a>,</li>
                                                    <li><a href="#">Behance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="main-button-red">
                                <a href="meetings.php">Back To Meetings List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
