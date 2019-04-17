<?php

	require_once 'config.php';

	$host = $sqlconfig['dbhost'];
	$db   = $sqlconfig['dbname'];
	$user = $sqlconfig['dbuser'];
	$pass = $sqlconfig['dbpass'];
	$charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$pdo->query("SET character_set_server = 'utf8'");
	$pdo->query("SET collation_server = 'utf8_general_ci'");

	function query($query, $params = array()) {
		global $pdo;
		$stmt = $pdo->prepare($query);
		$stmt->execute($params);
		$ret = array();
		if ($stmt->rowCount()) $ret = $stmt->fetchAll();
		$stmt = null;
		return $ret;
	}

?>