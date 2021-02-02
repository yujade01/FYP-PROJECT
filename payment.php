<?php
    session_start();
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
    <body>
    <form class="center">
        <?php include ('navigation.php'); ?>
        <br/><br/><br/><br/>
        <p>1/SHOPPING CART 2/DELIVERY 3/PAYMENT</p>

            <p>SELECT PAYMENT METHOD</p>
            <a href="#"><img src="visa-mastercard-logo.png" height="100px" width="500px"></a>
            <p>
            <input type="radio" id="visa" name="payment" value="visa">
            <label for="visa">Visa</label>
            <input type="radio" id="mastercard" name="payment" value="mastercard">
            <label for="mastercard">Mastercard</label><br>
            </p>
    </form>
        
    </body>
</html>