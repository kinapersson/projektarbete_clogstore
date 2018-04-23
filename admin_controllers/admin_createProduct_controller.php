<?php

class productViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $productTitle = ""; 

  function set_productTitle($new_productTitle) {
    $this->productTitle = $new_productTitle;
  }
  function get_productTitle() {
    return $this->productTitle;
  }

  public $productDescription = ""; 

  function set_productDescription($new_productDescription) {
    $this->productDescription = $new_productDescription;
  }
  function get_productDescription() {
    return $this->productDescription;
  }

  public $productPrice = ""; 

  function set_productPrice($new_productPrice) {
    $this->productPrice = $new_productPrice;
  }
  function get_productPrice() {
    return $this->productPrice;
  }
}

global $pvm;
if(isset($_POST['productTitle'])){
  $pvm = new productViewModel();

  // function to generate response
  function generate_response($type, $message){
    $pvm = new productViewModel();
    if($type == "success") $pvm->set_response("<div class='alert alert-sucess text-center'>{$message}</div>");
    else $pvm->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }

  // response message
  $missing_productTitle = "Du har ej fyllt i ett produktitel";
  $missing_productDescription = "Du har ej fyllt i en beskrivning";
  $missing_productPrice = "Du har ej fyllt i ett pris";
  $message_sent = "Nu har kategorin sparats i databasen";

  // user posted variables
  $pvm->set_productTitle($_POST['productTitle']);
  $pvm->set_productDescription($_POST['productDescription']);
  $pvm->set_productPrice($_POST['productPrice']);

  // validate presence of productTitle
  if(empty($pvm->get_productTitle())){
      generate_response("error", $missing_productTitle);
  }
  // validate presence of productDescrption
  else if(empty($pvm->get_productDescription())){
      generate_response("error", $missing_productDescription);
  }
  // validate presence of productPrice
  else if(empty($pvm->get_productPrice())){
      generate_response("error", $missing_productPrice);
  }
  else{ // ready to go
    $createProductTitle = $pvm->get_productTitle();
    $createProductDescription = $pvm->get_productDescription();
    $createProductPrice = $pvm->get_productPrice();
    $sql = "INSERT INTO product (Title, Description, Price) VALUES ('$createProductTitle', '$createProductDescription', '$createProductPrice')";
    $stmt = $dbh->prepare($sql);
    // $stmt->bindParam(':title', $createCategoryName);
    $stmt->execute();

    generate_response("sucess", $message_sent);
    $_POST['productTitle'] = "";
    $_POST['productDescription'] = "";
    $_POST['productPrice'];
  }
  loadTemplate("createProduct", $pvm);
}
else{
  $pvm = new productViewModel();
  $pvm->set_response("");
  $pvm->set_productTitle("");
  $pvm->set_productDescription("");
  $pvm->set_productPrice("");

  loadTemplate("createProduct", $pvm);
}

?>