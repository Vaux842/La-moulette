<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=la-moulette", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
	echo $ex;
}

function getRecipes($table) {
	global $db;
	return $db->query("SELECT * FROM `" . $table . "`");
}

function getDrinks($type) {
	global $db;
	return $db->query("SELECT * FROM `boisson` where type='" . $type . "'");
}

?>