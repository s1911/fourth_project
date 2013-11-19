<?php
	if (isset($_POST['bname'])) {
		require_once('./mysql_connect.php');

		$bname	= $_POST['bname'];
		$loc_x	= $_POST['location_x'];
		$loc_y	= $_POST['location_y'];
		$ip		= $_POST['ip'];
		$note	= $_POST['note'];
		
		$sql	= "INSERT INTO board(bname,location_x,location_y,ip,note) VALUES ('$bname','$loc_x','$loc_y','$ip','$note')";
		$count	= $db->exec($sql);
		//echo '<meta http-equiv=REFRESH CONTENT=1; url=index.php>';
		
		$db = NULL;
	}
	header("location: ../");
?>