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
      body{
        background-color: #eff0f4;
      }

      .content{
        background-color: #afaafa; 
        height: 400px;
        width: 290px;
        margin-left: 10px;
        margin-top: -21px;
      }

      a:link {
        text-decoration: none;
        color: black;
      }

      a:visited {
        text-decoration: none;
        color:black;
      }

      a:active {
        text-decoration: none;
        color:black;
      }

      .column {
        float: left;
        width: 330px;
        padding: 10px;
        margin-top: 70px;
        margin-right : 75px;
        height: 390px;
        text-align: center;
      }

      .column:hover{  
        cursor: pointer;
    } 

    /*Clear floats after the columns */
    .row{
      margin-left: 190px; 
    }

    .prod{
        height: 290px;
        width: 290px;
    } 

    /* Search Bar */
    .container .input{
      border: 1;
      outline: none;
      color:black;
      box-sizing: border-box;
    }

    .search_wrap{
      width: 500px;
      margin: 38px auto;
    }

    .search_wrap .search_box{
      position: relative;
      width: 500px;
      height: 60px;
    }

    .search_wrap .search_box .input{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height:100%;
      padding: 10px 20px;
      border-radius: 3px;
      font-size: 18px;
    }

    .search_wrap .search_box .btn{
      position: absolute;
      top: 0;
      right: 0;
      width: 60px;
      height: 100%;
      z-index: 1;
      cursor: pointer;
    }

    .search_wrap .search_box .btn.btn_common .fas{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 20px;
    }

    .search_wrap.search_wrap_3 .search_box .input{
      padding-right: 80px;
    }

    .search_wrap.search_wrap_3 .search_box .input{
      border-radius: 50px;
    }

    .search_wrap.search_wrap_3 .search_box .btn{
      right: 0;
      border-radius: 55%; 
    } 

    .search{
      cursor: pointer;
      width: 60px;
      height: 100%;
      border-radius: 50%;
      background: #7690da;
    }

    .search:hover{
      background: #708bd2;

    }
    /* Button */
    .but {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
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

    .btn-info {
      color: #fff;
      background-color: #5bc0de;
      border-color: #46b8da;
    }

    .btn-warning {
      color: #fff;
      background-color: #f0ad4e;
      border-color: #eea236;
    }

      .btn-danger {
      color: #fff;
      background-color: #d9534f;
      border-color: #d43f3a;
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

        <div class="content">
        <img class = "prod" src = "<?php echo $row["imgDir"]; ?>">
        <h5 class="name"><?php echo $row["productName"]; ?></h5>
        <p class="price">RM<?php echo $row["productPrice"]; ?></p>
        </div>
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
?>
    <?php
    }
    ?>


</form>
</body>

</html>