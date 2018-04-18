

<!-- Single product page where more detailed info will be shown.  -->

<html>
    <div class="productImage">
        <img id="productImage" src="data:image/jpeg;base64, <?php echo base64_encode($templateData->Image->ImageURL); ?>"/>
    </div>
    
    <div class="productDetails">
        <h1><?php echo $templateData->Title;?></h1>
        <h2><?php echo $templateData->Description;?></h2>
        <h3><?php echo $templateData->Price;?> SEK</h3>


        <form>
            <p>Size:</p>
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

<h2>Lägg i varukorg</h2>
<form method="post" action="?controller=cart&action=add">
  
  <?php
           
            printf('<input type="hidden" name="newCartItem[pid]" value="%s">',$templateData->PID);
            print('<input type="text" name="newCartItem[antal]" value="1">');
?>
    <button id="addToCartBtn" type="submit">Lägg till kundvagn</button>
</form>

    </div>
</html>