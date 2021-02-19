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
<div class="wrapper">
        <h1>Update Product</h1>
            <form action="update_product_system.php" method="post" enctype="multipart/form-data">
                <fieldset class="center">
                    <legend>Product Info</legend>
                    <div style="display: inline-block; text-align: left;">
                        <div class="form-group">
                            <label for="prod_id">Choose product to update:</label>
                            <?php
                            $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                            $sql="SELECT * FROM product"; 
                            echo "<select id='prod_id' name='prod_id' value=''></option>";

                            foreach ($conn->query($sql) as $row){//Array or records stored in $row

                            echo "<option value=$row[productID]> $row[productName]</option>"; 

                            /* Option values are added by looping through the array */ 
                            }
                            echo "</select>";// Closing of list box
                            ?>
                        </div>
                            
                        <div class="form-group">
                            <label for="new_prod_name">Product Name:</label>
                            <input type="text" id="new_prod_name" name="new_prod_name" value="" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_price">Product Price:</label>
                            <input type="text" id="new_prod_price" name="new_prod_price" value="" maxlength="10" required>
                        </div>

                        <div class="form-group">
                            <label for="new_quantity">Quantity:</label>
                            <input type="number" id="new_quantity" name="new_quantity" value="" min="1" max="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_desc">Description:</label>
                            <textarea id="new_prod_desc" name="new_prod_desc" rows="4" cols="50" value=""></textarea>
                        </div>
                        <div class="form-group">
                        <label for="new_category">Category:</label>
                            <?php
                            $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                            $sql="SELECT categoryID, categoryName FROM category"; 

                            /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                            echo "<select id='new_category' name='new_category' value=''>Student Name</option>"; // list box select command

                            foreach ($conn->query($sql) as $row){//Array or records stored in $row

                            echo "<option value=$row[categoryID]> $row[categoryName]</option>"; 

                            /* Option values are added by looping through the array */ 
                            }
                            echo "</select>";// Closing of list box
                            ?>
                        </div>
                    </div>
                        <div class="form-group">
                        <a href="showproduct.php"><input type="button" class="btn btn-primary" name="viewproduct" value="View Product"/></a>
                            <button type="submit" name="update" class="btn btn-danger">UPDATE</button>
                        </div>
                </fieldset>
            </form>

    </div>
</body>
</html>