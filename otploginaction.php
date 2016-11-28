<?php
	header("Content-Type: text/html; charset=UTF-8");

	require('./dbc.php');
	$mysqli = new mysqli($dhost, $duser, $dpw, $dname);
	if ($mysqli->connect_errno)
		die('Connect Error: '.$mysqli->connect_error);
	
	$uid = $_POST['id'];
	$otpnum = $_POST['otp'];

	if(empty(trim($otpnum)) || empty(trim($uid)))
	{
		echo "<script>alert('Fill Every Fields');\nlocation.replace('./otplogin.php');</script>";
	}

	$timeend = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." -3 minutes"));

	$sql = "SELECT * from otplogin where userid='$uid' and otpnum='$otpnum' and time>='$timeend'";

	if($result = $mysqli->query($sql)) 
	{
		$cnt = $result->num_rows;
	}

	$mysqli->query("DELETE from otplogin where userid='$uid'");

	if($cnt > 0)
	{
		$sql = "SELECT * from userdata where userid='$uid'";

		if($result = $mysqli->query($sql)) 
		{
			$cnt = $result->num_rows;
			$row = $result->fetch_object();
			$uname = $row->username;
		}
		echo "<script>alert('Login Successful.\\nHello, $uname');\nlocation.replace('./index.php');</script>";

	}
	
	else
	{
		echo "<script>alert('Login Failed');\nlocation.replace('./otplogin.php');</script>";	
	}
	$mysqli->close();
?>
