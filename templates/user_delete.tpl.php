
<div class="container">
    <h3>Delete profile</h3>
    <a href="?controller=my_account"><i class="glyphicon glyphicon-home"></i>Home</a>
    <div class="container">

            <h5> Customer id:<?php echo $_SESSION['uid'] ?></h5>
            <h5> Name:<?php echo $_SESSION['u_name'] ?></h5>
            <h5>Email:<?php echo $_SESSION['u_email'] ?></h5>
            <h5>Phone:<?php echo $_SESSION['u_phone'] ?></h5>


    <b>Are you sure you want to delete this profile?</b>
        <form action="?controller=user_delete" method="POST">
    <?php
    if(isset($_SESSION['uid'])) {
        ?>
<!--        <form action="?controller=user_delete">-->
            <button class="btn btn-danger" type="submit" id="delete" name="delete">Delete</button>
        <?php
    }
    ?>
    <a href="?controller=my_account" type="submit"  class="btn btn-success"  id="cancel" name="cancel" >Cancel</a>
            <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
        </form>
</div>
</div>