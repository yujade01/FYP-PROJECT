<?php
    session_start();
    $_SESSION["page"] = "Password Reset Form";
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

	<script>
		var check = function() {
			if (document.getElementById('newPw').value ==
				document.getElementById('confirmPw').value) {
				document.getElementById('message').style.color = 'green';
				document.getElementById('message').innerHTML = 'Matched';
			} else {
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'Not matching';
			}
		}
	</script>
</head>
<body>
	<form class="text-center" action="resetPwsystem.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<div class="form-group">
			<label>Your User ID</label>
			<input type="text" name="userID" maxlength="10">
		</div>
		<div class="form-group">
			<label>Your New Password</label>
			<input type="password" name="newPw" id="newPw" maxlength="25" onkeyup='check();'>
		</div>
		<div class="form-group">
			<label>Re-enter your New Password</label>
			<input type="password" name="confirmPw" id="confirmPw" maxlength="25" onkeyup='check();'>
			<span id="message"></span>
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="btn btn-primary">Reset Password</button>
			<button type="reset" name ="clear-btn" class="btn btn-danger" >Clear</button>
		</div>
	</form>
</body>
</html>