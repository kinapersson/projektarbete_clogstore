<?php

// Controllerns jobb är att fylla denna med data:
$data = "Running confirmation_controller.php";


//confirmation-kod ska upp här!



// Avsluta controllers med att ladda template om det ska göras.
loadTemplate('cart', $data);
echo $data;