<?php
    session_start();
    $_SESSION["page"] = "Checkout";
    $total = $_SESSION["total"];
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<html>
    <head>
        <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
        <style>
            .center {
                text-align: center;
                }
            fieldset{
                border: 1px solid black;
                width: 400px;
                margin:auto;
                }
            .form-group{
                margin-bottom:15px;
                width: 100%;
            }
            .alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}
            .alert h4{margin-top:0;color:inherit}
            .alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}
            .alert-info hr{border-top-color:#a6e1ec}
        </style>
    </head>
    <body>
    <?php include ('navigation.php'); ?>
    <!-- Jquery pluggin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php 
    if(!empty($_GET['shipping'])){ $option = $_GET['shipping'];}
    else{ $option = 0; $grand_total = $total; } //if no radio button is checked
    
    //PRODUCT ARRAY
    $allItems = '';

    //store product name and qty in an array
    $items = array();

    $conn = mysqli_connect("localhost", "root", "", "pchub");
    $sql = "SELECT productID, quantity,
            CONCAT(productName, '(',quantity,')') AS ItemQty,
            totalprice FROM cart WHERE Username = '$username'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
        $items[] = $row['ItemQty'];
        $cart_item[] = array(
            "ID" => $row['productID'],
            "qty" => $row['quantity']
        );
    }
    //print_r($cart_item);
    //print_r($items);

    $_SESSION['cart_item'] = $cart_item;
    //break the array into single string
    $allItems = implode(", ", $items);
    ?>
    <br/>
    <hr>
    <div class="center alert alert-info" id="order">
        <h4>Complete Your order!</h4>
        <p><b>Your product(s): </b><?= $allItems ?></p>
    </div>
    <div class="center">
        <br/><br/>
        <p>1/SHOPPING CART <b>2/DELIVERY</b> 3/PAYMENT</p>
        
        <fieldset class="alert alert-info"> 
            <fieldset class="alert alert-info">                     
        <fieldset class="alert alert-info"> 
        <form action="" method="post" id="placeOrder">                    
            <?php
                $conn = mysqli_connect("localhost", "root", "", "pchub");
                $query = "SELECT * from shipping";
                $result = mysqli_query($conn, $query);

                if($result == true)
                {
                    ?>
                    <h4>Shipping method:</h4>
                    <div id="shipping">
                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <input type="radio" id="<?php echo $row["shipping_id"];?>" name="shipping" value="<?php echo $row["shipping_fee"];?>" onclick="Show()" 
                    <?php echo ($row["shipping_id"]==1)?'checked':'' //checked if id == 1?>/>
                    <label for="<?php echo $row["shipping_id"];?>"><?php echo $row["shipping_method"];?></label><br/><br/>
            <?php
                    }
                ?>
                    </div>
            <?php
                }
            ?>
            <br/>
            <h4>AMOUNT</h4>
            Total: RM <?php echo $total; $_SESSION["total"] = $total; ?>
            <br/><br/>
            Shipping Costs:RM <span class="fee"><?php echo $option;?></span>
            <br/><br/>
            Total Payment: RM <span class="payment"><?php echo $grand_total; ?></span>
            <br/><br/>
            <script>
                $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
                    var value = $(this).val(); //Get the clicked checkbox value
                    var fee = parseFloat(value);
                    document.cookie = "fee = " + fee
                    var total = parseFloat("<?php echo $total ?>");
                    payment = total+fee;
                    $('.fee').html(fee);
                    $('.payment').html(payment);
                });
            </script>
            <br/>

                <h4>Shipping Details</h4>

            <br/><br/>
                <div class="form-group">
                <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" placeholder="Eg: John" required>
                </div>

                <input type="hidden" name="products" value="<?= $allItems ?>"/>

                <div class="form-group">
                <label for="email">Email Address:</label>
                    <input type="email" pattern=".+@gmail.com" id="email" name="email" placeholder="Eg: john123@gmail.com" required>
                </div>

                <div class="form-group">
                <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Eg: 0123456789" pattern="[0-9]{11}" required/>
                </div>

                <div class="form-group">
                <label for="address">House address:</label>
                    <input type="text" id="address" name="address" required/>
                </div>
                <a href="cart.php"><input type="button" class="but btn-primary" name="backtocartBtn" value="Back to Cart"></a>
                <input type="submit" name="submit" value="Place Order" class="but btn-danger">
            </form>
        </fieldset><br/>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

            <script type="text/javascript">
                $(document).ready(function() {

                    // Sending Form data to the server
                    $("#placeOrder").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'placeOrder.php',
                        method: 'post',
                        data: $('form').serialize() + "&action=order",
                        success: function(response) {
                        $("#order").html(response);
                        }
                    });
                    });
                });
            </script>
    </body>
</html>