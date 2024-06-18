<?php require('config.php');  ?>
<?php require('navbar.php') ?>
<div class="container">
    <div class="col-6">
        <h2 class="text-center text-primary">User Login</h2>
        <form name="ref-frm" id="reg-frm" method="post" action="loginCode.php">
            <div class="form-group">
                <label for="email_id">Enter email</label>
                <input type="email" name="email_id" id="email_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Enter password</label>
                <input type="password" name="pwd" id="pwd" class="form-control">
            </div>
            <input type="submit" name="ok" value="Login" class="btn btn-info">
        </form>
        <?php
        if(isset($_SESSION['err'])){
            ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['err'];
                unset($_SESSION['err']);
                ?>
            </div>
            <?php
        }
        ?>
        New user?<a href="reg.php">Click</a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>