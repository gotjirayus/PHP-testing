<?php
session_start();
session_destroy();

//Redirect to login.php
header("Location: login.php")
?>