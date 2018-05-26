<?php

$sql = "SELECT * FROM orders";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$viewOrders = $stmt->fetchAll(PDO::FETCH_OBJ);
loadTemplate("order_history", $viewOrders);
?>


