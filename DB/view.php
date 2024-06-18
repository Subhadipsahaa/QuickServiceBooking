<?php 
    require('config.php');
    require('checkSession.php');
?>
<?php require('navbar.php') ?>
    <div class="container">
        <h1 class="text-center text-primary">All User</h1>
        <?php
        if(isset($_SESSION['msg'])){
            ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['msg']; ?>
            </div>
            <?php
            unset($_SESSION['msg']);
        }
        if(isset($_SESSION['err'])){
            ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['err']; ?>
            </div>
            <?php
            unset($_SESSION['err']);
        }
        ?>
        <?php
        $src="SELECT * FROM user";
        $rs=mysqli_query($con, $src);
        // echo mysqli_num_rows($rs) //Count number of record in record set
        if(mysqli_num_rows($rs)>0){
            ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Language</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    while($rec=mysqli_fetch_assoc($rs)){
                        $dob= strtotime($rec['dob']);

                        $dob=date("d-M-Y", $dob);
                        ?>
                        <tr>
                            <td><?php echo $rec['name'] ?></td>
                            <td><?php echo $rec['email_id'] ?></td>
                            <td><?php echo $rec['pwd'] ?></td>
                            <td><?php echo $dob ?></td>
                            <td><?php echo $rec['gender'] ?></td>
                            <td><?php echo $rec['lang'] ?></td>
                            <td><?php echo $rec['address'] ?></td>
                            <td><?php echo $rec['city'] ?></td>
                            <td>
                                <form name="del-<?php echo $i ?>" method="post" action="update.php">
                                    <input type="hidden" name="uid" value="<?php echo $rec['uid']; ?>">
                                    <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                </form>
                            </td>
                            <td>
                                <form name="del-<?php echo $i ?>" method="post" action="delete.php">
                                    <input type="hidden" name="uid" value="<?php echo $rec['uid']; ?>">
                                    <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                </form>
                                </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }else{
            ?>
            <h3 class="text-center text-danger">Sorry no user details found</h3>
            <?php
        }
        ?>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>