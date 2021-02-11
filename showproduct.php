<?php
    session_start();
    $_SESSION["page"] = "Product";
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href= "showproduct.css">
    <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
    
    <script src="https://kit.fontawesome.com/22e170816e.js" crossorigin="anonymous"></script>
    <style>
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
    </style>
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

<?php include ('navigation.php');?>
  <form action="showproduct.php" method="post">

<div class="container">
<a href="welcome.php" ><input type="button" class="back-button btn-primary" value="< BACK"></input></a>
  <div class = "search_wrap search_wrap_3">
    <div class="search_box">
      <input type="text" class="input" name="valueToSearch" placeholder="Search">
      <div class= "btn btn_common">
      <button name="search" class= "search"><i class="fas fa-search"></i></button>
      </div>
    </div>
    <br/>
    <div>
      <?php include ('sort.php')?>
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
  else if(isset($_POST['sort']))
  {
    //sort product name A-Z
    if(isset($_POST['sort1']) == "atoz")
    {
      $atoz = "SELECT * from product ORDER BY productName ASC";
      $search_result = sortTable($atoz);
    }
    else if(isset($_POST['sort2']) == 'ztoa')
    {
      $ztoa = "SELECT * from product ORDER BY productName DESC";
      $search_result = sortTable($ztoa);
    }
    else if(isset($_POST['sort3']) == 'lowtohigh')
    {
      $lowtohigh = "SELECT * from product ORDER BY productPrice ASC";
      $search_result = sortTable($lowtohigh);
    }
    else if(isset($_POST['sort4']) == 'hightolow')
    {
      $hightolow = "SELECT * from product ORDER BY productPrice DESC";
      $search_result = sortTable($hightolow);
    }
    else
    {
      echo '<div class="btn-warning"> 
      <center><p>You did not select any options for sorting.</p></center>
      </div>';
      $selectAll = "SELECT * from product";
      $search_result = sortTable($selectAll);
    }
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

  function sortTable($query)
  {
    $conn = mysqli_connect("localhost", "root", "", "pchub");
    $sort_result = mysqli_query($conn, $query);
    return $sort_result;
  }
   
  //display database data
  while($row = mysqli_fetch_array($search_result))
    {
    ?>
    
      <div class = "row">
      <div class="column" >
        <form action="productdetails.php" method="GET">

        <a href = "productdetails.php?id=<?php echo $row ['productID'] ?>" name = "details">

        <p><input type="hidden" name="prodid" value="<?php echo $row["productID"];?>"></p>

        <img class = "prod" src = "<?php echo $row["imgDir"]; ?>">
        <h2><?php echo $row["productName"]; ?></h2>
        <p>RM<?php echo $row["productPrice"]; ?></p>

        </a>
        
        <p>
          <input type="hidden" name="id" value="<?php echo $row["productID"];?>">
          <!-- For Admin Role only
          <input type="submit" name="edit" class="but btn-info" value="EDIT">
          <input type="submit" name="delete" class="but btn-danger" value="DELETE"> -->
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
  }
?>

</form>
</body>
</html>