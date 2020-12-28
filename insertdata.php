<?php

if(isset($_POST['signup']))
{
    require 'dbcon.php';

    if(!mysqli_select_db($conn, 'pchub')){
        echo 'Database Not Selected';
    }
    $userid = $_POST['userid'];
    $userpw = $_POST['password'];
    $userEmail = $_POST['email'];

    $sql = "INSERT INTO account (userID, userpassword, email)
            VALUES('".$userid.", ".$userpw.", ".$userEmail."')";
    
    if (mysqli_query($con, $sql)) 
    {
        echo "Signup successfully !";
        header('login.php');
    } else 
        {
		    echo "Error: " . $sql . "" . mysqli_error($con);
        }
	 mysqli_close($con);
}
    
?>