<?php

//My account-kod ska in här
//var_dump($_POST);

//show email is when logged in
if (isset($_POST['email'])) {

    $uid = $_POST["email"];
    $sql = "SELECT * FROM user";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//hämta bild från images table
$user_id = $_SESSION['u_id'];
$sql = "SELECT filename FROM images WHERE uid= '$user_id'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$fetch = $stmt->fetchall(PDO::FETCH_ASSOC);
// Lägger den nuvarande bild i en session.
if (isset($_SESSION['u_id'])){
    $_SESSION['profile_pic'] = $fetch[0]['filename'];

}

$result='';
loadTemplate("my_account", $result);


?>
