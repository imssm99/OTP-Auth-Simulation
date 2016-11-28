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
</head>

<body>
<div class="container">
	<form name="login" method="POST" action="./otpgetnumaction.php">
		<p class='h2'>Login</p><br>

		<div class="form-group">
			<label for="id">ID: </label>
			<input type="text" class="form-control" name="id" id="id">
		</div>

		<div class="form-group">
			<label for="pw">PW: </label>
			<input type="password" class="form-control" name="pw" id="pw">
		</div>

		<input type="submit" value="Submit" class="btn btn-default">
		<button type="button" onClick="location.replace('./');" class="btn btn-info">Main</button>

	</form>
</div>
</body>
</html>
