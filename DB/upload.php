<?php 
    require('config.php');
    require('checkSession.php');
?>
<?php require('navbar.php') ?>
    <div class="container">
        <h1 class="text-center text-primary">Upload File</h1>
        <div class="container">
            <form name="src" method="post" action="upload_code.php" enctype="multipart/form-data">
                <div class="form-group col-6">
                    <label for="ff">Select File</label>
                    <input type="file" name="ff" id="ff" class="form-control border-primary">
                </div>
                <div class="form-group col-6">
                    <label for="about">About</label>
                    <input type="text" name="about" id="about" class="form-control border-primary">
                </div>
                <div class="col-1">
                    <input type="submit" name="ok" value="Upload" class="btn btn-primary">
                </div>
            </form>
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
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>