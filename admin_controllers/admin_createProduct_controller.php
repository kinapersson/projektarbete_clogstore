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

  public $productSizes = ""; 

  function set_productSizes($new_productSizes){
    $sizes = explode(",", $new_productSizes);
    $this->productSizes = $sizes;
  }
  function get_productSizes(){
    return $this->productSizes;
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
    $uploadDir= 'media';

    $origFileName = strtolower(basename($new_productImage));
    //Ta ut en delsträng med substr() med start på position för sista punkten +1.
    //+1 för att inte få med själva punkttecknet. 
    $fileExtension= substr($origFileName, strripos($origFileName, '.')+1);

    //Skapar slumpmässigt namn:
    $randName1= md5(round(microTime(true)).mt_rand());
    $fileName= $randName1.'.'.$fileExtension;
    $destination= $uploadDir.'/'.$fileName;
    $this->productImage = $destination;
  }

  function get_productImage(){
    return $this->productImage;
  }

  // new productCategories
  public $productCategories = "";

  function set_productCategories($new_productCategories){
    $this->productCategories = $new_productCategories;
  }
  function get_productCategories(){
    return $this->productCategories;
  }

    // new productAttributes
    public $productAttributes = "";

    function set_productAttributes($new_productAttributes){
      $this->productAttributes = $new_productAttributes;
    }
    function get_productAttributes(){
      return $this->productAttributes;
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
  $missing_productCategories = "Du har ej fyllt i en kategori";
  $missing_productAttributes = "Du har ej fyllt i ett attribut";
  $missing_productSizes = "Du har ej fyllt i storlek och antal";
  $message_sent = "Nu har produkten sparats i databasen";

  // user posted variables
  $pvm->set_productTitle($_POST['productTitle']);
  $pvm->set_productDescription($_POST['productDescription']);
  $pvm->set_productPrice($_POST['productPrice']);
  $pvm->set_productImage($_FILES['productImage']['name']);
  $pvm->set_productCategories($_POST['addCategories']);
  $pvm->set_productAttributes($_POST['addAttributes']);
  $pvm->set_productSizes($_POST['productSizes']);
  // $productCategories = $_POST['addCategories'];
  // $productAttributes = $_POST['addAttributes'];

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
  else if(count($pvm->get_productSizes()) < 1){
    $pvm->generate_response("error", $missing_productSizes);
  }
  // validate presence of productImage
  else if(empty($pvm->get_productImage())){
    $pvm->generate_response("error", $missing_productImage);
  }
  // validate presence of addCategories
  else if(empty($pvm->get_productCategories())){
    $pvm->generate_response("error", $missing_productCategories);
  }
  // validate presence of addAttributes
  else if(empty($pvm->get_productAttributes())){
    $pvm->generate_response("error", $missing_productAttributes);
  }
  else{ // ready to go
    // saves the information to the product tabel
    $createProductTitle = $pvm->get_productTitle();
    $createProductDescription = $pvm->get_productDescription();
    $createProductPrice = $pvm->get_productPrice();
    $createProductImage = $pvm->get_productImage();
    $sql = "INSERT INTO product (Title, Description, Price, Image) VALUES ('$createProductTitle', '$createProductDescription', '$createProductPrice', '$createProductImage')";
    $stmt = $dbh->prepare($sql);
    // $stmt->execute();
    
   
    if($stmt->execute())
      move_uploaded_file($_FILES['productImage']['tmp_name'],$pvm->get_productImage());

    // gets the latest created ID
    $newProdId = $dbh->lastInsertId();

    // saves which categories the product has
    $createProductCategories = $pvm->get_productCategories();
    foreach ($createProductCategories as $cat)
    {
      $sql = "INSERT INTO prodcat (pid, catid) VALUES ('$newProdId', '$cat')";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }

    // saves which attributes the product has
    $createProductAttributes = $pvm->get_productAttributes();
    foreach ($createProductAttributes as $att)
    {
      $sql = "INSERT INTO attribute (PID, ATID) VALUES ('$newProdId', '$att')";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }

    $createProductSizes = $pvm->get_productSizes();
    foreach ($createProductSizes as $size)
    {
      
      $stock = explode(":",$size);
      if (count($stock) > 1) {
        $sql = "INSERT INTO size (PID, Size, Stock) VALUES ('$newProdId', '$stock[0]', $stock[1])";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
      }
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