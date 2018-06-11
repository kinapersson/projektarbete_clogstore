<?php

class orderViewModel{
  function set_addressDelivery($new_addressDelivery){
    $this->addressDelivery = $new_addressDelivery;
  }
  
  function get_addressDelivery(){
    return $this->addressDelivery;
  }

  function set_paymentMethod($new_paymentMethod){
    $this->paymentMethod = $new_paymentMethod;
  }

  function get_paymentMethod(){
    return $this->paymentMethod;
  }

  function set_orderDate($new_orderDate){
    $this->orderDate = $new_orderDate;
  }

  function get_orderDate(){
    return $this->orderDate;
  }

  function set_paymentDate($new_paymentDate){
    $this->paymentDate = $new_paymentDate;
  }

  function get_paymentDate(){
    return $this->paymentDate;
  }
  function set_orderStatus($new_orderStatus){
    $this->orderStatus = $new_orderStatus;
  }

  function get_orderStatus(){
    return $this->orderStatus;
  }
}

$ovm = new orderViewModel();

if(isset($_POST['addressDelivery'])){
  $ovm->set_addressDelivery($_POST['addressDelivery']);
  $ovm->set_orderDate(date("Y-m-d"));
  $ovm->set_paymentDate(date("Y-m-d"));
  $ovm->set_orderStatus(1);

  if($_POST["paymentMethod"] == "Credit Card"){
    $ovm->set_paymentMethod(1);
    // $ovm->set_paymentMethod($_POST['paymentMethod']);
  }
  else if($_POST["paymentMethod"] == "Bank Transfer"){
    $ovm->set_paymentMethod(2);
    // $ovm->set_paymentMethod($_POST['paymentMethod']);
  }

  // temporary fixed ID until login function is up and running
  // add to ovm class
  $uid = 1;

  // saves the information to the product tabel
  $createOrderDate = $ovm->get_orderDate();
  $createAddressDelivery = $ovm->get_addressDelivery();
  $createPaymentDate = $ovm->get_paymentDate();
  $createOrderStatus = $ovm->get_orderStatus();
  $createPaymentMethod = $ovm->get_paymentMethod();

  $sql = "INSERT INTO orders (UID, OrderDate, AddressDelivery, PaymentDate, OrderStatus, PaymentMethod) 
  VALUES ('$uid', '$createOrderDate', '$createAddressDelivery', '$createPaymentDate', '$createOrderStatus', '$createPaymentMethod')";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  // gets the latest created ID
  $newOrderId = $dbh->lastInsertId();

  global $cartData;

  foreach ($cartData as $key => $product) {
    $antal = $_SESSION['cart'][$product->PID];
    $cost = $product->Price * $antal;
    $sql = "INSERT INTO orderproduct (OID, PID, Amount, OrdeProductPrice) 
    VALUES ('$newOrderId', '$product->PID', '$antal', '$cost')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
  }
}

loadTemplate("thanks", $ovm);

?>