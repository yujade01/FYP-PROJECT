<?php
    session_start();
    $username = $_SESSION["username"];
    
    if(isset($_POST['delete_cart']))
    {
        $pid = $_POST["pid"];
        $conn = mysqli_connect("localhost", "root", "", "pchub");
        $sql = "DELETE FROM cart WHERE productID = '$pid' and Username = '$username'";

        $result = mysqli_query($conn, $sql);

        if ($result == true)  {
            ?>
            <script> alert("Product removed from cart.")</script>

            <?php
        }else{
            ?>
            <script> alert("Failed to remove from cart")</script>
            <?php
        }
        ?>
        <script> window.location.href="cart.php"; </script>
        <?php
        //header('Location: cart.php');
    }
?>