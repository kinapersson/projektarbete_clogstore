<?php

class imageViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $imageURL = ""; 

  function set_imageURL($new_imageURL) {
    $this->imageURL = $new_imageURL;
  }
  function get_imageURL() {
    return $this->imageURL;
  }
}

global $ivm;
if(isset($_POST['imageURL'])){
  $ivm = new imageViewModel();

  // function to generate response
  function generate_response($type, $message){
    $ivm = new imageViewModel();
    if($type == "success") $ivm->set_response("<div class='alert alert-sucess text-center'>{$message}</div>");
    else $ivm->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }

  // response message
  $missing_imageURL = "Du har ej fyllt i en URL";
  $message_sent = "Nu har kategorin sparats i databasen";

  // user posted variables  
  $ivm->set_imageURL($_POST['imageURL']);

  // validate presence of imageURL
  if(empty($ivm->get_imageURL())){
      generate_response("error", $missing_imageURL);
  }
  else{ // ready to go
    $createImageURL = $ivm->get_imageURL();
    $sql = "INSERT INTO image (ImageURL) VALUES ('$createImageURL')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':ImageURL', $createImageURL);
    $stmt->execute();

    generate_response("sucess", $message_sent);
    $_POST['imageURL'] = "";
  }
  loadTemplate("createImage", $ivm);
}
else{
  $ivm = new imageViewModel();
  $ivm->set_response("");
  $ivm->set_imageURL("");

  loadTemplate("createImage", $ivm);
}

?>