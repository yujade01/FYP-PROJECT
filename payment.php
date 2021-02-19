<?php
    session_start();
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];

    $conn = mysqli_connect("localhost", "root", "", "pchub");

    if(isset($_GET['oid'])){

        $oid = $_GET['oid'];
        $query = "SELECT * FROM productorder WHERE orderID ='$oid'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $total = $row["total_amount"];
        $status = $row["status"];
    }

    $getPaymentMethod = "SELECT * FROM payment_method WHERE payment_method_id = '1'";
    $getMethodResult = mysqli_query($conn, $getPaymentMethod);
    //get payment method
    $row = mysqli_fetch_array($getMethodResult);
    $payment_method = $row["payment_method_name"];
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
    <form class="center" method="POST">
    <input type="hidden" name="payment_method" value="<?php echo $payment_method;?>"/>
        <br/><br/><br/><br/>
        <p>1/SHOPPING CART 2/DELIVERY <b>3/PAYMENT</b></p>
            <h4>Total Amount: RM<?php echo $total;?></h4>
            <br/>
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
            <input type="password" style="width: 50px" id="cvv" name="cvv" maxlength="3" required onkeypress="javascript:return isNumber(event)"/><br/><br/> 
            <label for="holderName">Cardholder Name</label>
            <input type="text" id="holderName" name="holderName" maxlength="30" required/><br/><br/>
            <input type="checkbox" name="agreement" required/>
            I agree to the purchase terms and conditions
            </fieldset>
            <br/><br/>

            <input type="button" onclick="cancelPayment()" class="but btn-primary" name="cancelBtn" value="Cancel">
            <input type="submit" class="but btn-danger" name="paybtn" value="Pay Now">
    </form>
    <?php
        if(isset($_POST['paybtn']))
        {
            $sql = "INSERT INTO payment (`paymentID`, `Username`, `orderID`, `total_amount`, `payment_method`, `paymentDate`) 
            VALUES('', '$username', '$oid', '$total', '$payment_method', now())";

            $sql2 = "UPDATE `productorder` SET `status` ='Paid' WHERE `orderID` = '$oid'";

            $insertPayment = mysqli_query($conn, $sql);
            $updateOrderStatus = mysqli_query($conn, $sql2);

            if($insertPayment && $updateOrderStatus)
            {
                ?>
                <script>alert("Thank you! Payment successful"); window.location.href="welcome.php"</script>
                <?php
            }else{
                ?>
                <script>alert("Something went wrong."); window.location.href="welcome.php"</script>
                <?php
            }
        }
    ?>
    <script>
        //Cancel Payment Confirm box
        function cancelPayment() {
            var cancel = confirm("Are you sure want to cancel payment?");
                if (cancel == true) {
                    window.location.href = "welcome.php";
                    return true;
                } else {
                    return false;
                }
            }
    </script>
    </body>
</html>