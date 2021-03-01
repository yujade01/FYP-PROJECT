<?php
    session_start();
    $_SESSION["page"] = "Dashboard";
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
        <link href='https://fonts.googleapis.com/css?family=Faster One' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Prosto One' rel='stylesheet'>

    <style>

        body{
            height: 100%;
        }


        .container-admin{
            width: 450px;
            border-radius: 10px;
            overflow: hidden;
            justify-content: space-between;
            padding: 40px;
            margin-left: 500px;
            border: 1px solid black;
        }

        .admintitle{
            font-size: 24px;
            color: #8d0000;
            line-height: 1;
            font-weight: bold;
            text-align: center;
            width: 100%;
            display: block;
            padding-bottom: 40px;
        }

        .text1{
            font-family: 'Prosto One';
            font-size: 60px;
            color: #72bcd4;
        }

        .text2{
            color: purple;
            font-family: 'Faster One';
            font-size: 50px;
        }
        .center {
            text-align: center;
        }
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
        border: 1px solid transparent;
        border-radius: 4px;
        border-color: black;
        background-color: red;
        color: yellow;
        font-weight: bold;
        }

       .bg{
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            height: 1000px;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .container {
            width: auto;
            margin: auto;
            }

        .butn {
            position: relative;
            letter-spacing: 0.25em;
            margin: 0 auto;
            padding: 1rem 2.5rem;
            background: transparent;
            outline: none;
            font-size: 28px;
            color: #333333;
            text-decoration: none;
        }

        .butn::after, .butn::before {
            content: "";
            position: absolute;
            height: 100%;
            width: 50%;
            transform: skewX(30deg);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: -2;
        }

            .butn::before {
            background-color: #603F83FF;
            top: -1rem;
            left: 0rem;
        }

            .butn::after {
            background-color: #C7D3D4FF;
            top: 1rem;
            left: 8rem;
        }

            .butn:hover::before, .butn:hover::after {
            top: 0;
            transform: skewx(0deg);
        }

            .butn:hover::after {
            left: 0rem;
        }

            .butn:hover::before {
            left: 8.75rem;
        }


    </style>
    </head>
    <body class="bg">
    <?php include ('navigation.php');?>
    <br/><br/><br/><br/>
    <div class="center" style="min-height:70vh;">
        <h1 class="text1">PC HUB</h1>
        <h2 class="text2">ALWAYS AVAILABLE FOR YOU</h2>
    
        <!-- Show this button if role = customer -->
        <?php if(($role == "Customer")||($username == "GUEST")) {?>
        <div class="container"><a class="butn" href="showproduct.php">SHOP NOW</a></div>
        <?php } ?>

        <!-- Show this button if role = admin -->
        <?php if($role == "Admin") {?>
        <div class="container"><a class="butn" href="showproduct.php">VIEW NOW</a></div>
        <?php } ?>

        <br/><br/><br/><br/>
        <!-- Show Admin control panel if role = customer -->
        <?php if($role == "Admin") {?>

        <div class="container-admin">
            <span class="admintitle">ADMIN CONTROL PANEL</span>
            <label for="addProduct">ADD NEW PRODUCT</label>
            <a href="uploadform.php"><input type="button" id="addProduct" class="but btn-primary" name="addBtn" value="ADD NOW"/></a><br/><br/>
            <label for="updateProduct">UPDATE EXISTING PRODUCT</label>
            <a href="update_product_form.php"><input type="button" id="updateProduct" class="but btn-primary" name="addBtn" value="UPDATE NOW"/></a><br/><br/>

        </div>
        <?php } ?>
    </div>
        <?php include('footer.php')?>
    </body>
</html>