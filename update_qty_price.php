<?php
    session_start();
    $username = $_SESSION["username"];
    $productID = $_POST["pid"];
    $qty = $_POST['qty'];

    if(isset($_POST['decrement']))
    {
        $updated_qty = $qty - 1;

    }else if(isset($_POST['increment']))
    {
        $updated_qty = $qty + 1;   
    }
    
    if($updated_qty <=0)
    {
        //limit quantity to 0
        $updated_qty = 0;
        ?>
        <script> window.location.href="cart.php"; </script>
        <?php
    }else{
        $conn = mysqli_connect("localhost", "root", "", "pchub");
        $sql = "UPDATE cart set quantity = '$updated_qty' where Username = '$username' and productID = '$productID'";

        $result = mysqli_query($conn, $sql);
        
        if($result == true){
            header("Location: cart.php");
        }else{
            ?>
            <script> alert("Something went wrong."); </script>
            <?php
            header("Location: cart.php");
        }
    }
?>