<?php
//Denna kod är inte klar och körs inte från någon sida (finns dock i product-controllern) 

$sql = "SELECT ImageURL FROM image
        WHERE image.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();

$product->Image = $stmt->fetch(PDO::FETCH_OBJ);


//Laddar rätt template:
loadTemplate("product", $product);
?>