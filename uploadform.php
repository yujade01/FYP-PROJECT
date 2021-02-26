<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style>
            #upload {
            text-align: center;
            margin: auto;
            }

            .center{
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <h1>Upload New Product</h1>
            <form action="uploadsystem.php" method="post" enctype="multipart/form-data">
                <fieldset class="center">
                <legend>Product Info</legend>
                <div style="display: inline-block; text-align: left;">
                    <div class="form-group">
                        <label for="prod_id">Product ID:</label>
                        <input type="text" id="prod_id" name="prod_id" maxlength="5">
                    </div>

                    <div class="form-group">
                        <label for="prod_name">Product Name:</label>
                        <input type="text" id="prod_name" name="prod_name" maxlength="256">
                    </div>

                    <div class="form-group">
                        <label for="prod_price">Product Price: RM</label>
                        <input type="text" id="prod_price" name="prod_price" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="50">
                    </div>

                    <div class="form-group">
                        <label for="prod_desc">Product Description:</label>
                        <textarea id="" id="prod_desc" name="prod_desc" rows="4" cols="50" placeholder="Write your description here...."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <?php
                        $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                        $sql="SELECT categoryID, categoryName FROM category"; 

                        /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                        echo "<select name='category' id='category' value=''></option>"; // list box select command

                        foreach ($conn->query($sql) as $row){//Array or records stored in $row

                        echo "<option value=$row[categoryID]> $row[categoryName]</option>"; 

                        /* Option values are added by looping through the array */ 
                        }
                        echo "</select>";// Closing of list box
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="upload">Choose image to upload:</label>
                        <input type="file" id="upload" name="images">
                    </div>
                </div>
                <div class="form-group">
                    <a href="showproduct.php"><input type="button" class="btn btn-primary" name="viewproduct" value="View Product"/></a>
                    <button type="submit" name="submit" class="btn btn-danger">UPLOAD</button>
                </div>
                </fieldset>
            </form>

    </div>
    </body>
</html>