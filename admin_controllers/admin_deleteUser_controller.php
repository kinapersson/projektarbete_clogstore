<?php

function removeUser(){
    global $dbh;
    $id = $_POST['removeID'];

    $sql = "DELETE FROM phone WHERE UID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM address WHERE UID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM user WHERE UID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['removeID'])){
    removeUser();
}

$sql = "SELECT * FROM user";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$showUsers = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("deleteUser", $showUsers);

?>