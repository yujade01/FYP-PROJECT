<?php 
session_start();
$role = $_SESSION["role"];
$username = $_SESSION["username"];
// Check to see the URL variable is set and that it exists in the database
    // Connect to the MySQL database

    $conn = mysqli_connect("localhost", "root", "", "pchub");

    if(isset ($_GET['id'])){

        $id = $_GET['id'];
         
        $query = "SELECT * FROM product WHERE productID ='$id'";
        $sql = mysqli_query($conn, $query);
    //    $productCount = mysqli_num_rows($sql); // count the output amount
     
    //    if ($productCount > 0) {
 	 	// get all the product details
        $row = mysqli_fetch_assoc($sql);
 	      $product_name = $row["productName"];
 	      $price = $row["productPrice"];
        $stock = $row["quantity"];
        $details = $row["productDesc"]; 
        $category = $row['categoryID'];
        $imagePath = $row['imgDir'];
    }

 ?> 

<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" type="text/css" href="productdetails.css">
  <title><?php echo $product_name; ?></title>


          <style>
              body{
                background: linear-gradient(-135deg, #c850c0, #4158d0);
              }

              .back-button{
              height : 40px;
              margin: 20px;
              display: inline-block;
              padding: 6px 12px;
              font-size: 14px;
              font-weight: normal;
              line-height: 1.42857143;
              text-align: center;
              white-space: nowrap;
              vertical-align: middle;
              -ms-touch-action: manipulation;
                  touch-action: manipulation;
              cursor: pointer;
              background-image: none;
              border: 1px solid transparent;
              border-radius: 4px;
          }

          .container {
              max-width: 1200px;
              margin-left: auto;
              margin-right: auto;
              padding: 15px;
              display: flex;
              background-color: white;
              border-radius: 15px;
            }

          /* Columns */
          .left-column{
              width: 850px;
              position: relative;

          }

          .right-column{
              width: 550px;
              margin-top: 0px;

          }

          /* Left Column */
          .left-column img{
              width: 450px;
              height: 450px;
              position: absolute;
              margin-left: 120px;
              
          }

          .price{
              color : red;
              font-size: 33px;
          }


          /* Right Column */
          /* Product Description */
          .product-desc{
              border-bottom: 1px solid #E1E8EE;
              margin-bottom: 20px;
          }

          .product-desc h1{
              font-weight: 300;
              font-size: 52px;
              color: #43484D;
              letter-spacing: -2px; 
              font-family: 'Roboto', sans-serif;
          }

          .desc{
              font-size: 16px;
              font-weight: 300;
              color: #86939E;
              line-height: 24px;
          }

          /* Product Price */
          .product-price {
              display: flex;
              align-items: center;
          }

          .price{
              font-size: 26px;
              font-weight: 300;
              color: #43474D;
              margin-right: 20px;
          }

          h1{
              margin-top: s100px;
          }

          .cartbtn{
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 350px;
            height: 50px;
            border-radius: 25px;
            background: #57b846;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            border: none;
            font-weight: bold;
            cursor: pointer;
          }

  </style>



</head>

<body>

  <!-- Navigation bar -->
  <?php include ('navigation.php');?>

  <a href="showproduct.php" ><input type="button" class="back-button btn-primary" value="< BACK"></input></a>

  <main class="container">
    <div class="left-column">
        <img src="<?php echo $imagePath ?>" width="500" height="500" alt="<?php echo $product_name; ?>" />
    </div>

      <div class = "right-column">
      <form action="add_to_cart.php" method="post">
      <input type="hidden" name="imgDir" value="<?php echo $imagePath; ?>"/>
        <div class = "product-desc">
            <h1><?php echo $product_name; ?></h1>
            <p class ="desc"><?php echo $details; ?></p>
        </div>

        <div>
        <?php if($role == "Customer") { ?>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
        <?php } ?>
        <?php if($role == "Admin") { ?>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo $stock ?>" min="1" disabled>
        <?php } ?>
        </div>

        <div class="product-price">
          <input type="hidden" name="price" value="<?php echo $price; ?>"/>
          <p class = "price"><?php echo "RM ".$price; ?><br/><p>
        </div>
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="hidden" name="pname" id="pname" value="<?php echo $product_name ?>"/>
        <?php if($role == "Customer") { ?>
          <input type="submit" class="cartbtn" name="add_to_cart" id="button" value="Add to Shopping Cart" />
         <?php } ?>
         <?php if($role == "Admin") { ?>
          <form method="GET">
          <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
          <a href="editProduct.php?pid=<?php echo $id ?>"><input type="button" name="edit" class="but btn-primary" value="UPDATE" /></a><br/><br/>
          </form>
         <?php } ?>
      </form>
      </div>
  </main>

  <?php include('footer.php')?>

</body>
</html>