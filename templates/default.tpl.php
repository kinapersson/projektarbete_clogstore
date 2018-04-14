
<html>

    <h1>Featured products</h1>

    <?php
    foreach($templateData as $product) :
    ?>

<div class="productsFrontPage">
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