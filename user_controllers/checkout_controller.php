<?php

// Controllerns jobb är att fylla denna med data:
// $data = "Running checkout_controller.php";


//Checkout-systemet ska in här!

// Check if someone is logged in - INTE KLAR
 $_SESSION['user'] = $UID;

 if (isset($_SESSION['user'])) {
   // logged in
 } else {
   // not logged in
 }

//clean user input to prevent sql injection
// kod ska in här

//validate
// kod ska in här

// secure the password

// checkout form
if(isset($_POST['Name'])){
 
 $name = $_POST['name'];

  if (empty($name)) {
        $error = true;
        $errorFN = 'Fill in your name';
    }


//Store user info in database
// inte klar - skapa new table dataorder
    $sql = "INSERT INTO dataorder (name) VALUES ('$name');";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":name", $_POST['name']); 
   
    $dbh->exec($sql);
}

// Avsluta controllers med att ladda template om det ska göras.
loadTemplate('checkout', '$data');
// echo $data;


