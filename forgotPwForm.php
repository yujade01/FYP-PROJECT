<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset FORM</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
	<form class="text-center" action="resetPwSystem.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<div class="form-group">
			<label>Your User ID</label>
			<input type="text" name="userID" maxlength="10">
		</div>
		<div class="form-group">
			<label>Your New Password</label>
			<input type="password" name="newPw" id="newPW" maxlength="25">
		</div>
		<div class="form-group">
			<label>Re-enter your New Password</label>
			<input type="password" name="confirmPw" id="confirmPw" maxlength="25">
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="btn btn-primary">Reset Password</button>
			<button type = "reset" value = "Reset btn" >Reset</button>
		</div>
	</form>
</body>
</html>