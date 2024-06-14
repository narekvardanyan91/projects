<?php
require_once('connection.php');
session_start();
$login = $_SESSION['login'];

if (isset($_POST['ChangeGender'])) {
    if (!empty($_POST['gender'])) {
        $newGender = $_POST['gender'];
        $sql = "UPDATE `users_db` SET `gen`='$newGender' WHERE `uid` = '$login' OR `email` = '$login'";
        $result = mysqli_query($con, $sql);
        header('location:login.php');
    }
}



// if (isset($_POST['done'])) {
if (isset($_POST['change_name'])) {
    $change_name = $_POST['change_name'];
    $sql = "UPDATE `users_db` SET `first`='$change_name' WHERE `uid` = '$login' OR `email` = '$login'";
    $result = mysqli_query($con, $sql);
    // echo "name";
    header("location:login.php");
}
if (isset($_POST['change_last'])) {
    $change_last = $_POST['change_last'];
    $sql = "UPDATE `users_db` SET `last`='$change_last' WHERE `uid` = '$login' OR `email` = '$login'";
    $result = mysqli_query($con, $sql);
    // echo "uid";
    header("location:login.php");
}
if (isset($_POST['change_uid'])) {
    $change_uid = $_POST['change_uid'];
    $sql = "UPDATE `users_db` SET `uid`='$change_uid' WHERE `uid` = '$login' OR `email` = '$login'";
    $result = mysqli_query($con, $sql);
    // echo "uid";
    header("location:login.php");
}
if (isset($_POST['change_email'])) {
    $change_email = $_POST['change_email'];
    $sql = "UPDATE `users_db` SET `email`='$change_email' WHERE `uid` = '$login' OR `email` = '$login'";
    $result = mysqli_query($con, $sql);
    // echo "email";
    header("location:login.php");
}
// }
