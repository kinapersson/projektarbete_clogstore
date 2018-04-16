<?php
//Denna kod är inte klar! 

$sql = "SELECT * FROM image WHERE image.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);


  //header("Content-type: image/jpeg");
  echo $product['ImageURL'];
?>