<?php
	if (isset($_POST['bid']) && ($_POST['bid']!='')) {
		require_once('./mysql_connect.php');
		
		/* board */
		$sql = "DELETE FROM board WHERE bid = :bid";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':bid', $_POST['bid'], PDO::PARAM_INT);
		$stmt->execute();
		
		/* component */
		// find the bcid of the deleting bid
		$sql = "SELECT bcid FROM component WHERE bid = :bid";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':bid', $_POST['bid'], PDO::PARAM_INT);
		$stmt->execute();
		$bcid1 = $stmt->fetchColumn();
		$bcid2 = $stmt->fetchColumn();
		
		// delete from component
		$sql = "DELETE FROM component WHERE bid = :bid";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':bid', $_POST['bid'], PDO::PARAM_INT);
		$stmt->execute();
		
		/* component_log */
		$sql = "DELETE FROM component_log WHERE bcid BETWEEN :bcid1 AND :bcid2";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':bcid1', $bcid1, PDO::PARAM_INT);
		$stmt->bindParam(':bcid2', $bcid2, PDO::PARAM_INT);
		$stmt->execute();
		
		$db = NULL;
		//echo '<meta http-equiv=REFRESH CONTENT=1; url=index.php>';
		header("location: ../");
	}
?>