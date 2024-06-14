<?php
require_once('./connection.php');
session_start();

function debuger($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
if (isset($_POST['log_btn'])) {
    if (!empty($_POST['login']) && !empty($_POST['pwd'])) {
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM `users_db` WHERE (`uid` = '" . $_POST['login'] . "' || `email` = '" . $_POST['login'] . "') ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pwd, $row['pass'])) {
                $_SESSION['login'] = $_POST['login'];
                header('location:login.php?');
            } else {
                $loginErr = "Username or password is invalid";
                header("location:index.php:loginErr=$loginerr");
            }
        } else {
            $loginErr = "Wrong Username or password";
            header("location:index.php?loginErr=$loginErr");
        }
    } else {
        $loginErr = "uid or pwd is empty";
        header("location:index.php?loginErr=$loginErr");
    }
}
