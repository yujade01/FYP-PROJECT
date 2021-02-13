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
    else{ $option = 0; $payment = $total; } //if no radio button is checked
    
    //PRODUCT ARRAY
    $grand_total = 0;
    $allItems = '';

    //store product name and qty in an array
    $items = array();

    $conn = mysqli_connect("localhost", "root", "", "pchub");
    $sql = "SELECT CONCAT(productName, '(',quantity,')') AS ItemQty,
            totalprice FROM cart WHERE Username = '$username'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc())
    {
        $grand_total += $row['totalprice'];
        $items[] = $row['ItemQty'];
    }
    //break the array into single string
    $allItems = implode(", ", $items);
    ?>
    <br/>
    <hr>
    <div class="center alert alert-info">
        <h4>Complete Your order!</h4>
        <p><b>Your product(s): </b><?= $allItems ?></p>
    </div>
    <form class="center">
        <br/><br/>
        <p>1/SHOPPING CART <b>2/DELIVERY</b> 3/PAYMENT</p>
        
            <fieldset class="alert alert-info">                     
            <?php
                $conn = mysqli_connect("localhost", "root", "", "pchub");
                $query = "SELECT * from shipping";
                $result = mysqli_query($conn, $query);

                if($result == true)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <input type="radio" id="<?php echo $row["shipping_id"];?>" name="shipping" value="<?php echo $row["shipping_fee"];?>" onclick="Show()" 
                    <?php echo ($row["shipping_id"]==1)?'checked':'' //checked if id == 1?>/>
                    <label for="<?php echo $row["shipping_id"];?>"><?php echo $row["shipping_method"];?></label><br/><br/>
            <?php
                    }
            }
            ?>
            </fieldset>

            <fieldset class="alert alert-info">
            <p>AMOUNT</p>
            <br/>
            Total: RM <?php echo $total; $_SESSION["total"] = $total; ?>
            <br/><br/>
            Shipping Costs:RM <span class="fee"><?php echo $option;?></span>
            <br/><br/>
            Total Payment: RM <span class="payment"><?php echo $payment;?></span>
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
            </fieldset><br/>

            <a href="cart.php"><input type="button" class="but btn-primary" name="backtocartBtn" value="Back to Cart"></a>
            <a href="payment.php"><input type="button" class="but btn-danger" name="continueBtn" value="Place Order"></a>
    </form>
        
    </body>
</html>