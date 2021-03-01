
<?php
    session_start();
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link rel="stylesheet" type="text/css" href="profile.css">

    <style>
        .content{
            border: none; 
            padding:0.01em 16px; 
            width: auto; 
            height: 300px;
            background-color: white;
            border-radius: 20px;
        }

        .edit{
            height: 50px;
            width: 290px;
            border-radius: 1px;
            background-color: #1a9cb7;
            border: none;
            color: white;
            border-radius: 25px;
        }

        .edit:hover{
            cursor: pointer; 
            background-color: #1493ad;
        }

        p{
            font-size: 20px;
        }

        body{
            background: linear-gradient(-135deg, #c850c0, #4158d0);
        }

    </style>

</head>

<body>

    <?php include ('navigation.php');?>
    <?php
        if($_SESSION["loggedin"] == true && $role == "Customer"){
            $username = $_SESSION["username"];  
            $conn = mysqli_connect("localhost", "root", "", "pchub");
            $sql = "SELECT * from account where Username = '$username'";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <form>
        <div style="padding:0.01em 16px; min-height:56vh;">
        <h2>My Profile</h2>
        <div class="content">
                <p><?php echo "Name : " .$row['cust_name']."<br>"; ?></p>
                <p><?php echo "Email : " .$row['email']."<br>"; ?></p>
                <p><?php echo "Phone : " .$row['phone']."<br>"; ?></p>
                <p><?php echo "Address : " .$row['house_address']."<br>"; ?></p>
                <br>
                <a href="update_profile_form.php"><input class="edit" type="button" name="edit" value="EDIT PROFILE"></input></a>
        </div>
        </div>
               

        </form>
    <?php
            }
        }else if($role == "Admin")
        {
            ?>
        <div style="padding:0.01em 16px; min-height:56vh;">
        <h2>My Profile</h2>
        <div class="content">
                <p><?php echo "Username : " .$username."<br>"; ?></p>
                <p><?php echo "Email : pchubest2020@gmail.com <br>"; ?></p>
                <p><?php echo "Phone : 03-1234567 <br>"; ?></p>
                <p><?php echo "Address : 21 Revolution Street Selangor, Malaysia<br>"; ?></p>
                <br>
        </div>
        </div>
            <?php
        }
    ?>
  <?php include('footer.php')?>
</body>
</html>