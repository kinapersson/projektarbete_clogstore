<?php
//STARTSIDAN

//Hämtar alla produkter i featured products-kategorin:
$sql = "SELECT product.*, category.title FROM prodcat
JOIN product ON product.PID = prodcat.pid
JOIN category ON category.catid = prodcat.catid
WHERE prodcat.catid = 4";
$stmt = $dbh->prepare($sql);
$stmt->execute();

// Lagra resultatet från frågan i variabel
$productsData = $stmt->fetchAll(PDO::FETCH_OBJ);

// För att göra laddningen flexiblare används en funktion för templateladdning. (finns i includes/functions.inc.php)
loadTemplate("default", $productsData);