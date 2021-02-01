<?php
    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

    if(!$conn){
        echo 'Not Connected To Server';
    }

    $userID = $_POST['userID'];
    $PWtoReset = $_POST['newPw'];
    $PWConfirm = $_POST['confirmPw'];

    $check = "SELECT * FROM account where userID = '$userID'";
    $checkResult = mysqli_query($conn, $check);

    if(mysqli_num_rows($checkResult) >0)
    {
        $sql = "UPDATE account SET userPassword = '$PWtoReset' where userID ='$userID'";
        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            echo "<h1>Password updated successfully.</h1>";
            header('login.php');
        }else
        {
            echo "<h1>Error updating password.</h1>";
            header('resetPwSystem.php');
        }
    }else{
        echo "<h1>User ID does not exists.</h1>";
    }
?>