<?php

global $dbh;
$sql = "SELECT * FROM pageinfo";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadFooter = $stmt->fetchAll(PDO::FETCH_OBJ);

?>