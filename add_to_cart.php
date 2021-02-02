<?php
session_start();

    if(isset($_POST["add_to_cart"]))
    {
        $userid = $_SESSION["username"];
        $prod_id = $_POST["id"];
        $quantity = $_POST["qty"];
        $price = $_POST["price"];
        $imgDir = $_POST["imgDir"];

        $conn = mysqli_connect("localhost", "root", "", "pchub");
        //insert into cart table
        $sql = "INSERT INTO cart value('', '$userid', '$prod_id', '$quantity', '$price', '$imgDir')";
        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            ?>

            <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
        }else{
            ?>
            <script> alert("Failed to add product to cart"); window.location.href = "showproduct.php";</script>
            <?php
        }
    }
?>