<?php

//My account-kod ska in här
//var_dump($_POST);

//show email is when logged in
if (isset($_POST['email'])) {

    $uid = $_POST["email"];
    $sql = "SELECT * FROM user";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$result='';
loadTemplate("my_account", $result);


?>
