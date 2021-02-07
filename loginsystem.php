<?php

    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

    if(!$conn){
        echo 'Not Connected To Server';
    }

    $username = $_POST['username'];  
    $password = $_POST['password']; 

    //to prevent from mysqli injection  
    // $username = stripcslashes($username);  
    // $password = stripcslashes($password);  
    // $username = mysqli_real_escape_string($conn, $username);  
    // $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "SELECT * from account where Username = '$username' and userPassword = '$password'";  
    $result = mysqli_query($conn, $sql);    
    $count = mysqli_num_rows($result);
    //check admin
    $admin_check = "SELECT * from `admin` where adminID = '$username' and adminPassword = '$password'";
    $check_result = mysqli_query($conn, $admin_check);    
    $admin_count = mysqli_num_rows($check_result);  

    //Check rows from admin
    if($admin_count > 0)
    {
        if($check_result == true)
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "Admin";
        }else{
            ?>
        <script> alert("Failed to login."); window.location.href = "login.php";</script>
        <?php
        }
        ?>
        <script> alert("Login successfully. Welcome Admin."); window.location.href = "welcome.php";</script>

        <?php
    }
    //check query from account table
    else if ($count != 0)
    {
        if($result == true)
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "Customer";
        }else{
            ?>
        <script> alert("Failed to login."); window.location.href = "login.php";</script>
        <?php
        }
        ?>
        <script> alert("Login successfully"); window.location.href = "welcome.php";</script>

        <?php
      }else{
        ?>
        <script> alert("Failed to login."); window.location.href = "login.php";</script>
        <?php
    }     
?>