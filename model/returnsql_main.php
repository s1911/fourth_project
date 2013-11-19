<?php
	require_once('./mysql_connect.php');
	
	/* receive the asking CID number */
	$BCID = $_POST['BCID'];
	
	/* select all the data in MaintenceService */
	$sth = $db->prepare('SELECT component_log.*, component.cname FROM component_log 
						 LEFT JOIN component 
						 ON component.bcid = component_log.bcid
						 WHERE component_log.bcid = :BCID AND TO_DAYS(NOW()) - TO_DAYS(component_log.save_t) <= 7');
	$sth->bindValue(':BCID', $BCID, PDO::PARAM_INT);
	$sth->execute();
	$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

	/* sending the data to jQuery by JSON */
	echo json_encode($rows);
	
	/* end the sql connect */
	$db = null;
?>