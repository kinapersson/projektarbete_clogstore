<?php
// index.php
session_start();

// Konfigurationer
require_once("includes/settings.inc.php");
// Anslut till DB
require_once("includes/db.inc.php");

// Inkludera fil med hjälpfunktioner
require_once("includes/functions.inc.php");

// Hantera ev inloggning

// Ladda rätt controller

// Läs in fil med definierade routes
require_once("includes/routes.inc.php");

// Om det finns någon getparameter controller:
$controller = $_GET['controller'] ?? "default";
// Om angiven controller inte finns i vår routesarray, sätt till "default"
if (!array_key_exists($controller, $routes))
	$controller = "default";


//include_once("templates/header.tpl.php");

//Den här behöver vi komplettera med admin-controllers!!!
require_once("user_controllers/".$routes[$controller]);

//include_once("templates/footer.tpl.php");
// include_once("css/style.css");
