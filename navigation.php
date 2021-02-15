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
        .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        }
        .btn-success:focus,
        .btn-success.focus {
        color: #fff;
        background-color: #449d44;
        border-color: #255625;
        }
        .btn-success:hover {
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
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
    
    <!--Show shopping cart if role = customer -->
    <?php if(($role == "Customer")||($username == "GUEST")) {?>
    <li>
    <a href="cart.php">
    <div class = "icon">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Cart">Cart</span></div>
    </a>
    </li>
    <?php } ?>
    <!--END OF SHOPPING CART -->

     <!--Show order if role = Admin -->
    <?php if($role == "Admin") {?>
    <li>
    <a href="#">
    <div class = "icon">
    <i class="fa fa-clipboard-list" aria-hidden="true"></i>
    <i class="fa fa-clipboard-list" aria-hidden="true"></i>
    </div>
    <div class="name"><span data-text = "Order">Order</span></div>
    </a>
    </li>
    <?php } ?>
    <!--END OF SHOPPING CART -->

    <!-- Show Username -->
    <li>
        <p>Welcome, <?php echo $_SESSION["username"]; ?></p>
    </li>
    <!-- END OF USERNAME-->

    <!--LOGIN AND LOGOUT BUTTON -->
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
                <input type="submit" onclick="Logout()" class="but btn-danger" name="logoutBtn" value="LOGOUT">
            </li>
            <?php
        }
    ?>
        <script>
            //Logout Confirm box
            function Logout() {
            var logout = confirm("Are you sure want to log out?");
                if (logout == true) {
                    window.location.href = "logout.php";
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    <!--END OF LOGIN AND LOGOUT BUTTON-->
    </ul>

</body>
</html>
