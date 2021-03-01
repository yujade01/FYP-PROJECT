<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

        <style>
            .limiter {
                width: 100%;
                margin: 0 auto;
            }

            .wrapper{
                width: 100%;
                min-height: 100vh;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                padding: 15px;
                background: linear-gradient(-135deg, #c850c0, #4158d0);
            }

            .container-login{
                width: 900px;
                background: white;
                border-radius: 10px;
                overflow: hidden;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 80px 130px 33px 95px;
            }

            .form-control{
                font-size: 20px;
                line-height: 1.5;
                color: #666666;
                width: 100%;
                background: #e6e6e6;
                height: 50px;
                border-radius: 25px;
                padding: 0 30px 0 50px;
             }

             

        </style>
    </head>
    <body>
    <div class="wrapper">
        <h1>Upload New Product</h1>

        <div class="limiter">
        <div class="wrapper center">
        <div class="container-login">

            <form action="uploadsystem.php" method="post" enctype="multipart/form-data">   
                
                    <div class="form-group">
                        <label for="prod_id">Product ID:</label>
                        <input type="text" class="form-control" id="prod_id" name="prod_id" maxlength="5">
                    </div>

                    <div class="form-group">
                        <label for="prod_name">Product Name:</label>
                        <input type="text" class="form-control" id="prod_name" name="prod_name" maxlength="256">
                    </div>

                    <div class="form-group">
                        <label for="prod_price">Product Price: </label>
                        <p style="margin-top: 15px; margin-left: 20px;" >RM</p>
                        <input type="text" class="form-control" id="prod_price" name="prod_price" maxlength="10" style="margin-top: -45px;">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="50">
                    </div>

                    <div class="form-group">
                        <label for="prod_desc">Product Description:</label>
                        <textarea class="form-control" id="prod_desc" name="prod_desc" rows="4" cols="50" placeholder="Write your description here...."></textarea>
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

                <div class="form-group">
                    <a href="showproduct.php"><input type="button" class="btn btn-primary" name="viewproduct" value="View Product"/></a>
                    <button type="submit" name="submit" class="btn btn-danger">UPLOAD</button>
                </div>
            </form>

    </div>

    </div>
    </div>
    </div>
    </body>
</html>