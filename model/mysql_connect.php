<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=ncu4", "root", "G4a5JcCDu4E7yWvz",
					   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					   //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
		
		//echo '連線成功';
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		//error message
		echo $e->getMessage();
	}
?>