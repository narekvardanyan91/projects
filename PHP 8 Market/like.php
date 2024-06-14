<?php
require('./connection.php');
$debuger = function ($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
};
$sql = "SELECT * FROM `shop`";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // $debuger($row);
        // $debuger($result);
    }
}
