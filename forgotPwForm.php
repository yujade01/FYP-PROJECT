<?php
    session_start();
?>

<html>
<head>
	<title>Password Reset Form | <?php echo $_SESSION["company"] ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<script src="https://kit.fontawesome.com/07c6e929d1.js" crossorigin="anonymous"></script>

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

	<style type="text/css">
		* {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }


        body{
            height: 100%;
            font-family: Poppins-Regular, sans-serif;
            margin: 0;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;

        }

        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .wrapper{
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
		
        }

        .container{
            width: 1000px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 177px 130px 33px 95px;
        }

		.logo {
            vertical-align: middle;
            border-style: none;
            width: 316px;
			margin-right: 60px;
			margin-top: 50px;
        }

		.resetform{
            width: 290px;
        }

		.form-title{
			font-size: 30px;
            color: #333333;
            line-height: 1;
            font-weight: bold;
            text-align: center;
            width: 100%;
            display: block;
            padding-bottom: 54px;
			margin-top: -40px;
		}

		.formgroup1{
            position: relative;
        }

        .g1{
            width: 100%;
            z-index: 1;
            margin-bottom: 10px; 
        }

		.form-control{
            font-family: Poppins-Medium;
            font-size: 20px;
            line-height: 1.5;
            color: #666666;
            width: 100%;
            background: #e6e6e6;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
        }

		.fas{
            margin-top: -36px;
            margin-left:30px;
            color: grey;
            font-size: 20px;
        }

		.containerbtn{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 20px;
            width: 100%;
        }

		.btn-primary{
			font-size: 20px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: #57b846;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            border: none;
            font-weight: bold;
		}

		.btn-danger{
			font-size: 20px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: red;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            border: none;
            font-weight: bold;
		}

		.text-center{
            text-align: center;
        }

		.p-t-136 {
            padding-top: 136px;
        }

		.txt2{
            font-size: 16px;
            line-height: 1.5;
            color: #666666;
        }

	</style>
</head>
<body>

		<div class="limiter">
        <div class="wrapper center">
        <div class="container">

		<p><img class="logo" src="pchublogo.png"></p>

		<form class="resetform" action="resetPwsystem.php" method="post">
			<span class="form-title">Reset password</span>

		<!-- form validation messages -->
		<div class="form-group1 g1">
			<input type="text" name="username" class="form-control" maxlength="20" placeholder="Username" required/>
			<i class="fas fa-user"></i>
		</div>

		<div class="form-group1 g1">
			<input type="password" name="newPw"  class="form-control" id="newPw" maxlength="25" onkeyup='check();' placeholder="New Password"required/>
			<i class="fas fa-lock"></i>
		</div>

		<div class="form-group1 g1">
			<input type="password" name="confirmPw" class="form-control" id="confirmPw" maxlength="25" onkeyup='check();' placeholder="Confirm Password" required/>
			<i class="fas fa-lock"></i>
			<span id="message"></span>
		</div>

		<div class="containerbtn">
			<button type="submit" name="reset-password" class="btn-primary">Reset Password</button>
		</div>

		<div class="containerbtn">
			<button type="reset" name ="clear-btn" class="btn-danger" >Clear</button>
		</div>


		<div class="text-center p-t-136">
            <a class="txt2" href="login.php">
                <i class="fa fa-arrow-left"></i>
				Back
                </a>
         </div>

	</form>
	</div>
	</div>
	</div>
</body>
</html>