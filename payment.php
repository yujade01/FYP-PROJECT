<?php
    session_start();
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

            .alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}
            .alert h4{margin-top:0;color:inherit}
            .alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}
            .alert-info hr{border-top-color:#a6e1ec}
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

            <h4>PAY WITH CREDIT/DEBIT CARD</h4>
            <a href="#"><img src="visa-mastercard-logo.png" height="100px" width="500px"></a>
            <p>
            <input type="radio" id="visa" name="payment" value="visa" required>
            <label for="visa">Visa</label>
            <input type="radio" id="mastercard" name="payment" value="mastercard" required>
            <label for="mastercard">Mastercard</label><br>
            </p>
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

            <a href="welcome.php"><input type="button" class="but btn-primary" name="cancelBtn" value="Cancel"></a>
            <input type="submit" class="but btn-danger" name="paybtn" value="Pay Now">
    </form>
        
    </body>
</html>