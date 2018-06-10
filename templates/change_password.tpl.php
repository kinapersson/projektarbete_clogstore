<!--<link rel="stylesheet" href="css/style.css">-->
<title>Password Reset</title>
<?php
    if(isset($msg))
    {
        echo $msg;
    }
    ?>
<div class="top">
    <div class="container">
        <h3 align="center"></h3>
        <h3>Change password</h3><a href="?controller=my_account"><i class="glyphicon glyphicon-home"></i>Home</a>
        <form class="form-horizontal" action='?controller=change_password' method='POST'>
            <div class="form-group">
                <label class="control-label col-sm-2" for="newpassword">New password:</label>
                <div class="col-sm-3">
    <input type="password" placeholder="New Password" class="form-control" id="newpassword" name="newpassword" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="confirmpassword">Confirm password:</label>
                <div class="col-sm-3">
    <input type="password" placeholder="Confirm New Password" class="form-control" id="confirmpassword" name="confirmpassword" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="resetpassword" name="resetpassword" >Reset Your Password</button>
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                </div>
            </div>

</form>
<!--
<body>
<div class="top">
<div class="container">
    <h3 align="center"></h3>
    <h3>Change password</h3><a href="?controller=my_account"><i class="glyphicon glyphicon-home"></i>Home</a>
    <form class="form-horizontal" action='?controller=change_password' method='POST'>
    <div class="form-group">
        <label class="control-label col-sm-2" for="oldpassword">Old password:</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Entry old password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="newpassword">New password:</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter new password">
    </div>
    </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="repeatnewpassword">Confirm password:</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="repeatnewpassword" name="repeatnewpassword" placeholder="Confirm password">
            </div>
        </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit" value="submit" >Submit</button>
                </div>
            </div>

    </form>-->
<br>
<br>
