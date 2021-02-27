<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Signup Form | <?php echo $_SESSION["company"] ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://kit.fontawesome.com/07c6e929d1.js" crossorigin="anonymous"></script>
        
        <style type="text/css">

        *{
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

        .container{
            width: 1000px;
            background: white;
            border-radius: 10px;
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
            margin-right: 50px;
        }

        .signupform{
            width: 290px;
        }

        .signuptitle{
            font-size: 30px;
            color: #333333;
            line-height: 1;
            font-weight: bold;
            text-align: center;
            width: 100%;
            display: block;
            padding-bottom: 54px;
            margin-top: -80px;
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
            position: absolute;
            margin-top: -36px;
            margin-left:20px;
            color: grey;
            font-size: 20px;
        } 

        .fa{
            position: absolute;
            margin-top: -120px;
            margin-left:20px;
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

        .btn-success{
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

        .txt2{
            font-size: 16px;
            line-height: 1.5;
            color: #666666;
        }

        </style>

        
    <script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
    </script>

    </head>

    <body>

    <div class="limiter">
    <div class="wrapper center">
    <div class="container">
   
    <p><img class="logo" src="pchublogo.png"></p>

    <form action="signupsystem.php" method="post" class="signupform">
            <span class="signuptitle">Signup</span>
        
                <div class="form-group1 g1">
                    <input type="text" id="username" name="username" class="form-control" maxlength="10" placeholder="Eg: John" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="form-group1 g1">
                    <input type="text" id="cust_name" name="cust_name" class="form-control" placeholder="Eg: John Wick" required>
                    <i class="fas fa-user-circle"></i>
                </div>

                <div class="form-group1 g1">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Eg: FyP3@1" required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="form-group1 g1">
                    <input type="email" pattern=".+@gmail.com" id="email" name="email" class="form-control" placeholder="Eg: john123@gmail.com" required>
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="form-group1 g1">
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Eg: 0123456789" pattern="[0-9]{11}" onkeypress="javascript:return isNumber(event)" required/>
                    <i class="fas fa-phone"></i>
                </div>

                <div class="form-group1 g1">
                    <textarea id="address" name="address" class="form-control" placeholder="Eg: 100, taman fyp, 32000 Selangor" rows="4" cols="20" required></textarea>
                    <i class="fa fa-home"></i>
                </div>
                       
                <!-- <a href="login.php"><input type="button" class="btn btn-primary" name="back" value="BACK"></a> -->
                
                <div class="containerbtn">
                <input type="submit" class="btn-success" name="signup" value="Signup"/>
                </div>

                <div  class="text-center p-t-12">
                <span class="txt1">Already have an account?</span>
                <a class="txt2" href="login.php">Log in</a>
                </div>

            </form>

    </div>
    </div>
    </div>      
    </body>
</html>
