<?php

$sql = "SELECT * FROM category";
$stmt = $dbh->prepare($sql);
// $stmt->bindParam(':catid', $GET_['catid']);
$stmt->execute();
$deleteCategory = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("deleteCategory", $deleteCategory);

?>