
<html>

<div class="image-wrapper"></div>

<!-- Printar ut rätt kategorinamn -->
<h1><?php echo $templateData[0]->title ?></h1>

<!-- Loopar ut rätt produkter, i $templateData sätts kategori till featured products -->
<?php foreach($templateData as $product) :?>

    <div class="product-wrapper col-md-3">
        <img id="productImage" src="<?php echo $product->Image ?>"/>
        <h2><a href="?controller=product&pid=<?php echo $product->PID;?>"><?php echo $product->Title;?></a></h2>
        <p><?php echo $product->Description;?></p>
        <p>Price: <?php echo $product->Price;?> SEK</p>
    </div>


<!-- Avslutar produktloopen -->
<?php 
endforeach;
?>

 

