<?php
//All orders will be shown here (overview)

function removeOrder(){
    global $dbh;
    $id = $_POST['removeID'];
    $sql = "DELETE FROM orders WHERE OID='$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['removeID'])){
    removeOrder();
}

$sql = "SELECT * FROM orders";


$stmt = $dbh->prepare($sql);
$stmt->execute();
$viewOrders = $stmt->fetchAll(PDO::FETCH_OBJ);


loadTemplate("manageOrders", $viewOrders);







?>