<?php
    session_start();
    $_SESSION["page"] = "Checkout";
    $total = $_SESSION["total"];
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
    else{ $option = '0';} //if no radio button is checked
    ?>
    <form class="center">
        <br/><br/><br/><br/>
        <p>1/SHOPPING CART <b>2/DELIVERY</b> 3/PAYMENT</p>

            <fieldset>
                <input type="radio" id="pick-up" name="shipping" value="0" onclick="Show()">
                <label for="pick-up">Pick-Up in store, FREE</label><br/><br/>
                <input type="radio" id="standard" name="shipping" value="6" onclick="Show()">
                <label for="standard">Standard, RM6</label><br/><br/>
                <input type="radio" id="express" name="shipping" value="12" onclick="Show()">
                <label for="express">Express, RM12</label>
            </fieldset>

            <p>AMOUNT</p>

            <fieldset>
            <br/>
            Total: RM <?php echo number_format($total,2) ?>
            <br/><br/>
            Shipping Costs:RM <span class="fee"><?php echo $option;?></span>
            <script>
                $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
                    var value = $(this).val(); //Get the clicked checkbox value
                    $('.fee').html(value);
                });
            </script>
            <br/><br/>
            <?php
                $payment = $total + $option;
            ?>
            Total Payment: RM <span><?php echo number_format($payment, 2);?></span>
            <br/><br/>
            </fieldset><br/>

            <input type="button" onclick="window.location.href='cart.php'" class="but btn-primary" name="backtocartBtn" value="Back to Cart">
            <input type="button" onclick="window.location.href='payment.php'" class="but btn-danger" name="continueBtn" value="Continue">
    </form>
        
    </body>
</html>