<?php

function removeAttribute(){
    global $dbh;
    $id = $_POST['removeID'];
    $sql = "DELETE FROM attributetype WHERE ATID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['removeID'])){
    removeAttribute();
}

$sql = "SELECT * FROM attributetype";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$showAttributes = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("deleteAttribute", $showAttributes);

?>