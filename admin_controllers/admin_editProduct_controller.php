<?php

class productViewModel{
    function set_loadProducts($new_loadProducts){
        $this->loadProducts = $new_loadProducts;
    }
    
    function get_loadProducts(){
        return $this->loadProducts;
    }

    function set_loadCategories($new_loadCategories){
        $this->loadCategories = $new_loadCategories;
    }
    
    function get_loadCategories(){
        return $this->loadCategories;
    }
    
    function set_loadAttributes($new_loadAttributes){
        $this->loadAttributes = $new_loadAttributes;
    }
    
    function get_loadAttributes(){
        return $this->loadAttributes;
    }
}

function editProduct(){
    global $dbh;

    $id = $_POST['productId'];
    $updateProductTitle = $_POST['productTitle'];
    $updateProductDescription = $_POST['productDescription'];
    $updateProductPrice = $_POST['productPrice'];
    $updateProductImage = $_POST['productImage'];
    $updateAddCategories = $_POST['addCategories'];
    $updateAddAttributes = $_POST['addAttributes'];

    $sql = "UPDATE product SET Title = '$updateProductTitle', Description = '$updateProductDescription',  Price = '$updateProductPrice', Image = '$updateProductImage' WHERE PID = '$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM prodcat WHERE pid = $id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    foreach ($updateAddCategories as $cat)
    {
        $sql = "INSERT INTO prodcat (pid, catid) VALUES ('$id', '$cat')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    }

    $sql = "DELETE FROM attribute WHERE PID = $id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    foreach ($updateAddAttributes as $att)
    {
        $sql = "INSERT INTO attribute (PID, ATID) VALUES ('$id', '$att')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    }
}
if(isset($_POST['productTitle'])){
    editProduct();
}

$pvm = new productViewModel();

$sql = "SELECT * FROM product";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadProducts = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadProducts($loadProducts);

$sql = "SELECT * FROM category";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadCategories($loadCategories);

$sql = "SELECT * FROM attributetype";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$loadAttributes = $stmt->fetchAll(PDO::FETCH_OBJ);
$pvm->set_loadAttributes($loadAttributes);

loadTemplate("editProduct", $pvm);

?>