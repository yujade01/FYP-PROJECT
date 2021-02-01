<!DOCTYPE html>
<html>
<head>
    <title>Nav Bar With Icons</title>
    <link rel = "stylesheet" type="text/css" href = "navigation.css">
    <script src="https://kit.fontawesome.com/22e170816e.js" crossorigin="anonymous"></script>
    <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity ="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin = "anonymous">
</head>

<body>
    <ul>

    <li>
    <a href="#"><img src="pchublogo.png" height="90px" width="90px"></a>
    </li>

    <li>
    <a onclick="location.href='welcome.php'">
    <div class = "icon">
        <i class="fa fa-home" aria-hidden="true"></i>
        <i class="fa fa-home" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Home">Home</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
        <i class="fa fa-laptop" aria-hidden="true"></i>
        <i class="fa fa-laptop" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Laptop">Laptop</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
        <i class="fa fa-desktop" aria-hidden="true"></i>
        <i class="fa fa-desktop" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Monitor">Monitor</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
        <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
        <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Mouse">Mouse</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
        <i class="fa fa-keyboard-o" aria-hidden="true"></i>
        <i class="fa fa-keyboard-o" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Keyboard">Keyboard</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
    <i class="fa fa-print" aria-hidden="true"></i>
    <i class="fa fa-print" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Printer">Printer</span></div>
    </a>
    </li>

    <li>
    <a href="#">
    <div class = "icon">
    <i class="fa fa-hdd-o" aria-hidden="true"></i>
    <i class="fa fa-hdd-o" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Accessories">Accessories</span></div>
    </a>
    </li>
    
    <li style="float:right">
        <p>Welcome, <?php echo $_SESSION["username"]; ?></p>
    </li>
    <?php
        if($_SESSION['loggedin'] != true)
        {
            ?>
            <li>
                <a href="login.php"><input type="submit" name="loginBtn" value="LOGIN"></input></a>
            </li>
            <?php
        }else{
            ?>
            <li style="float:right">
                <a href="logout.php"><input type="submit" name="logoutBtn" value="LOGOUT"></a>
            </li>
            <?php
        }
    ?>
    

    </ul>

</body>
</html>
