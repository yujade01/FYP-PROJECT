<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<style>


        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }


        body{
            height: 100%;
            font-family: Poppins-Regular, sans-serif;
            margin: 0;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;

        }
        
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
        padding: 60px 130px 33px 95px;
    }

    .form-control{
            font-size: 20px;
            line-height: 1.5;
            color: #666666;
            width: 100%;
            background: #e6e6e6;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 30px;
    }

    h1{
        margin-bottom: 30px;
    }



</style>

</head>

<body>

        <div class="limiter">
        <div class="wrapper">
        <div class="container-login">

        <h1>Update Product</h1>


            <form action="update_product_system.php" method="post" enctype="multipart/form-data">
                    <!-- <legend>Product Info</legend> -->

                        <div class="form-group">
                            <label for="prod_id">Choose product to update:</label>

                            <?php
                            $conn = mysqli_connect('localhost' ,'root', '', 'pchub');
                            $sql="SELECT * FROM product"; 
                            echo "<select id='prod_id' name='prod_id' value=''></option>";

                            foreach ($conn->query($sql) as $row){    //Array or records stored in $row

                            echo "<option value=$row[productID]> $row[productName]</option>"; 

                            /* Option values are added by looping through the array */ 
                            }
                            echo "</select>";// Closing of list box
                            ?>
                        </div>
                            
                        <div class="form-group">
                            <label for="new_prod_name">Product Name:</label>
                            <input type="text" class="form-control" id="new_prod_name" name="new_prod_name" value="" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_price">Product Price:</label>
                            <input type="text" class="form-control" id="new_prod_price" name="new_prod_price" value="" maxlength="10" required>
                        </div>

                        <div class="form-group">
                            <label for="new_quantity">Quantity:</label>
                            <input type="number" class="form-control" id="new_quantity" name="new_quantity" value="" min="1" max="50" required>
                        </div>

                        <div class="form-group">
                            <label for="new_prod_desc">Description:</label>
                            <textarea class="form-control" id="new_prod_desc" name="new_prod_desc" rows="4" cols="50" value="" placeholder="Write your description here...."></textarea>
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

                        <div class="form-group">
                        <a href="showproduct.php"><input type="button" class="btn btn-primary" name="viewproduct" value="View Product"/></a>
                            <button type="submit" name="update" class="btn btn-danger">UPDATE</button>
                        </div>
            </form>


    </div>
    </div>
    </div>
</body>
</html>