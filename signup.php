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
        </style>
    </head>

    <body>
    <div class="center">
        <h1>Hello, welcome to Signup Page</h1>

        <form action="signupsystem.php" method="post">
            <input type="text" name="userid" placeholder="Please enter your ID" required>
            <br><br>
            <input type="password" name="password" placeholder="Please enter your password" required>
            <br><br>
            <input type="text" name="email" placeholder="Please enter your email" required>
            <br><br>
            <input type="submit" class="btn btn-primary" name="signup" value="Signup">

        </form>
    </div>
        
        
    </body>
</html>
