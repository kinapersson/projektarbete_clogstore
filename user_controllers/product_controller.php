<?php

//echo "Running product_controller.php";

//Hämta PID via get-parameter:
$sql = "SELECT * FROM product
        WHERE product.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);


//Hämta tillgängliga storlekar på aktuell produkt:
$sql = "SELECT * FROM size
        WHERE size.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();

$product->sizes = $stmt->fetchAll(PDO::FETCH_OBJ);

//Hämtar bild:
//Denna vill vi förmodligen lägga i en egen controller!!!
$sql = "SELECT ImageURL FROM image
        WHERE image.PID = :pid ";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':pid', $_GET['pid']);
$stmt->execute();

$product->Image = $stmt->fetch(PDO::FETCH_OBJ);


//Laddar rätt template:
loadTemplate("product", $product);
?>



