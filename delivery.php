<html>
<head>
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
    <form class="center">
    <br/><br/><br/><br/>
        <p>1/SHOPPING CART 2/DELIVERY 3/PAYMENT</p>

            <fieldset>
                <input type="radio" id="pick-up" name="shipping" value="pick-up">
                <label for="pick-up">Pick-Up in store, FREE</label><br/><br/>
                <input type="radio" id="standard" name="shipping" value="standard">
                <label for="standard">Standard, RM6</label><br/><br/>
                <input type="radio" id="express" name="shipping" value="express">
                <label for="express">Express, RM12</label>
            </fieldset>

            <p>AMOUNT</p>

            <fieldset>
            <br/>
            Total Price:
            <br/><br/>
            Shipping Costs:
            <br/><br/>
            Total Payment:
            <br/><br/>
            </fieldset><br/>

            <input type="submit" name="backtocartBtn" value="Back to Cart">
            <input type="submit" name="continueBtn" value="Continue">
    </form>
        
    </body>
</html>