<?php
require_once('dbcon.php');
require_once('sessionchecher.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashborad Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('menu.php') ?>
    <div id="layoutSidenav_content">
        <main>
            <?php
            if (isset($_POST['table'])) {
                $tablename = $_POST['table'];
                $id = $_POST['uid'];
                $sql = "SELECT * FROM $tablename WHERE u_id='$id'";
                $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($rs) > 0) {
                    $res = mysqli_fetch_assoc($rs);
            ?>
                    <div class="container-fluid px-4">
                        <div>
                            <h2 class="mt-4">Update <?php echo $tablename; ?></h2>
                        </div>
                        <div class="col-12">
                            <div class="col-6">
                                <form name="frm" method="post">
                                    <!-- enctype="multipart/form-data" -->
                                    <input type="hidden" name="uid" value="<?php echo $res['u_id']; ?>">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $res['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail:</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $res['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact:</label>
                                        <input type="tel" name="contact" id="contact" minlength="10" maxlength="10" value="<?php echo $res['contact']; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ban">Ban Status:</label>
                                        <select name="ban" class="form-control">
                                            <?php if ($res['ban'] == 1) { ?>
                                                <option value="1">Ban</option>
                                                <option value="0">Unban</option>
                                            <?php } else { ?>
                                                <option value="0">Unban</option>
                                                <option value="1">Ban</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="from-group mt-3">
                                        <input type="submit" name="ok" value="Submit" class="btn btn-dark">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }

            if (isset($_POST['ok'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $ban = $_POST['ban'];
                $id = $_POST['uid'];

                $stmt = $conn->prepare("UPDATE user SET name=?, email=?, contact=?, ban=? WHERE u_id=?");
                $stmt->bind_param("sssii", $name, $email, $contact, $ban, $id);
                $stmt->execute();
                $stmt->close();
                header("location:users.php");
                // Display success message or handle errors gracefully
                echo "<script>alert('User information updated successfully');</script>";
            }
            ?>
        </main>
    </div>
    <div>
        <?php require('footer.php') ?>
    </div>

</body>

</html>