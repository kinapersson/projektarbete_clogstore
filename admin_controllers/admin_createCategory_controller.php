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
}

global $cvm;
if(isset($_POST['categoryName'])){
  $cvm = new categoryViewModel();

  // function to generate response
  function generate_response($type, $message){
    $cvm = new categoryViewModel();
    if($type == "success") $cvm->set_response("<div class='alert alert-sucess text-center'>{$message}</div>");
    else $cvm->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }

  // response message
  $missing_createCategory = "Du har ej fyllt i ett kategorinamn";
  $message_sent = "Nu har kategorin sparats i databasen";

  // user posted variables  
  $cvm->set_categoryName($_POST['categoryName']);

  // validate presence of createCategori
  if(empty($cvm->get_categoryName())){
      generate_response("error", $missing_createCategory);
  }
  else{ // ready to go
    $createCategoryName = $cvm->get_categoryName();
    $sql = "INSERT INTO category (title) VALUES ('$createCategoryName')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $createCategoryName);
    $stmt->execute();

    generate_response("sucess", $message_sent);
    $_POST['categoryName'] = "";
  }
  loadTemplate("createCategory", $cvm);
}
else{
  $cvm = new categoryViewModel();
  $cvm->set_response("");
  $cvm->set_categoryName("");

  loadTemplate("createCategory", $cvm);
}

?>