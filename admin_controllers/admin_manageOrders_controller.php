<?php

class orderViewModel{
    function set_loadOrders($new_loadOrders){
        $this->loadOrders = $new_loadOrders;
    }
    
    function get_loadOrders(){
        return $this->loadOrders;
    }
}

function editOrder(){
    global $dbh;

    $id = $_POST['orderId'];
    $updateOrderDate = $_POST['orderDate'];
    $updateOrderAddressDelivery = $_POST['orderAddressDelivery'];
    $updateOrderPaymentDate = $_POST['orderPaymentDate'];
    $updateOrderStatus = $_POST['orderStatus'];
    $updateOrderPaymentMethod = $_POST['orderPaymentMethod'];

    $sql = "UPDATE orders SET OrderDate = '$updateOrderDate', AddressDelivery = '$updateOrderAddressDelivery',  PaymentDate = '$updateOrderPaymentDate', OrderStatus = '$updateOrderStatus', PaymentMethod = '$updateOrderPaymentMethod'  WHERE OID = '$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['orderDate'])){
    editOrder();
}

$ovm = new orderViewModel();

$sql = "SELECT * FROM orders";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadOrders = $stmt->fetchAll(PDO::FETCH_OBJ);
$ovm->set_loadOrders($loadOrders);

loadTemplate("manageOrders", $ovm);

?>