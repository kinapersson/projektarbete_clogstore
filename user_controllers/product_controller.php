<?php

echo "Running product_controller.php";

$sql = "SELECT * FROM product
        WHERE product.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();




//Sen vill vi köra den! Här går det också att använda prepare.
// $dbh->query($sql);
// $answer = $dbh->query($sql);

//Och printa med hjälp av den inbyggda funktionen fetchAll():

$product = $stmt->fetch(PDO::FETCH_OBJ);

$sql = "SELECT * FROM size
        WHERE size.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();

$product->sizes = $stmt->fetchAll(PDO::FETCH_OBJ);

loadTemplate("product", $product);
?>



