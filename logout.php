<?php
session_start();
unset($_SESSION["page"]);
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
header("Location:login.php");
?>