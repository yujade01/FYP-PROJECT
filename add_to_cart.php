<?php
session_start();

    if(isset($_POST["add_to_cart"]))
    {
        $username = $_SESSION["username"];
        $prod_id = $_POST["pid"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $imgDir = $_POST["imgDir"];

        $conn = mysqli_connect("localhost", "root", "", "pchub");
        //update product quantity
        
        //search whether similar product exists in table cart based on userID
        $search_id = "SELECT * FROM cart WHERE Username = '$username' AND productID = '$prod_id'";
        $search_result = mysqli_query($conn, $search_id);
        $count = mysqli_num_rows($search_result);

        //insert into cart table
        $sql = "INSERT INTO cart VALUES('', '$username', '$prod_id', '$quantity', '$price', '', '$imgDir')";

        //if query found the row
        if($count > 0)
        {  
            //update qty in existing record
            $update_qty = "UPDATE cart set quantity = (quantity + '$quantity') WHERE Username = '$username' and productID = '$prod_id'";
            $update_result = mysqli_query($conn, $update_qty); 

            //if update qty successfully
            if($update_result == true)
            {
                ?>
                <script> alert("Product added to cart."); window.location.href = "cart.php";</script>
            <?php
            }else{
                ?>
                    <script> alert("Failed to update quantity."); window.location.href = "cart.php";</script>
                    <?php
            }
        }else if($count == 0)
        {
                //insert item into cart
                $result = mysqli_query($conn, $sql);
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