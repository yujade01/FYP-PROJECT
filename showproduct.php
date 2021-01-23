<!DOCTYPE html>
<html>
<head>
    <title>Show Product</title>

    <link rel = "stylesheet" href= "showproduct.css">
  </head>
<body>

    <?php include ('navigation.php');?>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "pchub");

    $query = "SELECT * FROM `product` ";
    $query_run = mysqli_query($conn, $query);


    while($row = mysqli_fetch_array($query_run))
    {
    ?>
    
    <div class = "row">
    <div class="column" >
    <img class = "prod" src = "<?php echo $row["imgDir"]; ?>">
    <h2><?php echo $row["productName"]; ?></h2>
    <p><?php echo $row["productPrice"]; ?></p>
    </div>
    </div>
  
    <?php
    }
    ?>

  


</body>
</html>