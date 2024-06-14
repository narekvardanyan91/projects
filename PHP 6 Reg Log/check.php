<?php
session_start();
require_once("connection.php");
if (isset($_POST['changeInfo'])) {
    header("location:login.php");
} 
if (isset($_POST['logOut'])) {
    header('location:logout.php');
} 
if (isset($_POST['del'])) {
    header('location:del.php');
}
// if(isset)






// logOut
// del
