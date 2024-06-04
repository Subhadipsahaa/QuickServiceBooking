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
                <li class="navele"><button type="button" class="nnavbtn" style="position: absolute; left:5vh; top:5px"><a href="hello.html"><img src="img/logo.png" alt="logopng" style="width: 100px; height: 55px;"></a></button></li>
                <!-- <li class="navele"><button type="button" class="nnavbtn">News</button></li>
                <li class="navele"><button type="button" class="nnavbtn">Contact</button></li> -->
                <?php
                if (isset($_SESSION['muser'])) {
                ?>
                    <!-- <button type="button" class="nnavbtn">Profile</button> -->
                    <!-- <li class='navele photo'>
                        <i class="fa-solid fa-user icon1"></i>
                         <img src="img/slide/img1.jpg" alt="" class="icon1">
                        <</button> 
                    </li> -->
                    <li class="navele">
                        <a class=" dropdown-toggle nnavbtn" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="display:inline;">
                        <span class='navele photo' style="position:absolute; top :-2px; right:105%;"><i class='fa-solid fa-user icon1'></i></span> 
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
                        <button type="button" class="lnnavbtn" data-toggle="modal" data-target="#exampleModal" >Log in</button>
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
                    <i class="fa-solid fa-magnifying-glass sericon"></i>
                </div>
                <input class="sinput" type="search" placeholder="Search Services" aria-label="Search">
                <button class="sbtn" type="submit">Search</button>

            </form>
        </div>
    </div>
    <div class="divservices">
        <div class="service">
            <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\women.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname">Women</p>
                    <!-- 's Salon & Spa -->
                </div>
            </div>
            <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\man.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname">Men</p>
                    <!-- 's Salon & Massage -->
                </div>
            </div>
            <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\clean.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname"> Cleaning</p>
                </div>
            </div>
            <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\applince.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname"> Appliance Repair</p>
                </div>
            </div>
            <!-- <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\pinting.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname">Painting</p>
                </div>
            </div> -->
            <div class="seritem">
                <div class="iconwrap"> <img src="img\service_icons\other.jpeg" alt="icon.png" class="sicon">
                </div>
                <div>
                    <p class="itemname">More..</p>
                    <!-- Electrician, Plumber & Carpenter -->
                </div>
            </div>
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
                                    <h3 class="heading">Sign Up/Sign In</h3>
                                </div>
                                <div class="input">
                                    <label for="email">Enter your Email:</label>
                                    <input type="email" class="ibox" name="email" id="email" placeholder="Email" required>
                                    <span class="error-message" id="emailError"></span><br>
                                </div>
                                <div class="btn1">
                                    <button type="button" class="bttn" id="nextButton">Next</button>
                                </div>
                            </div>
                            <div id="nameSection" style="display: none;">
                                <div class="input">
                                    <label for="name">Enter your Name:</label>
                                    <input type="text" class="ibox" name="name" id="name" placeholder="Name">
                                    <span class="error-message" id="nameError"></span><br>
                                </div>
                                <div class="input">
                                    <label for="contact">Enter your Contact:</label>
                                    <input type="text" class="ibox" name="contact" id="contact" placeholder="Contact">
                                    <span class="error-message" id="contactError"></span><br>
                                </div>
                                <div class="btn1">
                                    <button type="button" class="bttn" id="nextButton2">Next</button>
                                </div>
                            </div>
                            <div id="registerSection" style="display: none;">
                                <div class="input">
                                    <label for="rpassword">Enter your password:</label>
                                    <input type="password" class="ibox" name="rpassword" id="rpassword" placeholder="Password" required>
                                </div>
                                <div class="btn1">
                                    <button type="button" class="bttn" name="register" id="registerButton">Register</button>
                                    <!-- <input type="submit" class="bttn" name="ok" value=""> -->
                                </div>
                            </div>
                            <div id="passwordSection" style="display: none;">
                                <div class="input">
                                    <label for="password">Enter your password:</label>
                                    <input type="password" class="ibox" name="password" id="password" placeholder="Password">
                                    <div class="pbttn">
                                        <a class="pbtn" href="register.php">Forgot Password</a>
                                    </div>
                                </div>
                                <div class="btn1">
                                    <input type="submit" class="bttn" name="ok" value="Sign In">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script>
            function isValidEmail(email) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            $(document).ready(function() {
                function removeErrorMessages() {
                    $('.alert').remove();
                }
                $('#exampleModal').on('shown.bs.modal', function() {
                    $('#email').focus(); 
                });

                $('#email, #password').on('input', function() {
                    removeErrorMessages();
                });

                $('#email').on('input', function() {
                    removeErrorMessages(); 
                    $('#emailError').text('');
                });

                $('#name').on('input', function() {
                    $('#nameError').text('');
                    removeErrorMessages();
                });

                $('#contact').on('input', function() {
                    $('#contactError').text('');
                    removeErrorMessages();
                });

                $('#nextButton').on('click', function() {
                    var email = $('#email').val().trim(); 
                    if (email && isValidEmail(email)) {
                        $.ajax({
                            url: 'valid.php',
                            method: 'POST',
                            data: {
                                email: email
                            },
                            success: function(response) {
                                if (response.res == 1) {
                                    $('#emailSection').hide();
                                    $('#passwordSection').show();
                                    $('#password').focus();
                                } else if (response.res == 3) {
                                    $('#emailSection').hide();
                                    $('#nameSection').show();
                                    $('#name').focus();
                                } else {
                                    removeErrorMessages(); 
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages();
                                $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            }
                        });
                    } else {
                        $('#emailError').text('Please enter a valid email address.');
                    }
                });

                $('#nextButton2').on('click', function() {
                    var name = $('#name').val();
                    var contact = $('#contact').val();
                    var nameError = $('#nameError');
                    var contactError = $('#contactError');
                    var isValid = true;
                    if (name.trim() === '') {
                        nameError.text('Please fill in the name field.');
                        isValid = false;
                    } else {
                        nameError.text('');
                    }

                    if (contact.trim() === '') {
                        contactError.text('Please fill in the contact field.');
                        isValid = false;
                    } else {
                        contactError.text('');
                    }

                    if (!isValid) {
                        event.preventDefault();
                    } else {
                        $.ajax({
                            url: 'valid.php',
                            method: 'post',
                            data: {
                                name: name,
                                contact: contact
                            },
                            success: function(response) {
                                if (response.res == 4) {
                                    $('#nameSection').hide();
                                    $('#registerSection').show();
                                    $('#rpassword').focus();
                                } else {
                                    removeErrorMessages();
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages(); 
                                $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            }
                        });
                    }
                });

                $(document).on('keydown', function(event) {
                    if (event.which === 13) { 
                        if ($('#emailSection').is(':visible')) {
                            $('#nextButton').click();
                        } else if ($('#nameSection').is(':visible')) {
                            $('#nextButton2').click();
                        } else if ($('#registerSection').is(':visible')) {
                            $('#registerButton').click();
                        } else if ($('#passwordSection').is(':visible')) {
                            $('#loginForm').submit();
                        }
                    }
                });




                $('#loginForm').on('submit', function(event) {
                    event.preventDefault();

                    var email = $('#email').val();
                    var password = $('#password').val();

                    if (email && password) {
                        $.ajax({
                            url: 'valid.php',
                            method: 'POST',
                            data: {
                                email: email,
                                password: password
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.res == 2) {
                                    window.location.href = 'main.php';
                                } else {
                                    removeErrorMessages();
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages();
                                $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            }
                        });
                    }
                });



                $('#registerButton').on('click', function(event) {
                    event.preventDefault();

                    var email = $('#email').val();
                    var rpassword = $('#rpassword').val();
                    var name = $('#name').val();
                    var contact = $('#contact').val();

                    if (email && rpassword && name && contact) {
                        $.ajax({
                            url: 'valid.php',
                            method: 'POST',
                            data: {
                                email: email,
                                rpassword: rpassword,
                                name: name,
                                contact: contact
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.res == 5) {
                                    // $('#registerSection').hide();
                                    $('#registerSection').hide();
                                    $('#passwordSection').hide();
                                    $('#nameSection').hide();
                                    $('#emailSection').show();
                                    $('#email').focus();
                                    // window.location.href = 'main.php';
                                } else {
                                    removeErrorMessages();
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            error: function() {
                                removeErrorMessages();
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