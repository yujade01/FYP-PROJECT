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
            .alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}
            .alert h4{margin-top:0;color:inherit}
            .alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}
            .alert-info hr{border-top-color:#a6e1ec}
        </style>
    </head>

    <body>
    <div class="center">
        <h1>Hello, Welcome to Signup Page</h1>
        
        <div class="alert alert-info">
            <h4>Personal Details</h4>
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
                    <textarea id="address" name="address" placeholder="Eg: 100, taman fyp, 32000 Selangor" rows="4" cols="20" required></textarea>
                </div>
                    <a href="login.php"><input type="button" class="btn btn-primary" name="back" value="BACK"></a>
                    <input type="submit" class="btn btn-success" name="signup" value="Signup"/>
            </form>
        </div>
    </div>
        
        
    </body>
</html>
