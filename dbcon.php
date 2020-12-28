<?php
     $servername = "localhost";
     $DBusername = "root";
     $DBpassword = "";
     $DBname = "pchub";

     $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

     if(!$con)
     {
          die("Connection failed:".mysqli_connect_error());
     }
?>