<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<div class="header">
    <h1><a href="?controller=default">CLOGSTORE</a></h1>
    <?php if($isAdmin = 1){ ?>
        <h1><a href="?controller=frontpage">Admin</a></h1>
    <?php } var_dump($isAdmin); ?>

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

<!-- dessa avslutas i footern -->
<div class="container-fluid main-content"><div class="row">
    

