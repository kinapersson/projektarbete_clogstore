<?php
//default_controller.php
//Är samma som frontpage_controller.php!


$sql = "SELECT product.*, category.title FROM prodcat
JOIN product ON product.PID = prodcat.pid
JOIN category ON category.catid = prodcat.catid
WHERE prodcat.catid = 4";
// Eftersom $_GET används måste vi göra prepared statement för att undvika skadlig DB-kod.
$stmt = $dbh->prepare($sql);
//$stmt->bindParam(':catid', $_GET['cat']);
$stmt->execute();

// Lagra resultatet från frågan i variabel
$productsData = $stmt->fetchAll(PDO::FETCH_OBJ);



//Hämtar ut rätt bild:



//Printa ut rätt kategorinamn som titel:
//OBS ej klar!
// $sql = "SELECT title FROM category WHERE category.catid = 4";
// $stmt = $dbh->prepare($sql); 
// $stmt->execute();

// $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);


// För att göra laddningen flexiblare används en funktion för templateladdning. (finns i includes/functions.inc.php)
loadTemplate("default", $productsData);