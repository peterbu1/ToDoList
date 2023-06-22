<?php
	session_start();
	session_regenerate_id();
	if(!isset($_SESSION["RegState"])) $_SESSION["RegState"] = 0;
	//echo $_SESSION["RegState"];
	echo json_encode($_SESSION);
	exit();
?>