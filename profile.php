<?php
require 'Admin/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/pstyle.css">
</head>

<body>
    <?php require 'menu.php' ?>
    <div class="pcontainer">
        <img src="img/profile.png" alt="Profile" style="    display: block;margin-left: auto;margin-right: auto; width: 25%;">
        <h2 style="text-align: center;">User Profile</h2>
        <form id="profileForm" method="post" action="update.php">
            <div class="form-group">
                <label for="name">Name:</label><br>
                <div class="input">
                    <input type="text" id="name" value="<?php echo $rec2['name'] ?>" name="name" readonly>
                    <button type="button" class="edit-button" data-field="name"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label><br>
                <div class="input">
                    <input type="email" id="email" value="<?php echo $rec2['email'] ?>" name="email" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label><br>
                <div class="input">
                    <input type="text" id="contact" value="<?php echo $rec2['contact'] ?>" name="contact" readonly>
                    <button type="button" class="edit-button" data-field="contact"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="area">Area:</label><br>
                <div class="input">
                    <input type="text" id="area" value="<?php if($rec2['area'] != null){ echo $rec2['area'];}?>" placeholder="<?php if($rec2['area'] != null){ echo $rec2['area'];} else{ echo "Empty";}?>" name="area" readonly>
                    <button type="button" class="edit-button" data-field="area"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="city">City:</label><br>
                <div class="input">
                    <input type="text" id="city" value="<?php if($rec2['city'] != null){ echo $rec2['city'];} ?>" placeholder="<?php if($rec2['city'] != null){ echo $rec2['city'];} else{ echo "Empty";} ?>" name="city" readonly>
                    <button type="button" class="edit-button" data-field="city"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="dist">District:</label><br>
                <div class="input">
                    <input type="text" id="dist" name="dist" value="<?php if($rec2['dist'] != null){ echo $rec2['dist'];} ?>" placeholder="<?php if($rec2['dist'] != null){ echo $rec2['dist'];} else{ echo "Empty";} ?>" readonly>
                    <button type="button" class="edit-button" data-field="dist"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="state">State:</label><br>
                <div class="input">
                    <input type="text" id="state" value="<?php if($rec2['state'] != null){ echo $rec2['state'];} ?>" placeholder="<?php if($rec2['state'] != null){ echo $rec2['state'];} else{ echo "Empty";} ?>" name="state" readonly>
                    <button type="button" class="edit-button" data-field="state"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="pin">PIN Code:</label><br>
                <div class="input">
                    <input type="text" id="pin" value="<?php if($rec2['pin'] != 0){ echo $rec2['pin'];} ?>" placeholder="<?php if($rec2['pin'] != 0){ echo $rec2['pin'];} else{ echo "Empty";} ?>" name="pin" readonly>
                    <button type="button" class="edit-button" data-field="pin"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="landmark">Landmark:</label><br>
                <div class="input">
                    <input type="text" id="landmark" value= "<?php if($rec2['landmark'] != null){ echo $rec2['landmark'];}?>" placeholder="<?php if($rec2['landmark'] != null){ echo $rec2['landmark'];} else{ echo "Empty";} ?>" name="landmark" readonly>
                    <button type="button" class="edit-button" data-field="landmark"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <div class="input">
                    <input type="password" id="password" value= "<?php echo $rec2['password'] ?>" name="password" readonly>
                    <button type="button" class="edit-button" data-field="password"><i class="fa-regular fa-pen-to-square"></i></button>
                </div>
            </div>
            <div id="cpassSection" style="display: none;">
                <label for="cpassword">Enter Password:</label><span style="font-size: 12px; color :red;"> *Enter Your password to change details</span><br>
                <input type="password" id="cpassword" name="cpassword">
            </div>
            <button type="submit" style="display: none; margin-top:10px" class="btn btn-dark" id="saveButton">Save Changes</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');
            const saveButton = document.getElementById('saveButton');
            const cpassword = document.getElementById('cpassSection');
            const form = document.getElementById('profileForm');
            const inputs = document.querySelectorAll('input[readonly]');

            function hasChanges(inputField) {
                return inputField.value.trim() !== inputField.defaultValue.trim();
            }

            function handleBlur(event) {
                const inputField = event.target;
                const fieldName = inputField.getAttribute('id');
                const editButton = document.querySelector(`button.edit-button[data-field="${fieldName}"]`);
                if (hasChanges(inputField)) {
                    editButton.style.display = 'none';
                } else {
                    editButton.style.display = 'inline-block';
                    saveButton.style.display = 'none';
                    cpassword.style.display = 'none';
                    inputField.setAttribute('readonly', 'true');
                }
            }
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const fieldName = this.getAttribute('data-field');
                    const inputField = document.getElementById(fieldName);
                    inputField.removeAttribute('readonly');
                    inputField.focus();
                    this.style.display = 'none';
                    cpassword.style.display = 'block'
                    saveButton.style.display = 'inline-block';
                });
            });
            form.addEventListener('submit', function(event) {
                let changesMade = false;
                inputs.forEach(input => {
                    if (hasChanges(input)) {
                        changesMade = true;
                        return;
                    }
                });

                if (!changesMade) {
                    event.preventDefault();
                    alert('No changes were made.');
                    inputs.forEach(input => {
                        input.setAttribute('readonly', 'true');
                        input.value = input.defaultValue;
                    });
                    editButtons.forEach(button => {
                        button.style.display = 'inline-block';
                    });
                    saveButton.style.display = 'none';
                    cpassword.style.display = 'none';
                } else {
                    inputs.forEach(input => {
                        input.setAttribute('readonly', 'true');
                    });
                    editButtons.forEach(button => {
                        button.style.display = 'inline-block';
                    });
                    saveButton.style.display = 'none';
                    cpassword.style.display = 'none';
                }
            });
            inputs.forEach(input => {
                input.addEventListener('blur', handleBlur);
            });
        });
        // $(document).ready(function() {
        //     $('#saveButton').on('click', function(event) {
        //         event.preventDefault(); // Prevent the default form submission
        //         var name = $('#name').val();
        //         var email = $('#email').val();
        //         var contact = $('#contact').val();
        //         var area = $('#area').val();
        //         var city = $('#city').val();
        //         var dist = $('#dist').val();
        //         var state = $('#state').val();
        //         var pin = $('#pin').val();
        //         var landmark = $('#landmark').val();
        //         var password = $('#password').val();
        //         var cpassword = $('#cpassword').val()
        //         if (email && cpassword && name && contact) {
        //             $.ajax({
        //                 url: 'update.php',
        //                 method: 'POST',
        //                 data: {
        //                     email: email,
        //                     name: name,
        //                     contact: contact,
        //                     area: area,
        //                     city: city,
        //                     dist: dist,
        //                     state: state,
        //                     pin: pin,
        //                     landmark: landmark,
        //                     password: password,
        //                     cpassword: cpassword
        //                 },
        //                 success: function(response) {
        //                     console.log(response);
        //                     if (response.res == 1) {}
        //                 },
        //                 error: function() {
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
</body>

</html>