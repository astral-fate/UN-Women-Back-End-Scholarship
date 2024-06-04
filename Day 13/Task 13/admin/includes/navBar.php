<?php
$page = 'home';
?>

<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="index.php" class="navbar-brand">
                <h1 class="text-uppercase text-primary mb-1"><?php echo $title = 'ROYAL CARS - Car Rental php Template';?></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <d class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?php echo $page == 'home' ? 'active' : ''; ?>">Home</a>
                        <a href="about.php" class="nav-item nav-link <?php echo $page == 'about' ? 'active' : ''; ?>">About</a>
                        <a href="service.php" class="nav-item nav-link <?php echo $page == 'service' ? 'active' : ''; ?>">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?php echo $page == 'cars' ? 'active' : ''; ?>" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.php" class="dropdown-item <?php echo $page == 'car listing' ? 'active' : ''; ?>">Car Listing</a>
                                <a href="detail.php" class="dropdown-item <?php echo $page == 'car detail' ? 'active' : ''; ?>">Car Detail</a>
                                <a href="booking.php" class="dropdown-item <?php echo $page == 'car booking' ? 'active' : ''; ?>">Car Booking</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?php echo $page == 'page' ? 'active' : ''; ?>" data-toggle="dropdown">Page</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="team.php" class="dropdown-item <?php echo $page == 'team' ? 'active' : ''; ?>">The Team</a>
                                <a href="testimonial.php" class="dropdown-item <?php echo $page == 'testimonial' ? 'active' : ''; ?>">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link <?php echo $page == 'contact' ? 'active' : ''; ?>">Contact</a>
                
            </div>
        </nav>
    </div>
</div>
