<?php


$user = $_SESSION['u_id'];
    if (isset($_POST["delete"])){
        $sql = "DELETE FROM user WHERE uid='$user'";
        $stmt = $dbh->exec($sql);
        session_unset();
        session_destroy();
        echo "User deleted";
        header("Location: ?controller=default");
        //set allcolumn in a row


}


$row = '';
loadTemplate("user_delete", "$row");

?>