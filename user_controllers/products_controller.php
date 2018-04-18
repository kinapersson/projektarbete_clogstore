<?php
// products_controller.php

if (isset($_GET['cat'])) {

	// Om det finns en getparameter "cat" hämta produkter med motsvarande kategoriid. 

	$sql = 
		"SELECT * FROM product, prodcat, category 
		WHERE product.pid = prodcat.pid
		AND prodcat.catid = category.catid
		AND prodcat.catid = :catid";

		// Eftersom $_GET används måste vi göra prepared statement för att undvika skadlig DB-kod.
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':catid', $_GET['cat']);
	$stmt->execute();

} else {
	// Annars hämta alla produkter.
	// Eftersom ingen varabel data används kan vi köra query direkt (inte prepared).
	$sql = "SELECT * FROM product";
	$stmt = $dbh->query($sql);
}

// Lagra resultatet från frågan i variabel
$productsData = $stmt->fetchAll(PDO::FETCH_OBJ);


// För att göra laddningen flexiblare används en funktion för templateladdning. (finns i includes/functions.inc.php)
loadTemplate("products", $productsData);