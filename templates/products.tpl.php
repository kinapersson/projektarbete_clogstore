
<html>

    <h1><?php if(isset($_GET['cat'])) {
        echo $templateData[0]->title;
    } else {
        echo "All products";
    } ?></h1>

    <?php
    foreach($templateData as $product) :
    ?>

<div class="products">
    <h2>
        <a href="?controller=product&pid=<?php echo $product->PID;?>">
            <?php echo $product->Title;
            ?>

        </a>
    </h2>
    <p><?php echo $product->Description;?></p>
    <p>Price: <?php echo $product->Price;?> SEK</p>
    
    </div>
</html>

<?php 
endforeach;
?>