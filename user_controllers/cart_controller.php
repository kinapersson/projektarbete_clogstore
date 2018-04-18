<?php

// Controllerns jobb är att fylla denna med data:
$data = "Running cart_controller.php";

switch ($_GET['action'] ?? null) {
    case "add":
    case "set":
        $pid = (integer)$_POST['newCartItem']['pid'];
        $amount = (integer)$_POST['newCartItem']['antal'];

        if ($_GET['action'] === "add") {
            if (array_key_exists($pid, $_SESSION['cart'])) {
                $amount = $amount + $_SESSION['cart'][$pid];
            }
        }

        $_SESSION['cart'][$pid] = $amount;

        // Att sätta antal mindre än 1 på en produkt tar bort den från varukorgen
        if ($_SESSION['cart'][$pid] < 1) unset($_SESSION['cart'][$pid]);

        break;

    case "remove":
        $pid = $_GET['pid'] ?? null;
        unset($_SESSION['cart'][$pid]);
        break;
    case "updateCart":

        foreach($_POST['cartItems'] as $pid => $amount) {
            $_SESSION['cart'][(integer)$pid] = (integer)$amount;
            if ($_SESSION['cart'][$pid] < 1) unset($_SESSION['cart'][$pid]);
        }

        break;

    case "display":
        /*
        * Testkod för att dela en kundvagn. Inte komplett...
        */
        /*
        echo "foo";
        $sql = "SELECT * FROM carts WHERE idcarts = :cartid";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':cartid', $_GET['cartid']);
        $stmt->execute();

        var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
*/
        
        var_dump($_SESSION['cart']);

        break;

    default:
        echo "Matchar ingen action";
}



echo "<pre>";
var_dump($_SESSION);

header("Location: ".$_SERVER['HTTP_REFERER']);


//Cart-systemet ska upp här genom cart-classen!



// Avsluta controllers med att ladda template om det ska göras.
// loadTemplate('cart', $data);
// echo $data;

