<?php
require_once('./connection.php');
$id = $_GET['id'];

if (isset($_GET['name'])) {
    if (!empty($_POST['new_name'])) {
        if (preg_match('/[^A-Za-z\s]/', $_POST['new_name'])) {
            $newNameErr = "Only text please";
        } else {
            $newName = $_POST['new_name'];
            $sql = "UPDATE `shop` SET `name`='$newName' WHERE `id`='$id'";
            mysqli_query($con, $sql);
            // echo 'Name of id - ' . $id . ' is - ' . $newName;
            header('location:admin.php');
        }
    }
} else if (isset($_GET['price'])) {
    if (!empty($_POST['new_price'])) {
        if (!is_numeric($_POST['new_price'])) {
            // echo $newPriceErr = "Only numeric price";
            header('location:admin.php');
        } else {
            $newPrice = $_POST['new_price'];
            $sql = "UPDATE `shop` SET `price`='$newPrice' WHERE `id`='$id'";
            mysqli_query($con, $sql);
            // echo 'Price of id - ' . $id . ' is - ' . $newPrice;
            header('location:admin.php');

        }
    }
} elseif (isset($_GET['sale'])) {
    if (!empty($_POST['new_sale'])) {
        $newSale = $_POST['new_sale'];
    } else {
        $newSale = 0;
    }
    $sql = "UPDATE `shop` SET `sale_val`='$newSale' WHERE `id`='$id'";
    mysqli_query($con, $sql);
    // echo 'Sale of id - ' . $id . ' is - ' . $newSale;
    header('location:admin.php');
} elseif (isset($_GET['type'])) {
    $newType = $_POST['new_type'];
    $sql = "UPDATE `shop` SET `type`='$newType' WHERE `id`='$id'";
    mysqli_query($con, $sql);
    // echo 'Type of id - ' . $id . ' is - ' . $newType;
    header('location:admin.php');
} elseif (isset($_GET['measure'])) {
    $newMeasure = $_POST['new_measure'];
    $sql = "UPDATE `shop` SET `measure`='$newMeasure' WHERE `id`='$id'";
    mysqli_query($con, $sql);
    // echo 'Measure of id - ' . $id . ' is - ' . $newMeasure;
    header('location:admin.php');
} elseif (isset($_GET['image'])) {
    $statusing = '';
    $targetDir = "./images/";
    $fileName = basename($_FILES["new_file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["new_file"]["tmp_name"], $targetFilePath)) {
            $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed to upload.';
    }
    echo $statusMsg;
    $sql = "UPDATE `shop` SET `image`='$fileName' WHERE `id`='$id'";
    mysqli_query($con, $sql);
    header('location:admin.php');
}
