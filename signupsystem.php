<?php

    if(isset($_POST['signup']))
    {
        $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

        if(!$conn){
            echo 'Not Connected To Server';
        }
    
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        $search = "SELECT * from account where username='$username'";
        $search_result = mysqli_query($conn, $search);
        $sql = "INSERT INTO `account` (`userID`, `username`, `userPassword`, `email`, `phone`, `house_address`) 
        VALUES ('', '$username', '$pwd', '$email', '$phone', '$address')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($search_result);
        if($count > 0)
        {
            ?>
            <script>alert("User already Exists. Please try with another username."); window.location.href = "login.php"; </script>
            <?php
        }
        else if($result == true)
        {
            ?>
            <script>alert("Account created successfully."); window.location.href = "login.php";</script>
            <?php
        }
        else
        {
            ?>
            <script>alert('Something went wrong.'); window.location.href = "login.php"; </script>
            <?php
        }
    }
?>