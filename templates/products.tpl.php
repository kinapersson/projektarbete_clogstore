<!-- Author: Kina -->
<html>

    <!-- Printar ut rätt kategori utifrån get-parametern -->
    <h1><?php 
        if(isset($_GET['cat'])) {
            echo $templateData[0]->title;
        } else {
            echo "All products";
        }?>
    </h1>
    
    <!-- Loopar ut rätt produkt, med tillhörande attribut -->
    <?php
    foreach($templateData as $product) :
    ?>

    <div class="product-wrapper col-md-3">
        <img id="productImage" src="<?php echo $product->Image ?>"/>
        <h2><a href="?controller=product&pid=<?php echo $product->PID;?>">
        <?php echo $product->Title;?></a></h2>
        <p><?php echo $product->Description;?></p>
        <p>Price: <?php echo $product->Price;?> SEK</p>  
        <a href="?controller=product&pid=<?php echo $product->PID;?>"><button id="addToCartBtn" class="btn btn-primary" type="submit">Buy</button></a>
    </div>


<!-- Avslutar produktloopen-->
<?php 
endforeach;
?>