<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segment = explode("/", $uri_path);
$c_page = end($uri_segment);
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="../index.html">Quick Service Booking</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <!-- <li class="nav-item "><a class="nav-link" href="register.php"><i class="fa-solid fa-user-plus" style="color: #cecece;"></a></i></li> -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo 'Hi, ' . $_SESSION['user']; ?></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link <?php if ($c_page == 'dashb.php') {
                                            echo "active";
                                        } ?>" href="dashb.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?php if ($c_page == 'users.php') {
                                            echo "active";
                                        } ?>" href="users.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                        Users
                    </a>
                    <a class="nav-link <?php if ($c_page == 'bookings.php') {
                                            echo "active";
                                        } ?>" href="bookings.php">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar"></i></div>
                        Bookings
                    </a>
                    <a class="nav-link <?php if ($c_page == 'services.php') {
                                            echo "active";
                                        } ?>" href="services.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Services
                    </a>
                    <a class="nav-link <?php if ($c_page == 'sboy.php') {
                                            echo "active";
                                        } ?>" href="sboy.php">
                        <div class="sb-nav-link-icon"> <i class="fa-solid fa-truck"></i></div>
                        Service Boy
                    </a>
                    <a class="nav-link <?php if ($c_page == 'reviews.php') {
                                            echo "active";
                                        } ?>" href="reviews.php">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-star"></i></div>
                        Reviews
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Admin
            </div>
        </nav>
    </div>