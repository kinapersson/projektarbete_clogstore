<?php

class userViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $userName = ""; 

  function set_userName($new_userName) {
    $this->userName = $new_userName;
  }
  function get_userName() {
    return $this->userName;
  }

  public $userEmail = ""; 

  function set_userEmail($new_userEmail) {
    $this->userEmail = $new_userEmail;
  }
  function get_userEmail() {
    return $this->userEmail;
  }

  public $userPhone = ""; 

  function set_userPhone($new_userPhone) {
    $this->userPhone = $new_userPhone;
  }
  function get_userPhone() {
    return $this->userPhone;
  }

  public $userAddressDelivery = ""; 

  function set_userAddressDelivery($new_userAddressDelivery) {
    $this->userAddressDelivery = $new_userAddressDelivery;
  }
  function get_userAddressDelivery() {
    return $this->userAddressDelivery;
  }

  public $userZipcodeDelivery = ""; 

  function set_userZipcodeDelivery($new_userZipcodeDelivery) {
    $this->userZipcodeDelivery = $new_userZipcodeDelivery;
  }
  function get_userZipcodeDelivery() {
    return $this->userZipcodeDelivery;
  }

  public $userCityDelivery = ""; 

  function set_userCityDelivery($new_userCityDelivery) {
    $this->userCityDelivery = $new_userCityDelivery;
  }
  function get_userCityDelivery() {
    return $this->userCityDelivery;
  }

  public $userAddressInvoice = ""; 

  function set_userAddressInvoice($new_userAddressInvoice) {
    $this->userAddressInvoice = $new_userAddressInvoice;
  }
  function get_userAddressInvoice() {
    return $this->userAddressInvoice;
  }

  public $userZipcodeInvoice = ""; 

  function set_userZipcodeInvoice($new_userZipcodeInvoice) {
    $this->userZipcodeInvoice = $new_userZipcodeInvoice;
  }
  function get_userZipcodeInvoice() {
    return $this->userZipcodeInvoice;
  }

  public $userCityInvoice = ""; 

  function set_userCityInvoice($new_userCityInvoice) {
    $this->userCityInvoice = $new_userCityInvoice;
  }
  function get_userCityInvoice() {
    return $this->userCityInvoice;
  }

  public $userPassword = ""; 

  function set_userPassword($new_userPassword) {
    $this->userPassword = $new_userPassword;
  }
  function get_userPassword() {
    return $this->userPassword;
  }

  public $userIsAdmin = ""; 

  function set_userIsAdmin($new_userIsAdmin) {
    $this->userIsAdmin = $new_userIsAdmin;
  }
  function get_userIsAdmin() {
    return $this->userIsAdmin;
  }
 
  public function generate_response($type, $message){
    if($type == "success") $this->set_response("<div class='alert alert-success text-center'>{$message}</div>");
    else $this->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }
}

$uvm = new userViewModel();

if(isset($_POST['userName'])){
  // response message
  $missing_createUser = "Du har ej fyllt i ett användarnamn";
  $missing_createEmail = "Du har ej fyllt i en epost";
  $missing_createPhone = "Du har ej fyllt i ett nummer";
  $missing_createAddressDelivery = "Du har ej fyllt i en leverans adress";
  $missing_createZipcodeDelivery = "Du har ej fyllt i ett leverans postnummer";
  $missing_createCityDelivery = "Du har ej fyllt i ett leverans stad";
  $missing_createAddressInvoice = "Du har ej fyllt i en faktura adress";
  $missing_createZipcodeInvoice = "Du har ej fyllt i ett faktura postnummer";
  $missing_createCityInvoice = "Du har ej fyllt i ett faktura stad";
  $missing_createPassword = "Du har ej fyllt i ett lösenord";
  $missing_createIsAdmin = "Du har ej fyllt i en behörighet";
  $message_sent = "Nu har användaren sparats i databasen";

  // user posted variables
  $uvm->set_userName($_POST['userName']);
  $uvm->set_userEmail($_POST['userEmail']);
  $uvm->set_userPhone($_POST['userPhone']);

  $uvm->set_userAddressDelivery($_POST['userAddressDelivery']);
  $uvm->set_userZipcodeDelivery($_POST['userZipcodeDelivery']);
  $uvm->set_userCityDelivery($_POST['userCityDelivery']);
  $uvm->set_userAddressInvoice($_POST['userAddressInvoice']);
  $uvm->set_userZipcodeInvoice($_POST['userZipcodeInvoice']);
  $uvm->set_userCityInvoice($_POST['userCityInvoice']);

  $uvm->set_userPassword($_POST['userPassword']);
  $uvm->set_userIsAdmin($_POST['userIsAdmin']);
  
  // validate presence of createUserName
  if(empty($uvm->get_userName())){
    $uvm->generate_response("error", $missing_createUser);
  }
  // validate presence of createUserEmail
  else if(empty($uvm->get_userEmail())){
    $uvm->generate_response("error", $missing_createEmail);
  }
  // validate presence of createUserPhone
  else if(empty($uvm->get_userPhone())){
    $uvm->generate_response("error", $missing_createPhone);
  }
  // validate presence of createUserAddressDelivery
  else if(empty($uvm->get_userAddressDelivery())){
    $uvm->generate_response("error", $missing_createAddressDelivery);
  }
  // validate presence of createUserZipcodeDelivery
  else if(empty($uvm->get_userZipcodeDelivery())){
    $uvm->generate_response("error", $missing_createZipcodeDelivery);
  }
  // validate presence of createUserCityDelivery
  else if(empty($uvm->get_userCityDelivery())){
    $uvm->generate_response("error", $missing_createCityDelivery);
  }
  // validate presence of createUserAddressInvoice
  else if(empty($uvm->get_userAddressInvoice())){
    $uvm->generate_response("error", $missing_createAddressInvoice);
  }
  // validate presence of createUserZipcodeInvoice
  else if(empty($uvm->get_userZipcodeInvoice())){
    $uvm->generate_response("error", $missing_createZipcodeInvoice);
  }
  // validate presence of createUserCityInvoice
  else if(empty($uvm->get_userCityInvoice())){
    $uvm->generate_response("error", $missing_createCityInvoice);
  }
  // validate presence of createUserPassword
  else if(empty($uvm->get_userPassword())){
    $uvm->generate_response("error", $missing_createPassword);
  }
  // validate presence of createUserIsAdmin
  else if(empty($uvm->get_userIsAdmin())){
    $uvm->generate_response("error", $missing_createIsAdmin);
  }
  else{ // ready to go
    $createUserName = $uvm->get_userName();
    $createUserEmail = $uvm->get_userEmail();
    $createUserPhone = $uvm->get_userPhone();
    $createUserPassword = $uvm->get_userPassword();

    $createUserAddressDelivery = $uvm->get_userAddressDelivery();
    $createUserZipcodeDelivery = $uvm->get_userZipcodeDelivery();
    $createUserCityDelivery = $uvm->get_userCityDelivery();
    $createUserAddressInvoice = $uvm->get_userAddressInvoice();
    $createUserZipcodeInvoice = $uvm->get_userZipcodeInvoice();
    $createUserCityInvoice = $uvm->get_userCityInvoice();

    $createUserIsAdmin = null;
    if ($uvm->get_userIsAdmin() == "admin"){
      $createUserIsAdmin = 1;
    }
    else{
      $createUserIsAdmin = 0;
    }

    $sql = "INSERT INTO user (name, email, phone, password, userlevel) VALUES ('$createUserName', '$createUserEmail', '$createUserPhone', '$createUserPassword', $createUserIsAdmin)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // gets the latest created ID
    $newUserId = $dbh->lastInsertId();

    // PTID 1 = mobile
    // $sql = "INSERT INTO phone (UID, PTID, Number) VALUES ('$newUserId', '1', '$createUserMobileNumber')";
    // $stmt = $dbh->prepare($sql);
    // $stmt->execute();

    // PTID 2 = work
    // $sql = "INSERT INTO phone (UID, PTID, Number) VALUES ('$newUserId', '2', '$createUserWorkNumber')";
    // $stmt = $dbh->prepare($sql);
    // $stmt->execute();

    // ADID 1 = delivery
    $sql = "INSERT INTO address (ADID, UID, Street, Zipcode, City) VALUES ('1', '$newUserId', '$createUserAddressDelivery', '$createUserZipcodeDelivery', '$createUserCityDelivery')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // ADID 2 = invoice
    $sql = "INSERT INTO address (ADID, UID, Street, Zipcode, City) VALUES ('2', '$newUserId', '$createUserAddressInvoice', '$createUserZipcodeInvoice', '$createUserCityInvoice')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $uvm->generate_response("success", $message_sent);
    // $uvm = new userViewModel();
  }
}

loadTemplate("createUser", $uvm);

?>