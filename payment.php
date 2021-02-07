<?php
    session_start();
    $total = $_SESSION["total"];
?>
<html>
    <head>
        <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
        <style>
            .center {
            text-align: center;
            }
        </style>
    </head>
    <script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
    </script>
    <body>
    <?php include ('navigation.php'); ?>
    <form class="center">
        <br/><br/><br/><br/>
        <p>1/SHOPPING CART 2/DELIVERY <b>3/PAYMENT</b></p>

            <p>SELECT PAYMENT METHOD</p>
            <a href="#"><img src="visa-mastercard-logo.png" height="100px" width="500px"></a>
            <p>
            <input type="radio" id="visa" name="payment" value="visa">
            <label for="visa">Visa</label>
            <input type="radio" id="mastercard" name="payment" value="mastercard">
            <label for="mastercard">Mastercard</label><br>
            </p>

            <fieldset>
            <p style="color:red;">Please fill all the required information</p>
            <label for="cardNum">Card Number</label>
            <input type="text" id="cardNum" name="cardNum" maxlength="16" required onkeypress="javascript:return isNumber(event)"/><br/><br/>
            <label for="expiryDate">Expiry Date</label>
            <input type="number" style="width: 50px;" id="expiryDate" name="month" min="1" max="12" required/>
            <input type="number" style="width: 70px" id="expiryDate" name="year"min="2022" max="2027" required/><br/><br/>
            <label for="cvv">CVV</label>
            <input type="text" style="width: 50px" id="cvv" name="cvv" maxlength="3" required onkeypress="javascript:return isNumber(event)"/><br/><br/> 
            <label for="holderName">Cardholder Name</label>
            <input type="text" id="holderName" name="holderName" maxlength="30" required/><br/><br/>
            <input type="checkbox" name="agreement" required/>
            I agree to the purchase terms and conditions
            </fieldset>
            <br/><br/>

            <fieldset>
            <p>AMOUNT</p>
            <br/>
            Total: RM <?php echo number_format($total,2) ?>
            <br/><br/>
            Shipping Costs:RM <span><?php echo $fee;?></span>
            <br/><br/>
            <?php
                $payment = $total + $fee;
            ?>
            Total Payment: RM <span><?php echo number_format($payment, 2);?></span>
            <br/><br/>
            </fieldset><br/>

            <input type="submit" onclick="window.location.href='delivery.php'" class="but btn-primary" name="backbtn" value="Back">
            <input type="submit" class="but btn-danger" name="paybtn" value="Pay Now">
    </form>
        
    </body>
</html>