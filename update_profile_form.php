<?php
    session_start();
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>

<title>Update Profile</title>

<style>
 

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
            text-align: center;
            width: 550px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 50px 130px 33px 95px;
        }

        .form-control{
            font-size: 20px;
            line-height: 1.5;
            color: #666666;
            width: 500px;
            background: #e6e6e6;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 30px;
        }

        .update{
            font-size: 20px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 400px;
            height: 50px;
            border-radius: 25px;
            background: #57b846;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            margin-top: 25px;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        .title{
            font-weight: bold;
            font-size: 20px;
        }


</style>


</head>


<body>
<?php include ('navigation.php');?>

    <div class="limiter">
    <div class="wrapper center">
    <div class="container-login">

    <form action="" method="post" enctype="multipart/form-data">
        <h2>Update Profile</h2>    
        <?php
            $username = $_SESSION["username"];  
            $conn = mysqli_connect("localhost", "root", "", "pchub");
            $sql = "SELECT * from account where Username = '$username'";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){  
            ?>       
                     
            <p class = "title">Name:</p><input type="text" class="form-control" name="name" value="<?php echo $row['cust_name'] ?>" maxlength="50" required>

            <p class = "title">Email:</p><input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>

            <p class = "title">Phone Number:</p><input type="text" class="form-control" name="phonenum" value="<?php echo $row['phone'] ?>"  required>

            <p class = "title">Address:</p><input type="text" class="form-control" name="address" size="60" value="<?php echo $row['house_address']?>">
            
            <?php
            }
            ?>
            
            <br><br>
            <button class = "update" type="submit" name="update" >UPDATE</button>

            <div class="back">
            <a class="txt2" href="profile.php">
                <i class="fa fa-arrow-left"></i>
				Back
                </a>
         </div>



    <?php
if (isset($_POST['update'])) { 
    
    $name = $_POST['name'];
    $email = $_POST["email"];
    $phone = $_POST["phonenum"];
    $address = $_POST["address"];

    $db = mysqli_connect("localhost", "root", "", "pchub");

    $sql = "UPDATE account 
            set cust_name = '$name', email = '$email', phone = '$phone',
            house_address = '$address'
            WHERE username = '$username'";

    $result = mysqli_query($db, $sql);

    //check query
    if ($result == true)  {
        ?>
        <script> alert("Profile updated successfully"); window.location.href="profile.php";</script>
        <?php
    }else{ 
        ?>
        <script> alert("Failed to update profile")</script>
        <?php
  }
}

?>

    </div>
    </div>
    </div>
</body>
</html>