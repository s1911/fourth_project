<?php
	if (isset($_POST['board_name']) && ($_POST['board_name']!='')) {
		require_once('./mysql_connect.php');
		
		$sql = "UPDATE board SET bname = :bname, location_x = :location_x, 
				location_y = :location_y, ip = :ip,	note = :note WHERE bid = :bid";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':bname', $_POST['board_name'], PDO::PARAM_STR);       
		$stmt->bindParam(':location_x', $_POST['location_x'], PDO::PARAM_STR);    
		$stmt->bindParam(':location_y', $_POST['location_y'], PDO::PARAM_STR);
		$stmt->bindParam(':ip', $_POST['ip'], PDO::PARAM_STR); 
		$stmt->bindParam(':note', $_POST['note'], PDO::PARAM_STR);   
		$stmt->bindParam(':bid', $_POST['bid'], PDO::PARAM_INT);   
		$stmt->execute(); 
		
		$db = NULL;
		//echo '<meta http-equiv=REFRESH CONTENT=1; url=index.php>';
		header("location: ../");
	}
?>