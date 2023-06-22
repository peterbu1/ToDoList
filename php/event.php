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
	$EventName = mysqli_real_escape_string($con, $_GET["name"]);
	$EventStartDate = mysqli_real_escape_string($con, $_GET["startDate"]);
	$EventEndDate = mysqli_real_escape_string($con, $_GET["endDate"]);
	$EventStartTime = mysqli_real_escape_string($con, $_GET["startTime"]);
	$EventEndTime = mysqli_real_escape_string($con, $_GET["endTime"]);
	$Email = $_SESSION["Email"];
	$TimeEventCreated = date("Y-m-d h:i:s");
	//Insert into Db
	$query = "INSERT INTO Event(EventName, EventStartDate, EventEndDate, EventStartTime, EventEndTime, Email, TimeEventCreated) 
	values('$EventName','$EventStartDate','$EventEndDate', '$EventStartTime', '$EventEndTime','$Email', '$TimeEventCreated')";
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
	$_SESSION["Message"] = "Event Added Successfully";
	echo json_encode($_SESSION);
	exit();
?>