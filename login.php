<?php
    session_start();
    $_SESSION["page"] = "Login";
    $_SESSION["company"] = "PCHUB";
    $_SESSION["loggedin"] = false;
    $_SESSION["username"] = "GUEST";
?>
<html>
<head>
    <title> <?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .center {
            margin-left: auto;
            margin-right: auto;
            }
        .logo {
                height: 200px;
                width: 200px;
            }
    </style>
</head>
<body>
    <div class="wrapper center">
        <p><img class="logo" src="pchublogo.png"></p>
        <p><h2 style="color: green;">Always Available For You</h2></p>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="loginsystem.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="userID" class="form-control" maxlength="10" required>
          
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" maxlength="25" required>
                
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            <p>Forgot Password? <a href="forgotPWForm.php">Reset Password now</a>.</p>
            <p><a href="welcome.php">Continue as GUEST -></a></p>
        </form>
    </div>    
</body>
</html>