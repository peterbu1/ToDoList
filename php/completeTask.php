<?php
	session_start();
	//Need DB credentials
	require_once("config.php");

	//connecting to db
	$con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
	if(!$con){
		$_SESSION["RegState"] = 4;
		$_SESSION["Message"] = "DB connection failed: ".mysqli_error($con);
		echo json_encode($_SESSION);
		exit();
	}
	//print "DATABASE connected <br>";
	// Get webdata
	$Task = mysqli_real_escape_string($con, $_GET["todo-input"]);
	$TaskCreatedTime = date("Y-m-d h:i:s");
	$Email = $_SESSION["Email"];
	//Insert into Db
	$query = "INSERT INTO Tasks(TaskName, TaskCreatedDate, Email) 
	values('$Task','$TaskCreatedTime','$Email')";
	$result = mysqli_query($con, $query);
	
	if(!$result){
		$_SESSION["RegState"] = 4;
		$_SESSION["Message"] = "Query failed: ".mysqli_error($con);
		echo json_encode($_SESSION);
		exit();
	}
	if(mysqli_affected_rows($con) != 1){
		$_SESSION["RegState"] = 4;
		$_SESSION["Message"] = "Query insert failed: ".mysqli_error($con);
		echo json_encode($_SESSION);
		exit();
	}
	$_SESSION["RegState"] = 4;
	$_SESSION["Message"] = "Task Added Successfully";
	echo json_encode($_SESSION);
	exit();
?>