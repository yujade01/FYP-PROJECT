<?php
    session_start();
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Product | <?php echo $_SESSION["company"] ?></title>

    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
    </head>
    <body>
        <?php include ('navigation.php');?>

        <?php
            $conn = mysqli_connect("localhost", "root", "", "pchub");
            if($role == "Admin")
            {
                $query = "SELECT * FROM productorder";
            }else if($role == "Customer")
            {
                $query = "SELECT `orderID`, `products`, `total_amount`, `shipping_method`, `orderDate`, `status` FROM productorder WHERE Username ='$username'";
            }
            
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if($count == 0)
            {
                ?>
                <p>There is no order right now.</p>
                <?php
            }
            else if($result == true)
            {
        ?>
        <br/><br/>
        <h4><center>Order History</center></h4>
        <div style="min-height: 46vh;">
            <?php
                if($role == "Admin")
                {
                ?>
                <table>
                    <tr>
                        <td>Order ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>Products (Name(Qty))</td>
                        <td>Total Amount</td>
                        <td>Shipping Method</td>
                        <td>Order Date</td>
                        <td>Status</td>
                    </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                        ?>
                        <tr>
                            <td><?php echo $row["orderID"]; ?></td>
                            <td><?php echo $row["Username"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row["products"]; ?></td>
                            <td>RM <?php echo $row["total_amount"]; ?></td>
                            <td><?php echo $row["shipping_method"]; ?></td>                    
                            <td><?php echo $row["orderDate"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                </table>
            <?php
            }
            else if($role == "Customer")
            {
                $x = 1;
            ?>
            <table>
                <tr>
                    <td>No.</td>
                    <td>Products (Name(Qty))</td>
                    <td>Total Amount</td>
                    <td>Shipping Method</td>
                    <td>Order Date</td>
                    <td>Status</td>
                </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                    ?>
                    <tr>
                        <input type="hidden" name="oid" value="<?php echo $row["orderID"];?>">
                        <td><?php echo $x;?></td>
                        <td><?php echo $row["products"]; ?></td>
                        <td>RM <?php echo $row["total_amount"]; ?></td>
                        <td><?php echo $row["shipping_method"]; ?></td>                    
                        <td><?php echo $row["orderDate"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <?php
                        if($row["status"] == "Unpaid")
                        {
                        ?>
                        <td>
                        <form action="payment.php" method="GET">
                        <a href="payment.php?oid=<?php echo $row ['orderID']?>"><input type="button" class="but btn-danger" value="Pay Now"/></a>
                        </form>
                        </td>
                        <?php
                        }else{
                            ?>
                        <?php
                        ?>
                    </tr>
                    <?php
                        $x++;
                    }
                }
                    ?>
            </table>
            <?php
            }
            ?>
            <p style="text-align:center;"><a href="welcome.php"><input type="button" class="but btn-primary" value="Back"/></a></p>
        </div>
        <?php
            }else{
                ?>
                <script>alert("Something went wrong.")</script>
                <?php
            }
        ?>
        <?php include('footer.php')?>
    </body>
</html>