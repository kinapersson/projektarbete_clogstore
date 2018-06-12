<?php

/**
* Funktion för att inkludera templatefiler.
* $templateData skickas som en variabel för att lösa problemet med scope i funktionen.
* Dessutom gör det att templatedatan finns tillgänglig under samma variabelnamn i ALLA templates.
*/

/*
function loadTemplate($templateName, $templateData) {
	require("templates/header.tpl.php");
	require('templates/'.$templateName.'.tpl.php');
	require("templates/footer.tpl.php");
}
*/

$isAdmin = true;
// admin templates
// ($user->isUserAdmin)
if ($isAdmin == true){	
	function loadTemplate($templateName, $templateData) {
		require("admin_templates/admin_header_tpl.php");
		require('admin_templates/admin_'.$templateName.'_tpl.php');
		// require("admin_templates/admin_footer.tpl.php");
	}
}
// user templates
else{
	function loadTemplate($templateName, $templateData) {
		require("templates/header.tpl.php");
		require('templates/'.$templateName.'.tpl.php');
		require("templates/footer.tpl.php");
	}
}