<?php

function removeProduct(){
    global $dbh;
    $id = $_POST['removeID'];

    $sql = "DELETE FROM prodcat WHERE pid='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM attribute WHERE PID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM product WHERE PID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['removeID'])){
    removeProduct();
}

$sql = "SELECT * FROM product";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$showProducts = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("deleteProduct", $showProducts);

?>