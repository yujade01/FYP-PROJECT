<?php

    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

    if(!$conn){
        echo 'Not Connected To Server';
    }

    $username = $_POST['userID'];  
    $password = $_POST['password']; 

    //to prevent from mysqli injection  
    // $username = stripcslashes($username);  
    // $password = stripcslashes($password);  
    // $username = mysqli_real_escape_string($conn, $username);  
    // $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "SELECT * from account where userID = '$username' and userPassword = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    //check query
    if ($result == true)  {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        ?>
        <script> alert("Login successfully"); window.location.href = "welcome.php";</script>

        <?php
        //header("Location: welcome.php");
      }else{
        ?>
        <script> alert("Failed to login.")</script>
        <?php
    }     
?>