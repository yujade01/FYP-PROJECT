<?php
    session_start();
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product | <?php echo $_SESSION["company"] ?></title>
    
    <script src="https://kit.fontawesome.com/22e170816e.js" crossorigin="anonymous"></script>

    <style>
      body{
        background: linear-gradient(-135deg, #c850c0, #4158d0);
        background-size: cover;
      }

      .content{
        background-color: #afaafa; 
        height: 400px;
        width: 290px;
        margin-left: 10px;
        margin-top: -21px;
        border-radius: 25px;
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
        border-radius: 25px 25px 0 0;
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
<div style="min-height:450vh;">
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
  //filter based on category
   if(isset($_GET['cid']))
   {
       $cid = $_GET['cid'];
       $conn = mysqli_connect("localhost", "root", "", "pchub");
       $filterCat = "SELECT * FROM product WHERE categoryID = '$cid'";
       $search_result = filterTable($filterCat);
   }
   //filter based on search
  else if(isset ($_POST['search']))
  {
  $valueToSearch = $_POST['valueToSearch'];
 
  //search in all table column
  $query = "SELECT * FROM `product` WHERE `productName` LIKE '%".$valueToSearch."%'";
  $search_result = filterTable($query);

  }
  //filter based on product attribute (name, price)
  else if(isset($_POST['sort']))
  {
    //sort product name A-Z
    if(isset($_POST['sort1']) == "atoz")
    {
      $atoz = "SELECT * from product ORDER BY productName ASC";
      $search_result = filterTable($atoz);
    }
    else if(isset($_POST['sort2']) == 'ztoa')
    {
      $ztoa = "SELECT * from product ORDER BY productName DESC";
      $search_result = filterTable($ztoa);
    }
    else if(isset($_POST['sort3']) == 'lowtohigh')
    {
      $lowtohigh = "SELECT * from product ORDER BY productPrice ASC";
      $search_result = filterTable($lowtohigh);
    }
    else if(isset($_POST['sort4']) == 'hightolow')
    {
      $hightolow = "SELECT * from product ORDER BY productPrice DESC";
      $search_result = filterTable($hightolow);
    }
    else
    {
      echo '<div class="btn-warning"> 
      <center><p>You did not select any options for sorting.</p></center>
      </div>';
      $selectAll = "SELECT * from product";
      $search_result = filterTable($selectAll);
    }
  }
  //show all products
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
        <form action="productdetails.php" method="GET">

          <a href = "productdetails.php?id=<?php echo $row ['productID'] ?>" name = "details">

          <div class="content">
          <img class = "prod" src = "<?php echo $row["imgDir"]; ?>">
          <h5 class="name"><?php echo $row["productName"]; ?></h5>
          <p class="price">RM<?php echo $row["productPrice"]; ?></p>
          </div>
          </a>
        
        </form>
        <p>
          <!-- For Admin Role only -->
          <?php if($role == "Admin") {?>
          <form action="deleteItem.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
            <input type="hidden" name="pid" value="<?php echo $row["productID"];?>"/>
            <a href="editProduct.php?pid=<?php echo $row["productID"]; ?>"><input type="button" name="edit" class="but btn-info" value="EDIT" /></a>
              <input type="submit" name="delete" class="but btn-danger" value="DELETE">
          </form>
          <?php } ?>
        </p>
      </div>
      </div>
  <?php } ?>
</form>
</div>
<?php include('footer.php')?>
</body>

</html>