<?php

class pageViewModel { 
  public $response = ""; 

  function set_response($new_response) {
    $this->response = $new_response;
  }
  function get_response() {
    return $this->response;
  }

  public $aboutUsText = ""; 

  function set_aboutUsText($new_aboutUsText) {
    $this->aboutUsText = $new_aboutUsText;
  }
  function get_aboutUsText() {
    return $this->aboutUsText;
  }

  function set_loadPageInfo($new_loadPageInfo){
    $this->loadPageInfo = $new_loadPageInfo;
  }

  function get_loadPageInfo(){
    return $this->loadPageInfo;
  }

  public function generate_response($type, $message){
    if($type == "success") $this->set_response("<div class='alert alert-success text-center'>{$message}</div>");
    else $this->set_response("<div class='alert alert-danger text-center'>{$message}</div>");
  }
}

$pvm = new pageViewModel();

if(isset($_POST['aboutUsText'])){
  // response message
  $missing_aboutUsText = "Du har ej fyllt i en text";
  $message_sent = "Nu har texten sparats i databasen";

  // user posted variables  
  $pvm->set_aboutUsText($_POST['aboutUsText']);

  // validate presence of aboutUsText
  if(empty($pvm->get_aboutUsText())){
      $pvm->generate_response("error", $missing_aboutUsText);
  }  
  else{ // ready to go
    $updateAboutUsText = $pvm->get_aboutUsText();
    $sql = "UPDATE pageinfo SET aboutus = '$updateAboutUsText' WHERE pageid = 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':aboutus', $updateAboutUsText);
    $stmt->execute();
    
    $pvm->generate_response("success", $message_sent);
  }
}

$sql = "SELECT * FROM pageinfo";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadPageInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadPageInfo($loadPageInfo);

loadTemplate("editPage", $pvm);

?>