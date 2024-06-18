<?php 
    require('config.php');
    require('checkSession.php');
?>
<?php require('navbar.php') ?>
    <div class="container">
        <h1 class="text-center text-primary">Search User</h1>
        <div class="container">
            <form name="src" method="post">
                <div class="row">
                    <div class="form-group col-11">
                        <input type="text" name="data" class="form-control border-primary">
                    </div>
                    <div class="col-1">
                        <input type="submit" name="ok" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['ok'])){
            $data=$_POST['data']; 
            $src="SELECT * FROM user WHERE name LIKE '$data%'";
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
        }
        ?>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>