<?php
    session_start();
    $_SESSION["page"] = "Profile";
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<style>
.center{
    text-align: center;
}
</style>
</head>

<body>
<?php
 if(isset($_GET['pid']))
 {
     $pid = $_GET['pid'];
     $conn = mysqli_connect("localhost", "root", "", "pchub");
     $getProduct = "SELECT * FROM product WHERE productID = '$pid'";
     $result = mysqli_query($conn, $getProduct);
?>
<div class="wrapper">
        <h1>Update Product</h1>
            <form action="update_product_system.php" method="post" enctype="multipart/form-data">
                <fieldset class="center">
                    <legend>Product Info</legend>
                    <div style="display: inline-block; text-align: left;">
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <div class="form-group">
                            <label for="prod_id">Product ID:</label>
                            <input type="text" id="prod_id" name="prod_id" value="<?php echo $row["productID"]; ?>" maxlength="50" readonly>
                        </div>
                        <div class="form-group">
                            <label for="new_prod_name">Product Name:</label>
                            <input type="text" id="new_prod_name" name="new_prod_name" value="<?php echo $row["productName"]; ?>" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_price">Product Price:</label>
                            <input type="text" id="new_prod_price" name="new_prod_price" value="<?php echo $row["productPrice"]; ?>" maxlength="10" required>
                        </div>

                        <div class="form-group">
                            <label for="new_quantity">Quantity:</label>
                            <input type="number" id="new_quantity" name="new_quantity" value="<?php echo $row["quantity"]; ?>" min="1" max="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_desc">Description:</label>
                            <textarea id="new_prod_desc" name="new_prod_desc" rows="4" cols="50"><?php echo $row["productDesc"]; ?></textarea>
                        </div>
                        <div class="form-group">
                        <input type="hidden" name="new_category" value="<?php echo $row["categoryID"] ?>" />
                        <label for="new_category">Category:</label>
                            <?php
                            $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                            $sql="SELECT category.categoryName FROM category 
                            INNER JOIN product ON product.categoryID = category.categoryID WHERE product.productID = '$pid'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
                            <input type="text" value="<?php echo $row['categoryName']?>" readonly/>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                        <div class="form-group">
                        <a href="showproduct.php"><input type="button" class="btn btn-primary" name="viewproduct" value="Back"/></a>
                            <button type="submit" name="update" class="btn btn-danger">UPDATE</button>
                        </div>
                </fieldset>
            </form>

    </div>
    <?php
 }
 ?>
</body>
</html>