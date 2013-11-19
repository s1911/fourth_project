<?php
	$bid = isset($_GET['bid']) ? $_GET['bid'] : 0;
	require_once('./mysql_connect.php');
	$q = $db->prepare('SELECT * FROM component WHERE bid = :bid');
	$q->execute(array(':bid' => $bid));
	
	$row = $q->fetchAll();
	
	$db = NULL;
	echo JSON_encode($row);	
?>