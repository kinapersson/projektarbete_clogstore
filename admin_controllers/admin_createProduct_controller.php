<?php

class productViewModel{
  function set_loadCategories($new_loadCategories){
    $this->loadCategories = $new_loadCategories;
  }
  
  function get_loadCategories(){
    return $this->loadCategories;
  }

  function set_loadAttributes($new_loadAttributes){
    $this->loadAttributes = $new_loadAttributes;
  }

  function get_loadAttributes(){
    return $this->loadAttributes;
  }

  public $response = ""; 

  function set_response($new_response){
    $this->response = $new_response;
  }
  function get_response(){
    return $this->response;
  }

  public $productTitle = ""; 

  function set_productTitle($new_productTitle){
    $this->productTitle = $new_productTitle;
  }
  function get_productTitle(){
    return $this->productTitle;
  }

  public $productDescription = ""; 

  function set_productDescription($new_productDescription){
    $this->productDescription = $new_productDescription;
  }
  function get_productDescription(){
    return $this->productDescription;
  }

  public $productPrice = ""; 

  function set_productPrice($new_productPrice){
    $this->productPrice = $new_productPrice;
  }
  function get_productPrice(){
    return $this->productPrice;
  }

  public $productImage = "";

  function set_productImage($new_productImage){
    $this->productImage = $new_productImage;
  }
  function get_productImage(){
    return $this->productImage;
  }

  public function generate_response($type, $message){
    if($type == "success") $this->set_response("<div class='alert alert-success text-center'>{$message}</div>");
    else $this->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }
}

$pvm = new productViewModel();

if(isset($_POST['productTitle'])){
  // response message
  $missing_productTitle = "Du har ej fyllt i en titel";
  $missing_productDescription = "Du har ej fyllt i en beskrivning";
  $missing_productPrice = "Du har ej fyllt i ett pris";
  $missing_productImage = "Du har ej fyllt i en bild";
  $message_sent = "Nu har kategorin sparats i databasen";

  // user posted variables
  $pvm->set_productTitle($_POST['productTitle']);
  $pvm->set_productDescription($_POST['productDescription']);
  $pvm->set_productPrice($_POST['productPrice']);
  $pvm->set_productImage($_POST['productImage']);
  $productCategories = $_POST['addCategories'];
  $productAttributes = $_POST['addAttributes'];

  // validate presence of productTitle
  if(empty($pvm->get_productTitle())){
      $pvm->generate_response("error", $missing_productTitle);
  }
  // validate presence of productDescrption
  else if(empty($pvm->get_productDescription())){
    $pvm->generate_response("error", $missing_productDescription);
  }
  // validate presence of productPrice
  else if(empty($pvm->get_productPrice())){
    $pvm->generate_response("error", $missing_productPrice);
  }
  // validate presence of productImage
  else if(empty($pvm->get_productImage())){
    $pvm->generate_response("error", $missing_productImage);
  }
  else{ // ready to go
    // saves the information to the product tabel
    $createProductTitle = $pvm->get_productTitle();
    $createProductDescription = $pvm->get_productDescription();
    $createProductPrice = $pvm->get_productPrice();
    $createProductImage = $pvm->get_productImage();
    $sql = "INSERT INTO product (Title, Description, Price, Image) VALUES ('$createProductTitle', '$createProductDescription', '$createProductPrice', '$createProductImage')";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    // gets the latest created ID
    $newProdId = $dbh->lastInsertId();

    // saves which categories the product has
    foreach ($productCategories as $cat)
    {
      $sql = "INSERT INTO prodcat (pid, catid) VALUES ('$newProdId', '$cat')";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }

    // saves which categories the product has
    foreach ($productAttributes as $att)
    {
      $sql = "INSERT INTO attribute (PID, ATID) VALUES ('$newProdId', '$att')";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }

    $pvm->generate_response("success", $message_sent);
     //$pvm = new productViewModel();
  }
}

$sql = "SELECT * FROM category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadCategories($loadCategories);

$sql = "SELECT * FROM attributetype";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadAttributes = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadAttributes($loadAttributes);

loadTemplate("createProduct", $pvm);

?>