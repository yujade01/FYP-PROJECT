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
        
        //search whether similar product exists in table cart based on userID
        $search_id = "SELECT * FROM cart where userID = '$userid' and productID = '$prod_id'";
        $search_result = mysqli_query($conn, $search_id);
        //insert into cart table
        $sql = "INSERT INTO cart value('', '$userid', '$prod_id', '$quantity', '$price', '$imgDir')";
        $result = mysqli_query($conn, $sql);
        //update stock from table product
        $update_stock = "UPDATE product set qty-=$quantity where userID = '$userid' and productID = '$prod_id'";

        //if query found the row
        if($search_result == true)
        {  
            //update qty in existing record
            $update_qty = "UPDATE cart set qty += '$quantity' where userID = '$userid' and productID = '$prod_id'";
            $update_result = mysqli_query($conn, $update_qty);

            //if update qty successfully
            if($update_result == true)
            {
                $update_stock_result = mysqli_query($conn, $update_stock);

                if($update_stock_result == true)
                {
                ?>
                <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
                }else{
                    error_reporting(E_ALL);
                }
            }else{
                error_reporting(E_ALL);
            }
        }else if($search_result == false && $result == true)
        {
            $update_stock_result = mysqli_query($conn, $update_stock);
            if($update_stock_result == true)
            {
            ?>
            <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
            }else{
                error_reporting(E_ALL);
            }
        }else{
            ?>
            <script> alert("Failed to add product to cart"); window.location.href = "showproduct.php";</script>
            <?php
        }
    }
?>