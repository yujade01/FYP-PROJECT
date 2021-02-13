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
        </style>
    </head>
    <body>
    <?php include ('navigation.php'); ?>
    <!-- Jquery pluggin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php 
    if(!empty($_GET['shipping'])){ $option = $_GET['shipping'];}
    else{ $option = 0; $payment = $total; } //if no radio button is checked
    ?>
    <form class="center">
        <br/><br/><br/><br/>
        <p>1/SHOPPING CART <b>2/DELIVERY</b> 3/PAYMENT</p>

            <fieldset>                     
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

            <p>AMOUNT</p>

            <fieldset>
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
            <a href="payment.php"><input type="button" class="but btn-danger" name="continueBtn" value="Continue"></a>
    </form>
        
    </body>
</html>