<?php
// db.inc.php
// Connect to DB using credentials from settings.inc.php
// Setting error reporting to exception for PDO.

/* Connect to a MySQL database using driver invocation */

$dsn = 'mysql:dbname='.$settings['db']['database'].';host='.$settings['db']['host'];

try {
    $dbh = new PDO($dsn, $settings['db']['user'], $settings['db']['password']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}