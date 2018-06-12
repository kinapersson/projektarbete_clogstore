<?php

$sql = "SELECT * FROM user";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$getUserLevel = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($getUserLevel as $data) {
    if($_SESSION['u_id'] = $data->uid;){
        $isAdmin = $data->userlevel;
    }
}

?>