<?php require('config.php');?>
<?php require('navbar.php') ?>
<div class="container-fluid">
    <?php
    $rs=mysqli_query($con, "SELECT f.*, u.name FROM files f INNER JOIN user u ON f.upload_by=u.uid") or die(mysqli_error($con));
    if(mysqli_num_rows($rs)>0){
        ?>
        <div class="row">
            <?php
            $i=1;
            while($rec=mysqli_fetch_assoc($rs)){
            ?>
            <div class="card col-3">
                <img class="card-img-top" src="<?php echo $rec['fpath'] ?>" alt="">
                <div class="card-header">
                    <h4>Upload By:-<?php echo $rec['name'] ?></h4>
                </div>
                <div class="card-body">
                    <p><?php echo $rec['about'] ?></p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <form name="del-<?php echo $i ?>" method="post" action="filedel.php">
                            <input type="hidden" name="fid" value="<?php echo $rec['fid']; ?>">
                            <input type="hidden" name="fpath" value="<?php echo $rec['fpath']; ?>">
                            <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                        </form>
                        <form name="edit-<?php echo $i ?>" method="post" action="fileedit.php">
                            <input type="hidden" name="fid" value="<?php echo $rec['fid']; ?>">
                            <input type="hidden" name="fpath" value="<?php echo $rec['fpath']; ?>">
                            <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            $i++;
            }
            ?>
        </div>
        <?php
    }else{
        echo "Sorry no images found";
    }
    ?>
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>