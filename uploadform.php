<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>
    <body>
    <div class="wrapper">
        <h1>Upload New Product</h1>
            <form action="uploadsystem.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    Product Name:
                    <input type="text" name="prod_name" maxlength="30">
                </div>

                <div class="form-group">
                    Product Price:
                    <input type="text" name="prod_price" maxlength="10">
                </div>

                <div class="form-group">
                    Category:
                    <?php
                    $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                    $sql="SELECT categoryID, categoryName FROM category"; 

                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

                    echo "<select name=student value=''>Student Name</option>"; // list box select command

                    foreach ($conn->query($sql) as $row){//Array or records stored in $row

                    echo "<option value=$row[categoryID]> $row[categoryName]</option>"; 

                    /* Option values are added by looping through the array */ 
                    }
                    echo "</select>";// Closing of list box
                    ?>
                </div>

                <div class="form-group">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                <div class="form-group">
                    <button type="submit" name="upload" class="btn btn-primary">UPLOAD</button>
                </div>
            </form>

    </div>
    </body>
</html>