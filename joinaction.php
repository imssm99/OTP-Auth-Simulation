<?php
	header("Content-Type: text/html; charset=UTF-8");

	require('./dbc.php');
	$mysqli = new mysqli($dhost, $duser, $dpw, $dname);
	if ($mysqli->connect_errno)
		die('Connect Error: '.$mysqli->connect_error);
	
	$uname = $_POST['name'];
	$uid = $_POST['id'];
	$upw = $_POST['pw'];

	if(empty(trim($uname)) || empty(trim($uid)) || empty(trim($upw)))
	{
		echo "<script>alert('Fill Every Fields');\nlocation.replace('./join.php');</script>";
	}

	$sql = "SELECT * from userdata where userid='$uid'";

	if($result = $mysqli->query($sql)) 
	{
		$cnt = $result->num_rows;
	}

	if($cnt > 0)
	{
		echo "<script>alert('ID already exists');\nlocation.replace('./join.php');</script>";
	}
	
	else
	{
		$sql = "INSERT INTO userdata (username, userid, userpw) VALUES('$uname', '$uid', '$upw')";
		if($mysqli->query($sql) === TRUE) 
		{
			 echo "<script>alert('Join Successful');\nlocation.replace('./index.php');</script>";
		}

		else
		{
			echo "<script>alert('Join Failed : $mysqli->error');\nlocation.replace('./join.php');</script>";
		}
	}
	$mysqli->close();
?>
