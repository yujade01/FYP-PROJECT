<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href= "showproduct.css">
    <title>Product</title>
    
    <script src="https://kit.fontawesome.com/22e170816e.js" crossorigin="anonymous"></script>
  </head>
<body>

  <!--Enter to trigger search button function-->
  <script>
  var input = document.getElementById("input");
  input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("search").click();
  }
  });
  </script>


  <form action="showproduct.php" method="post">

  <?php include ('navigation.php');?>

<div class="container">
  <div class = "search_wrap search_wrap_3">
    <div class="search_box">
      <input type="text" class="input" name="valueToSearch" placeholder="Search">
      <div class= "btn btn_common">
      <button name="search" class= "search"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>
</div>

  <?php
  if(isset ($_POST['search']))
  {
  $valueToSearch = $_POST['valueToSearch'];
 
  //search in all table column
  $query = "SELECT * FROM `product` WHERE `productName` LIKE '%".$valueToSearch."%'";
  $search_result = filterTable($query);

  }
  else{
  $query = "SELECT * FROM `product`";
  $search_result = filterTable($query);
  }
 
  //function to connect and execute the query
  function filterTable($query)
  {
  $conn = mysqli_connect("localhost", "root", "", "pchub");
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
  }
   
  //display database data
  while($row = mysqli_fetch_array($search_result))
    {
    ?>
    
      <div class = "row">
      <div class="column" >
        <form action="delete_product_system.php" method="POST">
        <img class = "prod" src = "<?php echo $row["imgDir"]; ?>">
        <h2><?php echo $row["productName"]; ?></h2>
        <p>RM<?php echo $row["productPrice"]; ?></p>
        <p>
          <input type="hidden" name="id" value="<?php echo $row["productID"];?>">
          <input type="submit" name="edit" class="but btn-info" value="EDIT">
          <input type="submit" name="delete" class="but btn-danger" value="DELETE">
        </p>
        </form>
      </div>
      </div>
  
 <!-- Delete Function -->   
<?php

    if(isset($_POST['delete']))
    {
        $prod_id = $_POST['id'];

        $conn = mysqli_connect("localhost", "root", "", "pchub");

        $sql = "DELETE FROM product WHERE productID = '$prod_id'";

        $result = mysqli_query($conn, $sql);

        if ($result == 1)  {
            ?>
            <script> alert("Product deleted successfully")</script>
  
            <?php
              header('Location: showproduct.php');
            
          }else{
            ?>
            <script> alert("Failed to delete product")</script>
            <?php
              header('Location: showproduct.php');
        }
    }  
?>
    <?php
    }
    ?>

</form>
</body>
</html>