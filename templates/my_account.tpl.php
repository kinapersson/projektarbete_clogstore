
<!--<link rel="stylesheet" href="css/my_account.css">-->

<div class="navbar navbar-inverse" id="navbar">
    <ul class="container-fluid">
        <li><?php if (isset($_SESSION['u_id'])){ echo '<a href="?controller=user_edit"><i class="glyphicon glyphicon-edit"></i> Edit profile</a></li>';}?>
        <li><a href="?controller=order_history"> Order history</a></li>
        <li><a href="?controller=change_password" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
        <li><?php if (isset($_SESSION['u_id'])){ echo '<a href="?controller=user_delete"><i class="glyphicon glyphicon-trash"></i> Delete account</a></li>';}?>
        <br><br>
    </ul>
</div>
<div class="container">
<h2>Profile</h2>
    <!--show profile pic-->
    <?php printf("<img src='%s' class='img-circle' alt='Cinque Terre' height='150' width='150' />", $_SESSION['profile_pic']);?>
    <!--show user name-->    
<h4>Welcome!<?php echo $_SESSION['u_name'] ?> </h4>
 <p>Here you can view your order details, change password, update and delete your account.</p>
    <br>
<h4>Customer details</h4>
<form action="" method="POST">
    <h5 (14px) >Customer ID: <?php echo  $_SESSION['u_id']; ?></h5>
    <h5 (14px)>Name:<?php echo  $_SESSION['u_name']; ?></h5>
    <h5  (14px)>Email:<?php echo  $_SESSION['u_email']; ?></h5>
    <h5 (14px)>Phone number:<?php echo  $_SESSION['u_phone']; ?></h5>
</form>
</div>
