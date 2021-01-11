<?php
    //create new user
    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

    if(!$conn){
        echo 'Not Connected To Server';
    }

    $id = $_POST['userid'];
    $pwd = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO account (userID, userPassword, email) VALUES
        ('$id', '$pwd', '$email')";

    if(!mysqli_query($conn, $sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo 'Inserted';
        header('login.php');
    }

?>