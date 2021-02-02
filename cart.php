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
            .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
            }

            /* Darker background on mouse-over */
            .btn:hover {
            background-color: red;
            }
        </style>
    </head>
    <body>
        <?php include ('navigation.php'); ?>
        <div>
            <br/><br/><br/><br/>
        <p>1/SHOPPING CART 2/DELIVERY 3/PAYMENT</p>
            <table class="center">
                <tr>
                    <td>
                        Image
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

                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "pchub");
                    $query = "SELECT cart.imgDir, cart.productID, product.productName, cart.quantity, cart.price FROM cart 
                    INNER JOIN product on cart.productID = product.productID and cart.imgDir = product.imgDir";

                    $result = mysqli_query($conn, $query); // First parameter is just return of "mysqli_connect()" function
                    echo "<br>";
                    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                        // echo "<tr>";
                        // foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                        //     echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                        // }
                        // echo "</tr>";
                        ?>
                        <tr>
                            <td>
                            <img class = "icon" src = "<?php echo $row["imgDir"]; ?>">
                            </td>
                            <td>
                            <?php echo $row["productID"]; ?>
                            </td>
                            <td>
                            <?php echo $row["productName"]; ?>
                            </td>
                            <td>
                                <input type="number" value="<?php echo $row["quantity"]; ?>">
                            </td>
                            <td>
                            RM<?php echo $row["price"]; ?>
                            </td>
                            <td>
                            <a class="btn btn-danger" href="#">
                            <i class="fa fa-trash-o fa-lg"></i> Delete
                            </a>
                            </td>
                        </tr>
                        <?php
                    }
                    echo "</table>";
                ?>
            </table>
            <br/>
            <input type="submit" name="keepbuyingBtn" value="Keep Buying">
            <input type="submit" name="processBtn" value="Process Order">
        </div>
        
    </body>
</html>