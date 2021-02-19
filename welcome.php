<?php
    session_start();
    $_SESSION["page"] = "Dashboard";
    $role = $_SESSION["role"];
    $username = $_SESSION["username"];
?>
<html>
    <head>
        <title><?php echo $_SESSION["page"] ?> | <?php echo $_SESSION["company"] ?></title>
    </head>
    <style>
        .green {
            color: green;
        }
        .center {
            text-align: center;
        }
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
        border: 1px solid transparent;
        border-radius: 4px;
        border-color: black;
        background-color: red;
        color: yellow;
        font-weight: bold;
        }
        .but:hover {
            background-color: blue;

        }
    </style>
    <body>
    <?php include ('navigation.php');?>
    <br/><br/><br/><br/>
    <div class="center">
        <h1>PC HUB</h1>
        <h2 class="green">ALWAYS AVAILABLE FOR YOU</h2>

        <!-- Show this button if role = customer -->
        <?php if(($role == "Customer")||($username == "GUEST")) {?>
        <button onclick="location.href='showproduct.php'" class="but" name="shopnow" value="continue">SHOP NOW ></button>
        <?php } ?>
        <!-- Show this button if role = admin -->
        <?php if($role == "Admin") {?>
        <button onclick="location.href='showproduct.php'" class="but" name="shopnow" value="continue">VIEW NOW ></button>
        <?php } ?>

        <br/><br/><br/><br/>
        <!-- Show Admin control panel if role = customer -->
        <?php if($role == "Admin") {?>
        <fieldset>
        <legend style="margin:20px;">ADMIN CONTROL PANEL</legend>
            <label for="addProduct">ADD NEW PRODUCT</label>
            <a href="uploadform.php"><input type="button" id="addProduct" class="but btn-primary" name="addBtn" value="ADD NOW"/></a><br/><br/>
            <label for="updateProduct">UPDATE EXISTING PRODUCT</label>
            <a href="update_product_form.php"><input type="button" id="updateProduct" class="but btn-primary" name="addBtn" value="UPDATE NOW"/></a><br/><br/>
        </fieldset>
        <?php } ?>
    </div>
        <?php //include('footer.php')?>
    </body>
</html>