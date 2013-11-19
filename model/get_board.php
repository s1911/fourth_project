<?php
	require_once('./model/mysql_connect.php');
	
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);	
	$rs = $db->query('SELECT * FROM board');
	$rs->setFetchMode(PDO::FETCH_ASSOC);
	$ar = $rs->fetchAll(); 
	
	foreach($ar as $row)
	{
		echo '<tr>';
		echo '<td><a href="./main_ser.php?bid=' . $row['bid'] . '">' . $row['bname'] .'</a></td>';
		// echo '<td>'. $row['location_x'] .'</td>';
		// echo '<td>'. $row['location_y'] .'</td>';
		// echo '<td>'. $row['ip'] .'</td>';
		// echo '<td>'. $row['note'] .'</td>';
		echo '</tr>';
	}
	
	$db = null;
?>