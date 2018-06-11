<section class="container" style="padding-top:25px">
   <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

   
<h2>Cart</h2>
<form method="post" action="?controller=cart&action=updateCart">
    <?php
        $cartSum = 0;
        global $cartData;
    ?>
<div class="container">
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Total</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
            foreach ($cartData as $key => $product) {
            $antal = $_SESSION['cart'][$product->PID];
        ?>
      <tr>
        <td>
            <?php
            printf($product->Title);
            ?>
        </td>
        <td>
            <?php
            printf($product->Description);
            ?>
        </td>

        <td>
            <?php
            printf('<input type="text" name="cartItems[%s]" value="%s">',$product->PID, $antal);
            ?>
        </td>

        <td>
            <?php
            printf(' Totalt: %s', $product->Price * $antal);
            ?>
        </td>

        <td>
            <?php
            
            printf('<a href="?controller=cart&action=remove&pid=%s" class="btn btn-danger m-b-10px">Ta bort</a>', $product->PID);
            ?>
        </td>

      </tr>    
     <?php 
        $cartSum += $product->Price * $antal;
    }
     ?>
    </tbody>
  </table>
      <?php
    echo "<div class='col-md-12'>";
    printf('Totalsumma: %s', $cartSum);
    ?>
</div>
<div class='col-md-4'> 
    <button type="submit" class="btn btn-info">Update Cart</button>
</div>
</form>

    <div class='col-md-4'>  
            <a href='?controller=checkout' class='btn btn-success'>
                 <span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout</a>
    </div>
</div>



