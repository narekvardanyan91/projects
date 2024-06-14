<?php
require_once('connection.php');
if (isset($_POST['dell'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `shop` WHERE `id` = $id";
    $result = mysqli_query($con, $sql);
    header('location:admin.php');
}
