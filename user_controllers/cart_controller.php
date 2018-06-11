<?php

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

        $_SESSION['prodAdded'] = true;
        header("Location:".$_SERVER['HTTP_REFERER']);
        break;

    case "remove":
        $pid = $_GET['pid'] ?? null;
        unset($_SESSION['cart'][$pid]);
        header("Location:".$_SERVER['HTTP_REFERER']);
        break;
    case "updateCart":

        foreach($_POST['cartItems'] as $pid => $amount) {
            $_SESSION['cart'][(integer)$pid] = (integer)$amount;
            if ($_SESSION['cart'][$pid] < 1) unset($_SESSION['cart'][$pid]);
        }

        break;

    case "display":
         
        var_dump($_SESSION['cart']);

        break;

    default:
     
}

loadTemplate('cart', '$data');