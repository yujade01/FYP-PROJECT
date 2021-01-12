<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="loginsystem.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="userID" class="form-control" maxlength="10">
          
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" maxlength="25">
                
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary button" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            <p>Forgot Password? <a href="forgotPWForm.php">Reset Password now</a>.</p>
        </form>
    </div>    
</body>
</html>