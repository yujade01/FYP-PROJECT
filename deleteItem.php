<?php

    if(isset($_POST['delete']))
    {
        $prod_id = $_POST['id'];

        $conn = mysqli_connect("localhost", "root", "", "pchub");

        $sql = "DELETE FROM product WHERE productID = '$prod_id'";

        $result = mysqli_query($conn, $sql);

        if ($result == true)  {
            ?>
            <script> alert("Product deleted successfully"); window.location.href ="showproduct.php";</script>
  
            <?php
          }else{
            ?>
            <script> alert("Failed to delete product"); window.location.href = "showproduct.php";</script>
            <?php
        }
    }
?>