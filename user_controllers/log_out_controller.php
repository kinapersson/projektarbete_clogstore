<?php


    session_unset();
    session_destroy();
    //send user to start page
    header('?controller=default');
$logout ='';

loadTemplate("log_out", $logout);
?>



