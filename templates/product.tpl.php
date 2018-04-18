

<!-- Single product page where more detailed info will be shown.  -->

<html>
    

    <h1><?php echo $templateData->Title;?></h1>
    <h2><?php echo $templateData->Description;?></h2>
    <h3><?php echo $templateData->Price;?> kronor</h3>


<h2>Lägg i varukorg</h2>
<form method="post" action="?controller=cart&action=add">
  
  <?php
           
            printf('<input type="hidden" name="newCartItem[pid]" value="%s">',$templateData->PID);
            print('<input type="text" name="newCartItem[antal]" value="1">');
?>
    <button type="submit">Lägg till kundvagn</button>
</form>
</html>