<?php
require_once('connection.php');
session_start();
$login = $_SESSION['login'];
$sql = "DELETE FROM `users_db` WHERE `email`= '$login' OR `uid` = '$login'";
$result = mysqli_query($con, $sql);
session_destroy();
header("location:index.php");


?> 