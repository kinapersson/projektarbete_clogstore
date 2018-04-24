<?php

function removeCategory(){
    global $dbh;
    $id = $_POST['removeID'];
    $sql = "DELETE FROM category WHERE catid='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['removeID'])){
    removeCategory();
}

$sql = "SELECT * FROM category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$showCategories = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("deleteCategory", $showCategories);

?>