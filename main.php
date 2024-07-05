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
    <style>
        .searchdiv {
            width: 100%;
            margin: auto;
            padding: 8px;
            padding-left: 0px;
            padding-right: 0px;
            border-radius: 40px;
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        .sele {
            list-style: none;
            cursor: pointer;
        }

        .ulist {
            display: flex;
            flex-direction: column;
        }
    </style>

</head>

<body>
    <main class="ncontainer">
        <?php require 'menu.php' ?>
        <div class="divbox">
            <div class="imgslider">
                <div class="searchdiv">
                    <form class="searchsection" method="post" action="srout.php">
                        <div class="icon">
                            <i class="fa-solid fa-magnifying-glass sericon"></i>
                        </div>
                        <input id="searchInput" class="sinput" name="searchInput" type="text" placeholder="Search Services">

                        <button class="sbtn" type="submit">Search</button>

                    </form>
                    <div id="suggestions"></div>
                </div>
            </div>
        </div>
        <div class="divservices">
            <div class="service">
                <a href="service/manwomen.php" class="servicebtn">
                    <div class="seritem">
                        <div class="iconwrap"> <img src="img\service_icons\women.png" alt="icon.png" class="sicon">
                        </div>
                        <div>
                            <p class="itemname">Women & Men</p>
                        </div>
                    </div>
                </a>
                <a href="service/others2.php?input=cleaner" class="servicebtn">
                    <div class="seritem">
                        <div class="iconwrap"> <img src="img\service_icons\clean.jpeg" alt="icon.png" class="sicon">
                        </div>
                        <div>
                            <p class="itemname"> Cleaning</p>
                        </div>
                    </div>
                </a>
                <a href="service/appliancerepair.php" class="servicebtn">
                    <div class="seritem">
                        <div class="iconwrap"> <img src="img\service_icons\applince.jpeg" alt="icon.png" class="sicon">
                        </div>
                        <div>
                            <p class="itemname"> Appliance Repair</p>
                        </div>
                    </div>
                </a>
                <a href="service/electricianpage.php" class="servicebtn">
                    <div class="seritem">
                        <div class="iconwrap"> <img src="img\service_icons\electrician.jpeg" alt="icon.png" class="sicon">
                        </div>
                        <div>
                            <p class="itemname">Electrician</p>
                        </div>
                    </div>
                </a>
                <a href="service/others.php" class="servicebtn">
                    <div class="seritem">
                        <div class="iconwrap"> <img src="img\service_icons\other.jpeg" alt="icon.png" class="sicon">
                        </div>
                        <div>
                            <p class="itemname">Electrician, Plumber & Carpenter</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="wrapserviceworker">
            <h3 class="workerheading">Most booked services</h3>
            <div class="serviceworker">
                <a href="service/others2.php?input=carpainter" style="padding: 5px; padding-left:0px;">
                    <div class="worker">
                        <img class="workerphoto" src="img/worker/img1.jpg">
                        <div class="middle">
                            <div class="text">Carpainter</div>
                        </div>
                    </div>
                    <a>
                        <a href="service/others2.php?input=plumber" style="padding: 5px;">
                            <div class="worker">
                                <img class="workerphoto" src="img/worker/img2.jpg">
                                <div class="middle">
                                    <div class="text">Plumber</div>
                                </div>
                            </div>
                        </a>
                        <a href="service/others2.php?input=electricians" style="padding: 5px;">
                            <div class="worker">
                                <img class="workerphoto" src="img/worker/img3.jpg">
                                <div class="middle">
                                    <div class="text">Electricians</div>
                                </div>
                            </div>
                        </a>
                        <a href="service/others2.php?input=car_repair" style="padding: 5px;">
                            <div class="worker">
                                <img class="workerphoto" src="img/worker/img4.jpg">
                                <div class="middle">
                                    <div class="text">Car Mechanic</div>
                                </div>
                            </div>
                        </a>
                        <a href="service/others2.php?input=cleaner" style="padding: 5px;padding-right:0px;">
                            <div class="worker">
                                <img class="workerphoto" src="img/worker/img5.jpg">
                                <div class="middle">
                                    <div class="text">
                                        Cleaning
                                    </div>
                                </div>
                            </div>
                        </a>
            </div>
        </div>
        <div>
            <?php //print_r($rec2) ; 
            ?>
        </div>
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
                                    <input type="password" class="ibox" name="rpassword" id="rpassword" placeholder="Password">
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
                            <div id="otpSection" style="display: none;">
                                <div>
                                    <h3 class="heading"> Please Verify Your Email</h3>
                                </div>
                                <label for="otp">Enter your One-Time-Password:</label><br>
                                <div class="otpsec">
                                    <div class="input">
                                        <input type="text" class="otp" name="otp[]" id="otp1" minlength="0" maxlength="1" pattern="[0-9]{0,1}">
                                        <input type="text" class="otp" name="otp[]" id="otp2" minlength="0" maxlength="1" pattern="[0-9]{0,1}" disabled>
                                        <input type="text" class="otp" name="otp[]" id="otp3" minlength="0" maxlength="1" pattern="[0-9]{0,1}" disabled>
                                        <input type="text" class="otp" name="otp[]" id="otp4" minlength="0" maxlength="1" pattern="[0-9]{0,1}" disabled>
                                        <input type="text" class="otp" name="otp[]" id="otp5" minlength="0" maxlength="1" pattern="[0-9]{0,1}" disabled>
                                        <input type="text" class="otp" name="otp[]" id="otp6" minlength="0" maxlength="1" pattern="[0-9]{0,1}" disabled><br>
                                        <span class="error-message" id="otpError"></span>
                                    </div>
                                    <div class="pbttn">
                                        <button type="button" class="btn btn-dark pbtn" id="sendButton" name="sendButton" value="send" style="position: relative;left: 10px;top: 2px;">Send</button>
                                    </div>
                                </div>
                                <div class="btn1">
                                    <button type="button" class="bttn" id="verifyButton">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <script>
                var massagep = "<?php echo $_SESSION['message']; ?>";
                if (massagep != null) {
                    alert(massagep);
                    massagep = null;
                }
            </script>
        <?php
            unset($_SESSION['message']);
        }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#searchInput').keyup(function() {
                    var query = $(this).val().trim();

                    if (query.length > 0) {
                        $.ajax({
                            url: 'search.php',
                            type: 'GET',
                            data: {
                                query: query
                            },
                            success: function(data) {
                                console.log(data); // Log response for debugging
                                $('#suggestions').fadeIn();
                                $('#suggestions').html(data);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching suggestions:', error);
                            }
                        });
                    } else {
                        $('#suggestions').fadeOut();
                        $('#suggestions').html("");
                    }
                });
                $(document).on('click', '#sli', function() {
                    $('#searchInput').val($(this).text());
                    $('#suggestions').fadeOut();
                })
            });
        </script>

        <script>
            const otpInputs = document.querySelectorAll("#otpSection input");
            const button = document.querySelector("#otpSection button");




            // iterate over all otpInputs
            otpInputs.forEach((input, index1) => {
                input.addEventListener("keyup", (e) => {
                    const currentInput = input;
                    const nextInput = input.nextElementSibling;
                    const prevInput = input.previousElementSibling;

                    // if the value has more than one character then clear it
                    if (currentInput.value.length > 1) {
                        currentInput.value = "";
                        return;
                    }

                    // if the next input is disabled and the current value is not empty
                    // enable the next input and focus on it
                    if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                        nextInput.removeAttribute("disabled");
                        nextInput.focus();
                    }

                    // if the backspace key is pressed
                    if (e.key === "Backspace") {
                        // If the current input is empty and there's a previous input, move focus to the previous input
                        if (currentInput.value === "" && prevInput) {
                            prevInput.focus();
                        }
                        // Clear the value of the current input
                        currentInput.value = "";

                        // Check if all otpInputs are empty
                        const allInputsEmpty = Array.from(otpInputs).every(input => input.value === "");

                        // Disable all otpInputs except the first if all inputs are empty
                        if (allInputsEmpty) {
                            otpInputs.forEach((input, index) => {
                                if (index !== 0) {
                                    input.setAttribute("disabled", true);
                                }
                            });
                        } else {
                            // Enable all otpInputs
                            otpInputs.forEach(input => input.removeAttribute("disabled"));
                        }
                    }

                    // if the fourth input (which index number is 3) is not empty and has no disable attribute
                    // add active class to button, otherwise remove active class
                    if (!otpInputs[3].disabled && otpInputs[3].value !== "") {
                        button.classList.add("active");
                        return;
                    }
                    button.classList.remove("active");
                });
            });

            //focus the first input which index is 0 on window load
            window.addEventListener("load", () => otpInputs[0].focus());

            function isValidEmail(email) {
                // Regular expression for validating email format
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            $(document).ready(function() {
                $('#otpSection').hide();
                // $('#loadingSection').hide();
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

                $('#email').on('input', function() {
                    removeErrorMessages(); // Remove error messages when the user starts typing again
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
                    var email = $('#email').val().trim(); // Trim whitespace
                    if (email && isValidEmail(email)) {
                        $.ajax({
                            url: 'validation.php', // current script URL
                            method: 'POST',
                            data: {
                                email: email
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.res == 1) {
                                    $('#emailSection').hide();
                                    $('#passwordSection').show();
                                    $('#password').focus();
                                } else if (response.res == 3) {
                                    $('#emailSection').hide();
                                    $('#nameSection').show();
                                    $('#name').focus();
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
                        event.preventDefault(); // Prevent form submission if there are errors
                    } else {
                        $.ajax({
                            url: 'validation.php',
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
                        if ($('#emailSection').is(':visible')) {
                            $('#nextButton').click(); // Trigger next button click event for email section
                        } else if ($('#nameSection').is(':visible')) {
                            $('#nextButton2').click(); // Trigger next button click event for name section
                        } else if ($('#registerSection').is(':visible')) {
                            $('#registerButton').click(); // Trigger register button click event
                        } else if ($('#passwordSection').is(':visible')) {
                            $('#loginForm').submit(); // Submit the form for password section
                        } else if ($('#loginForm').is(':visible')) {
                            $('#loginForm').click(); // Submit the form for password section
                        }
                    }
                });


                $('#verifyButton').on('click', function() {
                    // Retrieve the entered OTP values from the input fields
                    var otpValues = [];
                    $('.otp').each(function() {
                        otpValues.push($(this).val());
                    });

                    // Join the OTP values into a single string
                    var otp = otpValues.join('');
                    var email = $('#email').val();
                    var password = $('#password').val(); // Corrected variable name to 'rpassword'

                    // Log the values for debugging
                    console.log("Email:", email);
                    console.log("OTP:", otp);

                    // Enable all OTP input fields
                    $('.otp').removeAttr('disabled');

                    // AJAX request to verify the OTP
                    $.ajax({
                        url: 'validation.php', // Replace 'validation.php' with the actual backend URL for OTP verification
                        method: 'POST',
                        data: {
                            email: email,
                            password: password, // Corrected variable name to 'rpassword'
                            otp: otp
                        },
                        success: function(response) {
                            // Handle the response from the server
                            console.log(response);
                            if (response.res == 10) {
                                // If OTP verification is successful, redirect to the main page or perform any other action
                                window.location.href = 'main.php';
                            } else {
                                // If OTP verification fails, display an error message
                                $('#otpError').text('Invalid OTP. Please try again.');
                            }
                        },
                        error: function() {
                            // Handle errors in the AJAX request
                            $('#otpError').text('An error occurred while verifying the OTP. Please try again later.');
                        }
                    });
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
                                console.log(response);

                                if (response.res == 2) {
                                    // Redirect to the target page if login is successful
                                    window.location.href = 'main.php';
                                } else if (response.res == 9) {
                                    $('#passwordSection').hide();
                                    $('#otpSection').show();
                                } else {
                                    // Display error message if login is unsuccessful
                                    removeErrorMessages();
                                    $('.modal-body').prepend('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
                                }
                            },
                            // error: function() {
                            //     removeErrorMessages(); // Remove existing error messages
                            //     $('.modal-body').prepend('<div class="alert alert-danger" role="alert">An error occurred. Please try again later.</div>');
                            // }
                        });
                    }
                });



                // $("#sendButton").click(function () {
                $('#sendButton').on('click', function(event) {
                    // Disable the button to prevent multiple clicks
                    $(this).prop("disabled", true);
                    var email = $('#email').val();
                    var send = $('#sendButton').val();
                    // Make the AJAX request to PHP backend
                    $.ajax({
                        url: "validation.php",
                        type: "POST",
                        data: {
                            sreq: send,
                            email: email
                        },
                        success: function(response) {
                            console.log(response);
                            // Re-enable the button once the response is received
                            if (response.res == 12) {
                                $("#sendButton").prop("disabled", false);
                            }
                            // Process the response if needed
                        }
                    });
                });



                $('#registerButton').on('click', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    var email = $('#email').val();
                    var rpassword = $('#rpassword').val();
                    var name = $('#name').val();
                    var contact = $('#contact').val();

                    if (email && rpassword && name && contact) {
                        $.ajax({
                            url: 'validation.php',
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
                                    $('#email').focus(); // Redirect to the target page
                                    // Redirect to the target page if registration is successful
                                    // window.location.href = 'main.php';
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
    <?php require('footer.php') ?>
</body>

</html>