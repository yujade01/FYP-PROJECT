<?php
    session_start();
    $msg = $_SESSION['invoice'];
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>

<html>
    <head>
        <title>Invoice | <?php echo $_SESSION["company"] ?></title>

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
        <?php include 'navigation.php' ?>
        <div class="center alert alert-info">
            <?php echo $msg; ?>
        </div>
        <div class="center form-group">
            <p><a href="welcome.php"><input type="submit" class="but btn-primary" value="Back to Home"/></a></p>
        </div>
    </body>

</html>