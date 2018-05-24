

<link rel="stylesheet" href="css/login.css">
<div class="login-form">
<form action="?controller=log_in" method="POST" class="form-horizontal">
    <?php
    if (isset($_SESSION['uid'])){
        echo("You are logged in as" . " " . $_SESSION['u_name']), '   <a href="?controller=my_account" <i class="glyphicon glyphicon-home"></i>Home</a>';
    }
    ?>
    <h2 class="text-center">Log in</h2>
    <div class="form-group">
        <input class="form-control" type="email" id="email" name="email" value="" required="required" placeholder="Email">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" id="password" value="" placeholder="Password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="submit" >Log in</button>
    </div>
    <div class="clear-fix">
        <label class="pull-left checkbox-inline" style="font-size: 16px" ><input type="checkbox"> Remember me</label>
        <!--<a href="?controller=forgot_password" class="pull-right" style="font-size: 16px">Forgot Password?</a>-->
    </div>
</form>
    <p class="text-center" style="font-size: 18px"><a href="?controller=sign_up">Create an Account</a></p>

















