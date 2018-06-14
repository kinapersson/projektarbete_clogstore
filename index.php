<?php
// index.php
session_start();

require 'classes/user.class.php';
$user = new User();

// Konfigurationer
require_once("includes/settings.inc.php");
// Anslut till DB
require_once("includes/db.inc.php");

// Inkludera fil med hjälpfunktioner
require_once("includes/functions.inc.php");

// Läs in fil med definierade routes
require_once("includes/routes.inc.php");

//$isAdmin = false;
//if($isAdmin == true){
if ($user->isUserAdmin()) {
	$controller = $_GET['controller'] ?? "frontpage";
	if (!array_key_exists($controller, $routes))
		$controller = "frontpage";

	require_once("admin_controllers/".$routes[$controller]);
}
else{
	require_once("includes/cart.inc.php");

	// Om det finns någon getparameter controller:
	$controller = $_GET['controller'] ?? "default";
	// Om angiven controller inte finns i vår routesarray, sätt till "default"
	if (!array_key_exists($controller, $routes))
		$controller = "default";

	require_once("user_controllers/".$routes[$controller]);
}
