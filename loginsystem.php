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
      
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?>