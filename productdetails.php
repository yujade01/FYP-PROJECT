<?php 
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
        
        
		 
//  	} else {
//  		echo "That item does not exist.";
//  	    exit();
//  	}
		
//  } else {
//  	echo "Data to render this page is missing.";
//  	exit();
//  }
//   mysql_close();

    }
 ?> 

<!DOCTYPE html>
<html>
<head>

<title><?php echo $product_name; ?></title>

</head>
<body>


<div align="center" id="mainWrapper">

  <!--<?php include_once("template_header.php");?>-->

  <div id="pageContent">

  <table width="100%" border="0" cellspacing="0" cellpadding="15">

  <tr>
    <td width="19%" valign="top"><img src="<?php echo $imagePath ?>" width="142" height="188" alt="<?php echo $product_name; ?>" /><br />
    <td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br/>
        <br />
        <?php echo $category; ?> <br />
<br />
         <?php echo $details; ?> 
<br />
        </p>
      <!--
      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form>
      </td>
    </tr>
</table>
  </div>
</div> -->

</body>
</html>