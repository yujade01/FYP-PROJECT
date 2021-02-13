<?php
    session_start();
    $_SESSION["page"] = "Signup Form";
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style>
            .center {
            text-align: center;
            }
            .form-group{
                margin-bottom:15px;
                width: 100%;
            }
        </style>
    </head>

    <body>
    <div class="center">
        <h1>Hello, Welcome to Signup Page</h1>

        <form action="signupsystem.php" method="POST">
            <br/><br/>
            <div class="form-group">
            <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Eg: John" required>
            </div>

            <div class="form-group">
            <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Eg: FyP3@1" required>
            </div>

            <div class="form-group">
            <label for="email">Email Address:</label>
                <input type="email" pattern=".+@gmail.com" id="email" name="email" placeholder="Eg: john123@gmail.com" required>
            </div>

            <div class="form-group">
            <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Eg: 0123456789" pattern="[0-9]{11}" required/>
            </div>

            <div class="form-group">
            <label for="address">House address:</label>
                <input type="text" id="address" name="address" placeholder="Eg: 100, taman fyp, 32000 Selangor" required/>
            </div>
                <a href="login.php"><input type="button" class="btn btn-primary" name="back" value="BACK"></a>
                <input type="submit" class="btn btn-success" name="signup" value="Signup"/>
        </form>
    </div>
        
        
    </body>
</html>
