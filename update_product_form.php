<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>

<body>
<div class="wrapper">
        <h1>Update Product</h1>
            <form action="update_product_system.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Select item want to update:
                    <?php
                    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                    $sql="SELECT productID, productName FROM product"; 
                    echo "<select name='prod_id' value=''></option>";

                    foreach ($conn->query($sql) as $row){//Array or records stored in $row

                    echo "<option value=$row[productID]> $row[productName]</option>"; 

                    /* Option values are added by looping through the array */ 
                    }
                    echo "</select>";// Closing of list box
                    ?>
                </div>
                    
                <div class="form-group">
                    New Product Name:
                    <input type="text" name="new_prod_name" value="" maxlength="30">
                </div>

                <div class="form-group">
                    New Product Price:
                    <input type="text" name="new_prod_price" value="" maxlength="10">
                </div>

                <div class="form-group">
                    New Quantity:
                    <input type="number" name="new_quantity" value="" min="1" max="10">
                </div>

                <div class="form-group">
                    New Product Description:
                    <textarea name="new_prod_desc" rows="4" cols="50" value=""></textarea>
                </div>
                <div class="form-group">
                    Category:
                    <?php
                    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                    $sql="SELECT categoryID, categoryName FROM category"; 

                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                    echo "<select name='new_category' value=''>Student Name</option>"; // list box select command

                    foreach ($conn->query($sql) as $row){//Array or records stored in $row

                    echo "<option value=$row[categoryID]> $row[categoryName]</option>"; 

                    /* Option values are added by looping through the array */ 
                    }
                    echo "</select>";// Closing of list box
                    ?>
                </div>

                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                </div>
            </form>

    </div>
</body>
</html>