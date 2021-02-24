<?php
if (isset($_POST['update'])) { 
    
    $productID = $_POST["prod_id"];
    $NewcategoryID = $_POST['new_category'];
    $NewproductName = $_POST["new_prod_name"];
    $NewproductPrice = $_POST["new_prod_price"];
    $Newqty = $_POST["new_quantity"];
    $NewproductDesc = $_POST["new_prod_desc"];

    $db = mysqli_connect("localhost", "root", "", "pchub");

    $sql = "UPDATE product 
            set categoryID = '$NewcategoryID', productName = '$NewproductName', productPrice = '$NewproductPrice',
            quantity = '$Newqty', productDesc = '$NewproductDesc'
            WHERE productID = '$productID'";

    $result = mysqli_query($db, $sql);

    //check query
    if ($result == true)  {
        ?>
        <script> alert("Product updated successfully"); window.location.href="showproduct.php";</script>
        <?php
    }else{ 
        ?>
        <script> alert("Failed to update product")</script>
        <?php
  }
}

?>