<!-- Author: Kina -->
<html>
    <!-- Hämtar rätt bild -->
    <div class="col-md-4 productImage">
        <img id="productImage" src="<?php echo $templateData->Image; ?>"/>
    </div>
    
    <!-- Printar ut aktuell produkt och dess attribut -->
    <div class="col-md-4 productDetails">
        <h1><?php echo $templateData->Title;?></h1>
        <h5><?php echo $templateData->Description;?></h2>
        <h4><?php echo $templateData->Price;?> SEK</h3>

        <!-- Loopar ut tillgängliga storlekar från DB i en select-lista -->
        <form>
            <label>Size:</label>
            <select>
            <?php foreach ($templateData->sizes as $size) {
                if ($size->Stock > 0) {
                    echo "<option value='".$size->Size."'>".$size->Size."</option>";
                } else {
                    echo "<option disabled>".$size->Size." SLUT</option>";
                }
                }
            ?>
            </select>
        </form>

<!-- Author: Marie -->
<!-- Add to Cart -->

<form method="post" action="?controller=cart&action=add">
  <?php
        printf('<input type="hidden" name="newCartItem[pid]" value="%s">',$templateData->PID);
        print('<input type="hidden" name="newCartItem[antal]" value="1">');
?>
    <button id="addToCartBtn" class="btn btn-primary" type="submit">Add to Cart</button>

<?php   
    if (isset($_SESSION['prodAdded'])) { 
        unset($_SESSION['prodAdded']);
    ?>

<p><div class='alert alert-info'>
            <p>Product was added to your cart
</div></p>

<?php    } ?>
</form>

    </div>
</html>