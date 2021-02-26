
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

</head>

<body>

    <?php include ('navigation.php');?>
    <?php
        if($_SESSION["loggedin"] == true){
            $username = $_SESSION["username"];  
            $conn = mysqli_connect("localhost", "root", "", "pchub");
            $sql = "SELECT * from account where Username = '$username'";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <form>
        <div style="padding:0.01em 16px;">
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
        }
    ?>
  <?php //include('footer.php')?>
</body>
</html>