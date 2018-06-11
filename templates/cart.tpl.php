<section class="container fluid" id="cart_module" style="padding-top:25px">
   <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

   
<h2>Cart</h2>
    

<form method="post" action="?controller=cart&action=updateCart">
    <ul>
    <?php

        $cartSum = 0;
        global $cartData;

       // while ($product = $stmt->fetch(PDO::FETCH_OBJ)) {

          

            foreach ($cartData as $key => $product) {
           
            $antal = $_SESSION['cart'][$product->PID];
           

            print('<li>');


            printf($product->Title);
            echo "<br>";
            printf($product->Description);
            echo "<br>";

            printf('<input type="text" name="cartItems[%s]" value="%s">',$product->PID, $antal);
            echo "<br>";
  
           
            echo "<br>";
            printf(' Pris: %s', $product->Price);
            echo "<br>";
            printf(' Totalt: %s', $product->Price * $antal);
            echo "<br>";
            printf('<a href="?controller=cart&action=remove&pid=%s" class="btn btn-danger m-b-10px">Ta bort</a>', $product->PID);
            print('</li>');



            $cartSum += $product->Price * $antal;
    } // while fetch()
/*
         foreach($_SESSION['cart'] as $pid => $amount) {
            print('<li>');
            printf('Produktid: %s', $pid);
            printf('<input type="text" name="cartItems[%s]" value="%s">',$pid, $amount);
            printf('<a href="?controller=cart&action=remove&pid=%s">Ta bort</a>', $pid);
            print('</li>');
        }
        */

    ?>
    </ul>
    <?php 

    echo "<div class='col-md-12'>";

        printf('Totalsumma: %s', $cartSum); ?>
    <button type="submit" class="btn btn-info">Update Cart</button>
</div>
</form>
</div>


    <div class='col-md-4'>  
            <a href='?controller=checkout' class='btn btn-success m-b-10px'>
                 <span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout</a>
    </div>
</div>


