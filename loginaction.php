<?php
	header("Content-Type: text/html; charset=UTF-8");

	require('./dbc.php');
	$mysqli = new mysqli($dhost, $duser, $dpw, $dname);
	if ($mysqli->connect_errno)
		die('Connect Error: '.$mysqli->connect_error);
	
	$uid = $_POST['id'];
	$upw = $_POST['pw'];

	if(empty(trim($uid)) || empty(trim($upw)))
	{
		echo "<script>alert('Fill Every Fields');\nlocation.replace('./login.php');</script>";
	}

	$sql = "SELECT * from userdata where userid='$uid' and userpw='$upw'";

	if($result = $mysqli->query($sql)) 
	{
		$cnt = $result->num_rows;
		$row = $result->fetch_object();
		$uname = $row->username;
	}

	if($cnt > 0)
	{
		echo "<script>alert('Login Successful.\\nHello, $uname');\nlocation.replace('./index.php');</script>";
	}
	
	else
	{
		echo "<script>alert('Login Failed');\nlocation.replace('./login.php');</script>";
	}
	$mysqli->close();
?>
