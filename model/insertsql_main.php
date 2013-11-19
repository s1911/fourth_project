<?php
	require_once('./mysql_connect.php');
	
	$BCID 		= $_POST['BCID'];
	$CName 		= $_POST['CName'];
	$DeploymentT= $_POST['DeploymentT'];
	$LifeT 		= $_POST['LifeT'];
	
	$sql = "INSERT INTO component_log(bcid,deployment_t,life_t) VALUES ('$BCID','$DeploymentT','$LifeT')";
	$count = $db->exec($sql);
	
	$db = null;
?>