<?php
session_start();

    if(isset($_POST["add_to_cart"]))
    {
        $userid = $_SESSION["username"];
        $prod_id = $_POST["pid"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $imgDir = $_POST["imgDir"];

        $conn = mysqli_connect("localhost", "root", "", "pchub");
        //update product quantity
        
        //search whether similar product exists in table cart based on userID
        $search_id = "SELECT * FROM cart WHERE userID = '$userid' AND productID = '$prod_id'";
        $search_result = mysqli_query($conn, $search_id);
        $count = mysqli_num_rows($search_result);

        //insert into cart table
        $sql = "INSERT INTO cart VALUES('', '$userid', '$prod_id', '$quantity', '$price', '$imgDir')";
        //update stock from table product
        $update_stock = "UPDATE product set quantity = (quantity - '$quantity') 
        WHERE productID = '$prod_id'";

        //if query found the row
        if($count > 0)
        {  
            //update qty in existing record
            $update_qty = "UPDATE cart set quantity = (quantity + '$quantity') WHERE userID = '$userid' and productID = '$prod_id'";
            $update_result = mysqli_query($conn, $update_qty); 

            //if update qty successfully
            if($update_result == true)
            {
                //update quantity
                $update_stock_result = mysqli_query($conn, $update_stock);

                if($update_stock_result == true)
                {
                ?>
                <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
                }else{
                    ?>
                    <script> alert("Failed to update stock."); window.location.href = "cart.php";</script>
                    <?php
                }
            }else{
                ?>
                    <script> alert("Failed to update quantity."); window.location.href = "cart.php";</script>
                    <?php
            }
        }else if($result == true)
        {
            $update_stock_result = mysqli_query($conn, $update_stock);
            if($update_stock_result == true)
            {
                //insert item into cart
                $result = mysqli_query($conn, $sql);
            ?>
            <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
            }else{
                ?>
                    <script> alert("Something went wrong."); window.location.href = "cart.php";</script>
                    <?php
            }
        }else{
            ?>
            <script> alert("Failed to add product to cart"); window.location.href = "showproduct.php";</script>
            <?php
        }
    }
?>