<?php
try {
$BDD = new PDO( "mysql:host=localhost;dbname=histoire;charset=utf8",
"user","secret", array(PDO::ATTR_ERRMODE
=>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
die('Erreur fatale : ' . $e->getMessage());
}
?>