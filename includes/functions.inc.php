<?php

/**
* Funktion för att inkludera templatefiler.
* $templateData skickas som en variabel för att lösa problemet med scope i funktionen.
* Dessutom gör det att templatedatan finns tillgänglig under samma variabelnamn i ALLA templates.
*/
function loadTemplate($templateName, $templateData) {
	require("templates/header.tpl.php");
	require('templates/'.$templateName.'.tpl.php');
	require("templates/footer.tpl.php");
}


//This code is copied from Haralds example, we might want to change it?