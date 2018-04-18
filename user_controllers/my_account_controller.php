<?php

// Controllerns jobb är att fylla denna med data:
$data = "Running my_account_controller.php";


//My account-kod ska in här!



// Avsluta controllers med att ladda template om det ska göras.
loadTemplate('my_account', $data);
echo $data;