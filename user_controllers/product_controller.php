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

$result = $stmt->fetch(PDO::FETCH_OBJ);
loadTemplate("product", $result);
?>



