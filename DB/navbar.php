<?php
$uri_path=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segment=explode('/',$uri_path);
$c_page=end($uri_segment);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Home</title>
</head>
<body>
    <?php
    if(isset($_SESSION['u_info'])){
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Hi <?php echo $_SESSION['u_info']['name']; ?></a>
                </li>
                <li class="nav-item <?php if($c_page=='index.php' || $c_page==''){ echo 'active'; } ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($c_page=='view.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="view.php">View</a>
                </li>
                <li class="nav-item <?php if($c_page=='upload.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="upload.php">Upload</a>
                </li>
                <li class="nav-item <?php if($c_page=='logout.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>       
        </div>
    </nav>
    <?php
    }
    else{
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($c_page=='index.php' || $c_page==''){ echo 'active'; } ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($c_page=='login.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item <?php if($c_page=='view.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="view.php">View</a>
                </li>
            </ul>       
        </div>
    </nav>
    <?php
}
?>