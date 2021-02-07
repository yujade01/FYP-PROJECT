<?php
    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');

    if(!$conn){
        echo 'Not Connected To Server';
    }

    $username = $_POST['username'];
    $PWtoReset = $_POST['newPw'];
    $PWConfirm = $_POST['confirmPw'];

    $check = "SELECT * FROM account where Username = '$username'";
    $checkResult = mysqli_query($conn, $check);

    if(mysqli_num_rows($checkResult) >0)
    {
        $sql = "UPDATE account SET userPassword = '$PWtoReset' where Username ='$username'";
        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            ?>
        <script> alert("Password updated successfully"); window.location.href = "login.php";</script>
        <?php
        }else
        {
            ?>
            <script> alert("Failed to update password"); window.location.href = "login.php";</script>
            <?php
        }
    }else{
        echo "<h1>User ID does not exists.</h1>";
    }
?>