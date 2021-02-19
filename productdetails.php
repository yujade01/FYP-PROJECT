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
          <input type="submit" class="but btn-danger" name="add_to_cart" id="button" value="Add to Shopping Cart" />
         <?php } ?>
         <?php if($role == "Admin") { ?>
          <a href="update_product_form.php"><input type="button" id="updateProduct" class="but btn-primary" name="addBtn" value="UPDATE NOW"/></a><br/><br/>
         <?php } ?>
      </form>
      </div>
  </main>

  <?php //include('footer.php')?>

</body>
</html>