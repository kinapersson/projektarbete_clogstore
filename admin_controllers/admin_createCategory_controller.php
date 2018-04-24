<?php

class categoryViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $categoryName = ""; 

  function set_categoryName($new_categoryName) {
    $this->categoryName = $new_categoryName;
  }
  function get_categoryName() {
    return $this->categoryName;
  }

  public function generate_response($type, $message){
    if($type == "success") $this->set_response("<div class='alert alert-success text-center'>{$message}</div>");
    else $this->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }
}

$cvm = new categoryViewModel();

if(isset($_POST['categoryName'])){
  // response message
  $missing_createCategory = "Du har ej fyllt i ett kategorinamn";
  $message_sent = "Nu har kategorin sparats i databasen";

  // user posted variables  
  $cvm->set_categoryName($_POST['categoryName']);

  // validate presence of createCategori
  if(empty($cvm->get_categoryName())){
      $cvm->generate_response("error", $missing_createCategory);
  }  else{ // ready to go
    $createCategoryName = $cvm->get_categoryName();
    $sql = "INSERT INTO category (title) VALUES ('$createCategoryName')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $createCategoryName);
    $stmt->execute();

   $cvm->generate_response("success", $message_sent);
    $_POST['categoryName'] = "";
  }
}

loadTemplate("createCategory", $cvm);

?>