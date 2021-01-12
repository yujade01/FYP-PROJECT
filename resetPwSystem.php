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

        if($result == 1)
        {
            echo "Password updated successfully.";
            header('login.php');
        }else
        {
            echo "Error updating password.";
            header('resetPwSystem.php');
        }
    }else{
        echo "User ID does not exists.";
    }
?>