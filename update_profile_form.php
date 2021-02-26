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
   background-color: #eff0f4;
}

p{
   font-size: 20px;
}

.update{
   height: 50px;
   width: 290px;
   border-radius: 1px;
   background-color: #1a9cb7;
   border: none;
   color: white;
}

.update:hover{
   cursor: pointer; 
   background-color: #1493ad;
}

.content{
   border: none; 
   padding:0.01em 16px; 
   width: auto; 
   height: 400px;
   background-color: white;
   border-radius: 5px;
}

</style>


</head>


<body>
<?php include ('navigation.php');?>
    <form action="" method="post" enctype="multipart/form-data">
    <div style="padding:0.01em 16px;">
        <h2>Update Profile</h2>    
        <div class="content">  
        <?php
            $username = $_SESSION["username"];  
            $conn = mysqli_connect("localhost", "root", "", "pchub");
            $sql = "SELECT * from account where Username = '$username'";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){  
                ?>                
            <p>Name:<input type="text" name="name" value="<?php echo $row['cust_name'] ?>" maxlength="50" required></p>

            <p>Email:<input type="email" name="email" value="<?php echo $row['email'] ?>" required></p>

            <p>Phone Number:<input type="text" name="phonenum" value="<?php echo $row['phone'] ?>"  required></p>

            <p>Address:<input type="text" name="address" size="60" value="<?php echo $row['house_address']?>"></p>
            
            <?php
            }
            ?>
            
            <br><br>
            <button class = "update" type="submit" name="update" class="btn btn-danger">UPDATE</button>

</div>
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
</body>
</html>