<?php
session_start();
unset($_SESSION["page"]);
unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["role"]);
header("Location:login.php");
?>