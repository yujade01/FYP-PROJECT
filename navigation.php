<!DOCTYPE html>
<html>
<head>
    <title>Nav Bar With Icons</title>
    <link rel = "stylesheet" type="text/css" href = "navigation.css">
    <script src="https://kit.fontawesome.com/22e170816e.js" crossorigin="anonymous"></script>
    <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity ="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin = "anonymous">
    <style>
        .but {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
                touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
        }
        .btn-primary:focus,
        .btn-primary.focus {
        color: #fff;
        background-color: #286090;
        border-color: #122b40;
        }
        .btn-primary:hover {
        color: #fff;
        background-color: #286090;
        border-color: #204d74;
        }

        .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
        }
        .btn-danger:focus,
        .btn-danger.focus {
        color: #fff;
        background-color: #c9302c;
        border-color: #761c19;
        }
        .btn-danger:hover {
        color: #fff;
        background-color: #c9302c;
        border-color: #ac2925;
        }
    </style>
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
    
    <li>
    <a href="cart.php">
    <div class = "icon">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Cart">Cart</span></div>
    </a>
    </li>
    <li>
        <p>Welcome, <?php echo $_SESSION["username"]; ?></p>
    </li>
    <?php
        if($_SESSION['loggedin'] != true)
        {
            ?>
            <li>
                <a href="login.php"><input type="submit" class="but btn-primary" name="loginBtn" value="LOGIN"></input></a>
            </li>
            <?php
        }else{
            ?>
            <li>
                <a href="logout.php"><input type="submit" class="but btn-danger" name="logoutBtn" value="LOGOUT"></a>
            </li>
            <?php
        }
    ?>
    

    </ul>

</body>
</html>
