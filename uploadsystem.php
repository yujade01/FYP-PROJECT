<?php
//for getting 0 error while php code is running
error_reporting(0); 
?> 
<?php
  //$msg = ""; 
  
  // If upload button is clicked ... 
  if (isset($_POST['submit'])) { 

    $productID = $_POST["prod_id"];
    $categoryID = $_POST['category'];
    $productName = $_POST["prod_name"];
    $productPrice = $_POST["prod_price"];
    $qty = $_POST["quantity"];
    $productDesc = $_POST["prod_desc"];

    $name = $_FILES['images']['name'];
    //explode() breaks string into array of string
    //end() move pointer to the last elements of array, shows only extension
    //$ext = end((explode(".", $name)));
    
    //preg_replace() used to replace white spaces with _ (underscore)
    $pattern = '/\s+/';
    $replacement = '_';
    $filename = preg_replace($pattern, $replacement, $name);
    $dir = "images/".$filename;
        
    //echo "$dir";
    $db = mysqli_connect("localhost", "root", "", "pchub");
    
        // Get all the submitted data from the form 
        //now() is given the value of current data & time
        $sql = "INSERT INTO product
        VALUES ('$productID', '$categoryID', '$productName', '$qty', '$productPrice', '$productDesc', '$dir', now())";
    
        // Execute query 
       $result = mysqli_query($db, $sql); 
        
       //check query
        if ($result == 1)  {
          ?>
          <script> alert("Product uploaded successfully")</script>

          <?php
            //$msg = "Product uploaded successfully";
          
        }else{
          ?>
          <script> alert("Failed to upload product")</script>
          <?php
            //$msg = "Failed to upload product"; 
      }
      //echo "<h1>$msg</h1>";
  } 
?> 