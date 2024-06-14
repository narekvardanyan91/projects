<?php
require_once('connection.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["admin_uid"]) && !empty($_POST["admin_pwd"])) {
        $login = $_POST["admin_uid"];
        $password = $_POST["admin_pwd"];
        $sql = "SELECT * FROM `admin` WHERE `uid` = 'admin' AND `pwd` = 'admin11'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['logged_in'] = $login;
            header("location: admin.php");
        } else {
            echo "Invalid login or password.";
        }
    } else {
        echo "Login and password fields are required.";
    }
} else {
    echo "Form method must be POST.";
}
