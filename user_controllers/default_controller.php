<?php
// products_controller.php


	// Om det finns en getparameter "cat" hämta produkter med motsvarande kategoriid. 

	$sql = 
		"SELECT * FROM product";

	// Eftersom $_GET används måste vi göra prepared statement för att undvika skadlig DB-kod.
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':catid', $_GET['cat']);
	$stmt->execute();

// Lagra resultatet från frågan i variabel
$productsData = $stmt->fetchAll(PDO::FETCH_OBJ);


// För att göra laddningen flexiblare används en funktion för templateladdning. (finns i includes/functions.inc.php)
loadTemplate("default", $productsData);