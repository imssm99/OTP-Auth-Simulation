<!DOCTYPE html>
<html lang="ko">
<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OTP</title>

	<script language="JavaScript">
		var SetTime = 180;
		function msg_time() {
			m = Math.floor(SetTime / 60) + ":" + (SetTime % 60);
			var msg = "Elapsed Time: <font color='red'>" + m + "</font>";
			document.all.ViewTimer.innerHTML = msg;	
			SetTime--;
			if (SetTime < 0) {
				clearInterval(tid);
				alert("Timeover");
				location.replace('./otplogin.php');
			}
		}

		window.onload = function TimerStart(){ tid=setInterval('msg_time()',1000) };
	</script>

</head>

<?php
	require('./dbc.php');
	$mysqli = new mysqli($dhost, $duser, $dpw, $dname);
	if ($mysqli->connect_errno)
		die('Connect Error: '.$mysqli->connect_error);
	
	$uid = $_POST['id'];

	if(empty(trim($uid)))
	{
		echo "<script>alert('Fill Every Fields');\nlocation.replace('./otplogin.php');</script>";
	}

	$sql = "SELECT * from userdata where userid='$uid'";

	if($result = $mysqli->query($sql)) 
	{
		$cnt = $result->num_rows;
	}

	if($cnt > 0)
	{
		$otpnum = rand(10000000, 99999999);
		$sql = "INSERT INTO otplogin (userid, otpnum, time) VALUES('$uid', $otpnum, null)";
		if($mysqli->query($sql) === TRUE) 
		{
			 //echo "<script>alert('Insert Successful');</script>";
		}
	}

	else
	{
		echo "<script>alert('No ID exists');\nlocation.replace('./otplogin.php');</script>";
	}

?>

<body>
<div class="container">
	<form name="login" method="POST" action="./otploginaction.php">
		<p class='h2'>OTP Login</p>
		<div id="ViewTimer"></div>
		<br>

		<div class="form-group">
			<label for="otp">OTP: </label>
			<input type="number" class="form-control" name="otp" id="otp">
			<input type="hidden" name="id" id="id" value="<?php echo $_POST['id'];?>">
		</div>

		<input type="submit" value="Submit" class="btn btn-default">
		<button type="button" onClick="location.replace('./');" class="btn btn-info">Main</button>
	</form>
</div>
</body>
</html>
