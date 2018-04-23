<?php

class attributeViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $attributeName = ""; 

  function set_attributeName($new_attributeName) {
    $this->attributeName = $new_attributeName;
  }
  function get_attributeName() {
    return $this->attributeName;
  }
}

global $avm;
if(isset($_POST['attributeName'])){
  $avm = new attributeViewModel();

  // function to generate response
  function generate_response($type, $message){
    $avm = new attributeViewModel();
    if($type == "success") $avm->set_response("<div class='alert alert-sucess text-center'>{$message}</div>");
    else $avm->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }

  // response message
  $missing_createAttribute = "Du har ej fyllt i ett attribut";
  $message_sent = "Nu har attributet sparats i databasen";

  // user posted variables
  $avm->set_attributeName($_POST['attributeName']);

  // validate presence of createCategori
  if(empty($avm->get_attributeName())){
      generate_response("error", $missing_createAttribute);
  }
  else{ // ready to go
    $createAttributeName = $avm->get_attributeName();
    $sql = "INSERT INTO attributetype (AttributeNameType) VALUES ('$createAttributeName')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':attributetype', $createAttributeName);
    $stmt->execute();

    generate_response("sucess", $message_sent);
    $_POST['attributeName'] = "";
  }
  loadTemplate("createAttribute", $avm);
}
else{
  $avm = new attributeViewModel();
  $avm->set_response("");
  $avm->set_attributeName("");

  loadTemplate("createAttribute", $avm);
}

?>