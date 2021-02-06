<?php
    session_start();
    $_SESSION["page"] = "Cart";
?>
<html>
    <head>
    <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            table, th {
                border: 1px solid black;
                padding: 5px;
                }
            table {
            border-spacing: 15px;
            }
            div{
                text-align: center;
            }
            .center {
            margin-left: auto;
            margin-right: auto;
            }
            .icon {
                height: 50px;
                width: 50px;
            }
            .btn {
            background-color: black; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            }        
        </style>
    </head>
    <body>
        <?php include ('navigation.php'); ?>
        <div>
            <br/><br/><br/><br/>
        
        <?php
            if($_SESSION["loggedin"] != true)
            {
                ?>
                <p><h1>Please login to view your cart.</h1></p>
                <?php
            }else{

                $username = $_SESSION["username"];
                $conn = mysqli_connect("localhost", "root", "", "pchub");
                $query = "SELECT cart.imgDir, cart.productID, product.productName, cart.quantity, cart.price, cart.totalprice FROM cart 
                INNER JOIN product on cart.productID = product.productID and cart.imgDir = product.imgDir where userID = '$username'";

                $result = mysqli_query($conn, $query); // First parameter is just return of "mysqli_connect()" function
                $count = mysqli_num_rows($result);
        ?>
        <p><b>1/SHOPPING CART</b> 2/DELIVERY 3/PAYMENT</p>
        <?php
                if($count == 0)
                {
                    ?>
                    <p>You have no item in your cart.</p>
                    <input type="submit" onclick="window.location.href='showproduct.php'" class="btn btn-primary" name="backBtn" value="BACK">
                    <?php
                }else
                    {
                ?>
                    <table class="center">
                        <tr>
                            <td>
                            </td>
                            <td>
                                Product ID
                            </td>
                            <td>
                                Product Name
                            </td>
                            <td>
                                Quantity
                            </td>
                            <td>
                                Price
                            </td>
                            <td></td>
                        </tr>
                        <?php
                            echo "<br>";
                            $totalprice = 0;
                            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                                ?>
                                <tr>
                                    <td>
                                    <img class = "icon" src = "<?php echo $row["imgDir"]; ?>">
                                    </td>
                                    <td>
                                    <form action="update_qty_price.php" method="POST">
                                    <input type="hidden" name="pid" value="<?php echo $row["productID"];?>">
                                    <?php echo $row["productID"]; ?>
                                    </td>
                                    <td>
                                    <?php echo $row["productName"]; ?>
                                    </td>
                                    <td>
                                        <input type="submit" name="decrement" value="-"/>
                                        <input type="text" name="qty" value="<?php echo $row["quantity"]; ?>" min="1" maxlength="2">
                                        <input type="submit" name="increment" value="+"/>
                                    </td>
                                    <td>
                                    <span>RM<?php echo number_format($row["totalprice"], 2); ?></span>
                                    </td>
                                    </form>
                                    <form action="delete_cart.php" method="POST">
                                    <td>
                                    <input type="hidden" name="pid" value="<?php echo $row["productID"];?>">
                                    <button type="submit" class="btn btn-danger" name="delete_cart">
                                    <i class="fa fa-trash-o fa-lg"></i> Delete
                                    </button>
                                    </td>
                                    </form>
                                </tr>
                                <?php
                                $totalprice += ($row["quantity"] * $row["price"]);
                            }
                            ?>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Subtotal: </td>
                            <td><span>RM <?php echo number_format($totalprice, 2) ?></span></td>
                            </tr>
                            <?php
                            echo "</table>";
                        ?>
                    </table>
            <br/>
            <?php
                $_SESSION["total"] = $totalprice;
            ?>
            <input type="submit" onclick="window.location.href='showproduct.php'" class="btn btn-primary" name="keepbuyingBtn" value="Keep Buying">
            <input type="submit" onclick="window.location.href='delivery.php'" class="btn btn-danger" name="processBtn" value="Process Order">
            <?php
                }
            ?>
        </div>
        <?php
            }
        ?>
    </body>
</html>