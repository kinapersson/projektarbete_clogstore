
<html>
    <h1>En produktlista</h1>

    <?php
    foreach($templateData as $product) :
    ?>

    <div style="background-color: lightpink;">
    <h2>
        <a href="?controller=product&pid=<?php echo $product->PID;?>">
            <?php echo $product->Title;
            ?>

        </a>
    </h2>
    <p>Pris: <?php echo $product->Price;?></p>
    <p><?php echo $product->Description;?></p>
    </div>
</html>

<?php 
endforeach;
?>