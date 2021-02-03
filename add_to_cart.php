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
        //update product quantity
        
        //search userID and productID in table cart
        $search_id = "SELECT * FROM cart where userID = '$userid' and productID = '$prod_id'";
        $search_result = mysqli_query($conn, $search_id);
        //insert into cart table
        $sql = "INSERT INTO cart value('', '$userid', '$prod_id', '$quantity', '$price', '$imgDir')";
        $result = mysqli_query($conn, $sql);

        if($search_result == true)
        {  
            //update qty in existing record
            $update_qty = "UPDATE cart set qty += '$quantity' where userID = '$userid' and productID = '$prod_id'";
            $update_result = mysqli_query($conn, $update_qty);

            if($update_result == true)
            {
                ?>
            <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
            }
        }
        else if($result == true)
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