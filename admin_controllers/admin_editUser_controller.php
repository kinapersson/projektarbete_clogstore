<?php

class userViewModel{
    function set_loadUsers($new_loadUsers){
        $this->loadUsers = $new_loadUsers;
    }
    
    function get_loadUsers(){
        return $this->loadUsers;
    }

    function set_loadPhones($new_loadPhones){
        $this->loadPhones = $new_loadPhones;
    }
    
    function get_loadPhones(){
        return $this->loadPhones;
    }
    
    function set_loadAddress($new_loadAddress){
        $this->loadAddress = $new_loadAddress;
    }
    
    function get_loadAddress(){
        return $this->loadAddress;
    }
}

function editProduct(){
    global $dbh;

    $id = $_POST['userId'];
    $updateUserName = $_POST['userName'];
    $updateUserEmail = $_POST['userEmail'];
    $updateUserMobileNumber = $_POST['userMobileNumber'];
    $updateUserWorkNumber = $_POST['userWorkNumber'];
    $updateUserAddressDelivery = $_POST['userAddressDelivery'];
    $updateUserZipcodeDelivery = $_POST['userZipcodeDelivery'];
    $updateUserCityDelivery = $_POST['userCityDelivery'];
    $updateUserAddressInvoice = $_POST['userAddressInvoice'];
    $updateUserZipcodeInvoice = $_POST['userZipcodeInvoice'];
    $updateUserCityInvoice = $_POST['userCityInvoice'];
    $updateUserPassword = $_POST['userPassword'];
    // $updateUserIsAdmin = $_POST['userIsAdmin'];

    $updateUserIsAdmin = null;
    $isAdmin = $_POST['userIsAdmin'];
    if ($isAdmin == "admin"){
      $updateUserIsAdmin = 0;
    }
    else{
      $updateUserIsAdmin = 1;
    }

    $sql = "UPDATE user SET Name = '$updateUserName', Email = '$updateUserEmail', Password = '$updateUserPassword', isAdmin = $updateUserIsAdmin WHERE UID = '$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM phone WHERE UID = $id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // PTID 1 = mobile
    //$sql = "UPDATE phone SET PTID = '1', Number = '$updateUserMobileNumber' WHERE UID = '$id'";
    $sql = "INSERT INTO phone (UID, PTID, Number) VALUES ('$id', '1', '$updateUserMobileNumber')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // PTID 2 = work
    //$sql = "UPDATE phone SET PTID = '2', Number = '$updateUserWorkNumber' WHERE UID = '$id'";
    $sql = "INSERT INTO phone (UID, PTID, Number) VALUES ('$id', '2', '$updateUserWorkNumber')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM address WHERE UID = $id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // ADID 1 = delivery
    $sql = "INSERT INTO address (ADID, UID, Street, Zipcode, City) VALUES ('1', '$id', '$updateUserAddressDelivery', '$updateUserZipcodeDelivery', '$updateUserCityDelivery')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // ADID 2 = invoice
    $sql = "INSERT INTO address (ADID, UID, Street, Zipcode, City) VALUES ('2', '$id', '$updateUserAddressInvoice', '$updateUserZipcodeInvoice', '$updateUserCityInvoice')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
if(isset($_POST['userName'])){
    editProduct();
}

$uvm = new userViewModel();

$sql = "SELECT * FROM user";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadUsers = $stmt->fetchAll(PDO::FETCH_OBJ);
$uvm->set_loadUsers($loadUsers);

$sql = "SELECT * FROM phone";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadPhones = $stmt->fetchAll(PDO::FETCH_OBJ);
$uvm->set_loadPhones($loadPhones);

$sql = "SELECT * FROM address";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadAddress = $stmt->fetchAll(PDO::FETCH_OBJ);
$uvm->set_loadAddress($loadAddress);

loadTemplate("editUser", $uvm);

?>