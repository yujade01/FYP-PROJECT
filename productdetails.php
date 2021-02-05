<?php 
session_start();

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
        $details = $row["productDesc"]; 
        $category = $row['categoryID'];
        $imagePath = $row['imgDir'];
    }

 ?> 

<!DOCTYPE html>
<html>
<head>

  <title><?php echo $product_name; ?></title>

  <link rel = "stylesheet" type="text/css" href="productdetails.css">


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
    <div class = "product-desc">
        <h1><?php echo $product_name; ?></h1>
        <p class ="desc"><?php echo $details; ?></p>
    </div>

    <div>
      <form action="">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
      </form>
    </div>

    <div class="product-price">
      <p class = "price"><?php echo "RM ".$price; ?><br/><p>
    </div>

      <form  method="post" action="">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" class="but btn-danger" name="add_to_cart" id="button" value="Add to Shopping Cart" /> 

      </form>
 
  </div>
  </main>


</body>
</html>