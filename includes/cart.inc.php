<?php

$idsInCart = array_keys($_SESSION['cart']);
foreach ($idsInCart as $key => $value) {
    $idsInCart[$key] = $dbh->quote($value);
}
$cartIdList = implode(',', $idsInCart);

// PDO::quote() ser till att för databasen skadliga tecken escapeas.
// http://php.net/manual/en/pdo.quote.php

$sql = "SELECT * FROM product WHERE pid IN ($cartIdList)";

$stmt = $dbh->prepare($sql);
$stmt->execute();


$cartData = $stmt->fetchAll(PDO::FETCH_OBJ);

var_dump($cartData);
//echo "<pre>";
//var_dump($result);

require 'templates/cart.tpl.php';