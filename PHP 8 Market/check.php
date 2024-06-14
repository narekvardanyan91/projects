<?php
require("connection.php");
$name = '';
$price = '';
$image = '';
$type = '';
$sale_val = '';
$count = '';

$nameErr = $priceErr = $saleErr =  $sale_valErr = $imageErr = "";

if (isset($_POST['add'])) {
    // if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['image']) && !empty($_POST['type']) && !empty($_POST['sale'])) {


    ////////////////////// name confirmation////////////////////
    if (!empty($_POST['name'])) {
        if (preg_match('/[^A-Za-z\s]/', $_POST['name'])) {
            $nameErr = "Only text please";
        } else {
            $name = $_POST['name'];
        }
    } else {
        $nameErr = "Name of product required";
    }


    // /////////////////price confirmation/////////////////
    if (!empty($_POST['price'])) {
        if (!is_numeric($_POST['price'])) {
            echo $priceErr = "Only numeric price";
        } else {
            echo $price = $_POST['price'];
        }
    } else {
        echo $priceErr = 'Price is required';
    }


    //////////////sale confirmation////////////////////////
    $sale_val = $_POST['sale_val'];


    /////////////////// Type confirmation/////////////////
    $type = $_POST['type'];


    /////////////////// measure confirmation/////////////////
    $measure = $_POST['measure'];


    //////////////////// <<<PHOTO confirmation>>> //////////////////////
    $statusing = '';

    $targetDir = "./images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed to upload.';
    }
    echo $statusMsg;
    // header("location:admin.php");


    // }else{
    // header('location:admin.php?invalid=')
    // }


    if (!empty($name) && !empty($price) && !empty($type) && !empty($measure)) {
        $sql = "INSERT INTO `shop`(`name`, `price`, `type`, `measure`, `image`, `sale_val`) 
            VALUES ('$name','$price','$type','$measure', '$fileName', $sale_val)";
        mysqli_query($con, $sql);
        header('location:admin.php');
        // echo "true";
    } else {
        header("location:admin.php?nameErr=$nameErr&&priceErr=$priceErr&&statusMsg=$statuMsg&&sale_valErr=$sale_valErr");
    }
}
