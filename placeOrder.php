<?php
    session_start();
    $username = $_SESSION["username"];
    $total = $_SESSION['total'];
    $fee = $_COOKIE['fee'];
    $items = $_SESSION['cart_item']; //product id and qty inside array 

    if(isset($_POST['action']) && isset($_POST['action']) == 'order')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $products = $_POST['products'];
        $grand_total = $total + $fee;
        $shipping_fee = $_POST['shipping'];

        
        $data = '';
        $conn = mysqli_connect("localhost", "root", "", "pchub");
        $findMethod = "SELECT shipping_method FROM shipping WHERE shipping_fee ='$shipping_fee'";
        $find_result = mysqli_query($conn, $findMethod);
        while($row = $find_result->fetch_assoc())
        {
            //get shipping method
            $shipping_method = $row['shipping_method'];
        }
        //insert into productorder table
        $sql = "INSERT INTO productorder (
                `Username`, `cust_name`, `email`, `phone`, `address`, `products`, `total_amount`, `shipping_method`, `orderDate`)
                VALUES('$username', '$name', '$email', '$phone', '$address', '$products', '$grand_total', '$shipping_method', now())";
        $result = mysqli_query($conn, $sql);

        //message to display in invoice.php
        $data .= '<div>
                    <h1>Thank you!</h1>
                    <h2>Your order placed successfully! </h2>
                    <h4>Items Purchased: ' .$products. '</h4>
                    <h4>Your Name: '.$name.'</h4>
                    <h4>Your E-mail: '.$email.'</h4>
                    <h4>Your Phone: '.$phone.'</h4>
                    <h4>Your Address: '.$address.'</h4>
                    <h4>Total: '.number_format($grand_total,2).'</h4>
                    <h4>Shipping method: '.$shipping_method.'</h4>
                </div>';
        if($result == true)
        {   
            //deduct qty based on product id from array
            $length = count($items);
            for($i=0; $i < $length; $i++)
            {
                $pid = $items[$i]["ID"];
                $quantity = $items[$i]["qty"];
                $update_stock = "UPDATE product set quantity = (quantity - '$quantity') 
                WHERE productID = '$pid'";

                $update_stock_result = mysqli_query($conn, $update_stock);
            }

            //clear item from cart table based on username
            $clear_cart = "DELETE FROM cart WHERE Username = '$username'";
            $clear_result = mysqli_query($conn, $clear_cart);

            //if no errors after ran these queries
            if($update_stock_result && $clear_result)
            {
                $_SESSION['invoice'] = $data;
                ?>
            <script>alert("Your order placed successfully!"); window.location.href="invoice.php";</script>
            <?php
            }else
            {
                $_SESSION['invoice'] = "Something went wrong";
            }
        }else{
        ?>
            <script> alert("Something went wrong"); </script>
            <?php
        }
    }
?>