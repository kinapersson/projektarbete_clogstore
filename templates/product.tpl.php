

<!-- Single product page where more detailed info will be shown.  -->

<html>
    <img id="productImage" src="data:image/jpeg;base64, <?php echo base64_encode($templateData->Image->ImageURL); ?>"/>
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

<button type="button">Add to cart</button>
<br>
</html>