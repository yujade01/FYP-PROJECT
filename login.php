<?php
    session_start();
    $_SESSION["page"] = "Login";
    $_SESSION["company"] = "PCHUB";
    $_SESSION["loggedin"] = false;
    $_SESSION["username"] = "GUEST";
    $_SESSION["role"] = "Unknown";
?>
<html>
<head>
    <title> <?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/07c6e929d1.js" crossorigin="anonymous"></script>


    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }


        body{
            height: 100%;
            font-family: Poppins-Regular, sans-serif;
            margin: 0;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;

        }

        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .wrapper{
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
        }

        .container-login{
            width: 1000px;
            background: white;
            border-radius: 10px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 177px 130px 33px 95px;
        }

        .logo {
            vertical-align: middle;
            border-style: none;
            width: 316px;
            margin-top: 40px;
        }

        .loginform{
            width: 290px;
        }

        .loginformtitle{
            font-size: 30px;
            color: #333333;
            line-height: 1;
            font-weight: bold;
            text-align: center;
            width: 100%;
            display: block;
            padding-bottom: 54px;
        }

        .formgroup1{
            position: relative;
        }

        .g1{
            width: 100%;
            z-index: 1;
            margin-bottom: 10px; 
        }

        .form-control{
            font-family: Poppins-Medium;
            font-size: 20px;
            line-height: 1.5;
            color: #666666;
            width: 100%;
            background: #e6e6e6;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
        }

        .fas{
            margin-top: -36px;
            margin-left:30px;
            color: grey;
            font-size: 20px;
        }

        .containerbtn{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 20px;
            width: 100%;
        }

        .btn{
            font-size: 20px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: #57b846;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            border: none;
            font-weight: bold;
        }

        .text-center{
            text-align: center;
        }

        .p-t-12 {
            padding-top: 12px;
        }

        .txt1{
            font-size: 16px;
            line-height: 1.5;
            color: #999999;
        }
        
        .txt2{
            font-size: 16px;
            line-height: 1.5;
            color: #666666;
        }

        .text-center {
            text-align: center;
        }

        .p-t-136 {
            padding-top: 136px;
        }




    </style>
</head>
<body>
    <div class="limiter">
        <div class="wrapper center">
        <div class="container-login">

        <p><img class="logo" src="pchublogo.png"></p>

        <form action="loginsystem.php" method="post" class="loginform">
            <span class="loginformtitle">Login</span>

            <div class="form-group1 g1">
                <input type="text" name="username" class="form-control" maxlength="10" placeholder="Username" required>
                <i class="fas fa-user"></i>

            </div>

            <div class="form-group1 g1">
                <input type="password" name="password" class="form-control" maxlength="25" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>

            <div class="containerbtn">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>

            <!-- <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            <p>Forgot Password? <a href="forgotPWForm.php">Reset Password now</a>.</p>
            <p><a href="welcome.php">Continue as GUEST -></a></p> -->

            <div class="text-center p-t-12">
                <span class="txt1">Forgot</span>
                <a class="txt2" href="forgotPWForm.php">PASSWORD </a>
            </div>

            <div  class="text-center p-t-12">
                <span class="txt1">Continue as</span>
                <a class="txt2" href="welcome.php">GUEST</a>
            </div>

            <div class="text-center p-t-136">
            <a class="txt2" href="signup.php">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>

        </form>

    </div>
    </div>
    </div>
</body>
</html>