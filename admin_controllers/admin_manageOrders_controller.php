<?php



$sql = "SELECT * FROM orders";


$stmt = $dbh->prepare($sql);
$stmt->execute();
$viewOrders = $stmt->fetch(PDO::FETCH_OBJ);


loadTemplate("manageOrders", $viewOrders);
?>