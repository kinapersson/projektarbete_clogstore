<?php
//<!-- Author: Kina -->
//Hämtar PID via get-parameter:
$sql = "SELECT * FROM product
        WHERE product.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);


//Hämtar tillgängliga storlekar på aktuell produkt:
$sql = "SELECT * FROM size
        WHERE size.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();

$product->sizes = $stmt->fetchAll(PDO::FETCH_OBJ);

//Laddar rätt template:
loadTemplate("product", $product);
?>



