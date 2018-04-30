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

  public function generate_response($type, $message){
    if($type == "success") $this->set_response("<div class='alert alert-success text-center'>{$message}</div>");
    else $this->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }
}

$avm = new attributeViewModel();

if(isset($_POST['attributeName'])){
  // response message
  $missing_createAttribute = "Du har ej fyllt i ett attribut";
  $message_sent = "Nu har attributet sparats i databasen";

  // user posted variables  
  $avm->set_attributeName($_POST['attributeName']);

  // validate presence of createAttribute
  if(empty($avm->get_attributeName())){
      $cvm->generate_response("error", $missing_createAttribute);
  }  
  else{ // ready to go
    $createAttributeName = $avm->get_attributeName();
    $sql = "INSERT INTO attributetype (AttributeNameType) VALUES ('$createAttributeName')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $createAttributeName);
    $stmt->execute();
    
    $avm->generate_response("success", $message_sent);
    // $avm = new attributeViewModel();
  }
}

loadTemplate("createAttribute", $avm);

?>