<?php
require 'Admin/dbcon.php';
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segment = explode("/", $uri_path);
$c_page = end($uri_segment);
?>
<?php
if ($c_page == "main.php" || $c_page == "manwomwn.php") {
    require 'sessionstart.php';
} else {
    require 'sessionchecker.php';
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<style>

    .navwrapper {
        height: 65px;
        /* margin-top: 20px; */
        display: flex;
        justify-content: center;
        background-color: hsl(0, 0%, 100%);
        /* backdrop-filter: blur(16px);
    --webkit-backdrop-filter: blur(16px); */
        position: sticky;
        top: 0px;

        z-index: 1000;
    }

    ul {
        width: 100%;
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        flex-direction: row;
    }

    .navele {
        display: inline-block;
        font-size: 20px;
    }

    .navele:not(:first-child, :last-child) {
        margin-left: 20px
    }



    .navele:nth-last-child(1) {
        /* width: 100%; */
        position: absolute;
        top: 14px;
        right: 11vh;

    }

    .lnnavbtn:nth-child(1) {
        position: absolute;
        left: 5vh;
    }

    .navele:last-child :hover {
        text-decoration: none;
    }

    .nnavbtn {
        text-decoration: none;
        color: rgb(0, 0, 0);
        background-color: transparent;
        border: 0;
    }

    .lnnavbtn {
        text-decoration: none;
        color: rgb(36, 35, 35);
        background-color: transparent;
        position: absolute;
        top: 10px;
        right: 3%;
        border-radius: 0;
        margin: auto;
        font-size: 14px;
        font-weight: 600;
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;

    }


    .lnnavbtn:hover {
        color: rgb(111, 111, 111);
        background-color: #f4f4f642;
    }

    .nnavbtn:hover {
        color: gray;
    }

    .navbar {
        /* padding: 10px; */
        width: 100%;

        position: sticky;
        display: flex;
        justify-content: center;
        /* border-bottom: 1px solid gray; */
        box-shadow: 0 10px 20px -10px rgba(124, 124, 147, 0.3);

    }

    .photo {
        width: 40px;
        height: 40px;
        background-color: #acacae;
        display: flex;
        justify-content: center;
        margin-right: 10px;
        padding: 5px;
        border-radius: 50px;
        margin-bottom: -5px;
        font-size: 15px;
    }

    .icon1 {
        margin: auto;
    }

    .address {
        height: 50px;
        width: 40vh;
        border: 2px solid #c9c9c9;
        border-radius: 10px;
        text-wrap: normal;
    }

    .back {
        position: absolute;
        left: 20px;
        top: 20px;
        font-size: 20px;
        color: black;
    }

    .back:hover {
        color: rgb(80, 79, 79);
    }

    .addr {
        display: flex;
        flex-direction: row;
    }

    .addele {
        margin-top: 2px;
        margin-bottom: 2px;
        color: #6f6f6f;
    }

    .dropdown-item:active{
        background-color: #6f6f6f;
    }

    .addrbtn:focus{
        box-shadow: 0 4px 6px rgba(176, 176, 176, 0.18), 0 -4px 6px rgba(176, 176, 176, 0.18), 4px 0 6px rgba(176, 176, 176, 0.18), -4px 0 6px rgba(176, 176, 176, 0.18);
    }
</style>

<?php
if (isset($_SESSION['muser'])) {
    $uemail_id = $_SESSION['muser'];
    $src2 = "SELECT * FROM user WHERE  email='$uemail_id'";
    $rs2 = mysqli_query($conn, $src2) or die(mysqli_error($conn));
    if (mysqli_num_rows($rs2) > 0) {
        $rec2 = mysqli_fetch_assoc($rs2);
    }
}
?>
<div class="navwrapper">
    <nav class="navbar">
        <ul>
            <?php
            if ($c_page != "profile.php") {
            ?>
                <li class="navele"><button type="button" class="nnavbtn" style="position: absolute; left:5vh; top:5px"><a href="<?php if ($c_page == "booking.php") {
                                                                                                                                    echo "../";
                                                                                                                                } ?>hello.html"><img src="<?php if ($c_page == "booking.php") {
                                                                                                                                                                echo "../";
                                                                                                                                                            } ?>img/logo.png" alt="logopng" style="width: 100px; height: 55px;"></a></button></li>
                <?php
                if (isset($_SESSION['muser'])) {
                ?>
                    <li class="navele" style="margin-right: 40%;">

                        <div class="btn-group address">
                            <button class="btn btn-black-50 btn-lg dropdown-toggle addrbtn" type="button" data-toggle="dropdown" aria-expanded="false" style="color:#6f6f6f;">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php
                                if ($rec2['area'] != null) {
                                ?>
                                    <?php echo  " " . $rec2['city'] ?>
                                <?php
                                } else {
                                    echo " " . "Please enter Address";
                                }
                                ?>
                            </button>
                            <div class="dropdown-menu" style="width: 100%; padding:10px;">
                                <p class="addr">
                                <p class="addele"><strong>Landmark:</strong><span>
                                        <?php if ($rec2['landmark'] != null) {
                                            echo " " . $rec2['landmark'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>
                                <p class="addele"><strong>Area:</strong><span>
                                        <?php if ($rec2['area'] != null) {
                                            echo " " . $rec2['area'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>
                                <p class="addele"><strong>City:</strong><span>
                                        <?php if ($rec2['city'] != null) {
                                            echo " " . $rec2['city'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>
                                <p class="addele"><strong>District:</strong><span>
                                        <?php if ($rec2['dist'] != null) {
                                            echo " " . $rec2['dist'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>
                                <p class="addele"><strong>State:</strong><span>
                                        <?php if ($rec2['state'] != null) {
                                            echo " " . $rec2['state'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>
                                <p class="addele"><strong>PIN:</strong><span>
                                        <?php if ($rec2['pin'] != null) {
                                            echo " " . $rec2['pin'];
                                        } else {
                                            echo "Empty";
                                        } ?></span></p>

                                </p>
                            </div>
                        </div>

                    </li>
                    <li class="navele">
                        <a class=" dropdown-toggle nnavbtn" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="display:inline;">
                            <span class='navele photo' style="position:absolute; top :-2px; right:105%;"><i class='fa-solid fa-user icon1'></i></span>
                            <?php echo "Hi, " . $rec2['name']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php if ($c_page == "booking.php") {
                                                                echo "../";
                                                            } ?>profile.php"><i class="fa-regular fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="userbooking.php"><i class="fa-solid fa-calendar-days"></i> Bookings</a>
                            <a class="dropdown-item" href="<?php if ($c_page == "booking.php") {
                                                                echo "../";
                                                            } ?>logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                        </div>

                    <?php
                } else {
                    ?>
                        <button type="button" class="lnnavbtn" data-toggle="modal" data-target="#exampleModal" style="border: 1px solid gray; border-radius:7px;">Log in</button>
                    </li>
                <?php
                }
            } else {
                ?>
                <a class="back" href="main.php">
                    <div class="backicon"><i class="fa-solid fa-arrow-left"></i></div>
                </a>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>