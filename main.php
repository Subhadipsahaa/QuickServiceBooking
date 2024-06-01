<?php
require 'Admin/dbcon.php';
require 'sessionstart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_SESSION['muser'])) {
        $uemail_id = $_SESSION['muser'];
        $src2 = "SELECT u_id ,name ,contact ,area ,city ,dist ,state ,pin,landmark FROM user WHERE  email='$uemail_id'";
        $rs2 = mysqli_query($conn, $src2) or die(mysqli_error($conn));
        if (mysqli_num_rows($rs2) > 0) {
            $rec2 = mysqli_fetch_assoc($rs2);
        }
    }
    ?>
    <div class="navwrapper">
        <nav class="navbar">
            <ul>
                <!-- <li class="navele"><button type="button" class="nnavbtn"><img src="img/logo.png" alt="logopng" style="width: 150px; height: 55px;"></button></li> -->
                <li class="navele"><button type="button" class="nnavbtn">Home</button></li>
                <li class="navele"><button type="button" class="nnavbtn">News</button></li>
                <li class="navele"><button type="button" class="nnavbtn">Contact</button></li>
                <?php
                if (isset($_SESSION['muser'])) {
                ?>
                    <!-- <button type="button" class="nnavbtn">Profile</button> -->
                    <li class="navele photo"> 
                        <i class="fa-solid fa-user icon1"></i>
                        <!-- <img src="img/slide/img1.jpg" alt="" class="icon1"> -->
                    </button></li>
                    <li class="navele">
                        <a class=" dropdown-toggle nnavbtn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">


                            <?php echo "Hi, " . $rec2['name']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>

                    <?php
                } else {
                    ?>
                        <button type="button" class="lnnavbtn" data-toggle="modal" data-target="#exampleModal">Log in</button>
                    <?php
                }
                    ?>
                    </li>
            </ul>
        </nav>
    </div>
    <div class="divbox">
        <div class="imgslider">
            <form class="searchsection">
                <div class="icon">
                    <i class="fa-solid fa-magnifying-glass sicon"></i>
                </div>
                <input class="sinput" type="search" placeholder="Search Services" aria-label="Search">
                <button class="sbtn" type="submit">Search</button>

            </form>
        </div>
    </div>
    <div>
        <?php //print_r($rec2) ; 
        ?>
    </div>
    <main class="ncontainer">
        <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content divpop">
                    <div class="pheader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form" id="loginForm">
                            <div id="emailSection">
                                <div>
                                    <h3 class="heading">Sign Up/Sign In</Input></h3>
                                </div>
                                <div class="input">
                                    <label for="email">Enter your Email:</label>

                                    <input type="email" class="ibox" name="email" id="email" placeholder="Email" required>

                                </div>

                                <div class="btn1">
                                    <button type="button" class="bttn" id="nextButton">Next</button>
                                </div>
                            </div>

                            <div id="passwordSection" style="display: none;">
                                <div class="input">
                                    <label for="password">Enter your password:</label>
                                    <input type="password" class="ibox" name="password" id="password" placeholder="Password" required>
                                    <div class="pbttn">
                                        <a class="pbtn" href="register.php">Forgot Password</a>
                                    </div>
                                </div>

                                <div class="btn1">
                                    <input type="submit" class="bttn" name="ok" value="Sign In">
                                </div>
                            </div>
                            <!-- <div class="rdiv">
                                Not Registered? <a class="rbtn" href="register.html">Click Here</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                // Function to remove error messages
                function removeErrorMessages() {
                    $('.alert').remove(); // Remove existing error messages
                }

                $('#exampleModal').on('shown.bs.modal', function() {
                    $('#email').focus(); // Autofocus on the email input field
                });


                // Event listener for input fields
                $('#email, #password').on('input', function() {
                    removeErrorMessages(); // Remove error messages when the user starts typing again
                });

                $('#nextButton').on('click', function() {
                    var email = $('#email').val();
                    if (email) {
                        $.ajax({
                            url: 'validation.php', // current script URL
                            method: 'POST',
                            data: {
                                email: email
                            },
                            success: function(response) {
                                if (response.res == 1) {
                                    $('#emailSection').hide();
                                    $('#passwordSection').show();
                                    $('#password').focus();
                                } else {
                                    removeErrorMessages(); // Remove existing error messages
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages(); // Remove existing error messages
                                $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            }
                        });
                    }
                });
                $(document).on('keydown', function(event) {
                    if (event.which === 13) { // Check if Enter key is pressed
                        event.preventDefault(); // Prevent the default form submission behavior
                        $('#nextButton').click(); // Trigger next button click event
                        $('#loginForm').submit(); // Submit the form
                    }
                });


                $('#loginForm').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    var email = $('#email').val();
                    var password = $('#password').val();

                    if (email && password) {
                        $.ajax({
                            url: 'validation.php', // current script URL
                            method: 'POST',
                            data: {
                                email: email,
                                password: password
                            },
                            success: function(response) {
                                if (response.res == 2) {
                                    window.location.href = 'main.php'; // Redirect to the target page
                                } else {
                                    removeErrorMessages(); // Remove existing error messages
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages(); // Remove existing error messages
                                $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            }
                        });
                    }
                });
            });
        </script>
    </main>
</body>

</html>