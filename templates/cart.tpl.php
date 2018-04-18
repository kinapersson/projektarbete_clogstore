<h2>Kundvagnen innehåller</h2>
<form method="post" action="?controller=cart&action=updateCart">
    <ul>
    <?php
        $cartSum = 0;
        while ($product = $stmt->fetch(PDO::FETCH_OBJ)) {

            $antal = $_SESSION['cart'][$product->pid];
           // var_dump($product);
            print('<li>');
            printf('Produktid: %s Titel: %s', $product->pid, $product->title);
            printf('<input type="text" name="cartItems[%s]" value="%s">',$product->pid, $antal);
            printf('<a href="?controller=cart&action=remove&pid=%s">Ta bort</a>', $product->pid);
            printf(' à pris: %s', $product->price);
            printf(' radsumma: %s', $product->price * $antal);
            print('</li>');

            $cartSum += $product->price * $antal;
    } // while fetch()

         foreach($_SESSION['cart'] as $pid => $amount) {
            print('<li>');
            printf('Produktid: %s', $pid);
            printf('<input type="text" name="cartItems[%s]" value="%s">',$pid, $amount);
            printf('<a href="?controller=cart&action=remove&pid=%s">Ta bort</a>', $pid);
            print('</li>');
        }

    ?>
    </ul>
    <?php printf('Totalsumma: %s', $cartSum); ?>
    <button type="submit">Uppdatera kundvagn</button>
</form>
