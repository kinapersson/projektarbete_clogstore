<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="header">
    <h1><a href="?controller=default">CLOGSTORE</a></h1>

    <ul>
    <li><a href="?controller=default">Home</a></li>
    
    <li class="dropdown">
        <a href="?controller=products" class="dropbtn">Products</a>
        <div class="dropdown-content">
        <a href="?controller=products">All products</a>
        <a href="?controller=products&cat=1">Men</a>
        <a href="?controller=products&cat=2">Women</a>
        <a href="?controller=products&cat=3">Kids</a>
        </div>
    
        <li><a href="?controller=cart">Cart</a></li>
        
        <li class="dropdown">
        <a href="?controller=sign_in" class="dropbtn">Sign in</a>
        <div class="dropdown-content">
            <a href="?controller=log_in">Customer</a>
        <a href="?controller=sign_in">Admin</a>
        </div>
    </li>
        <li><?php if (isset($_SESSION['u_id'])){ echo '<a href="?controller=log_out">Logout';}?></a></li>
    </ul>

</div>
    

