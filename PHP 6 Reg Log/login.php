<?php
include("connection.php");
session_start();
function debuger($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <div class="container">
        <!-- <h3>wellcome to main page</h3> -->

        <?php
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $sql = "SELECT * FROM `users_db` WHERE `uid`= '$login' OR `email`= '$login'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            // debuger($row);
            $id = $row['id'];
            $first = $row['first'];
            $last = $row['last'];
            $uid = $row['uid'];
            $email = $row['email'];
            $pass = $row['pass'];
            $gen = $row['gen'];
        }

        ?>

        <div class="main">
            <div class="avaContainer">
                <div class="avatar">
                    <img src="./<?= $gen . ".png" ?>" width="100%" height="100%" alt="Gender image">
                </div>
                <div>

                </div>
                <form action="check.php" method="POST" class="mainChange">
                    <input type="submit" value="log Out" name="logOut" id="logOut" class="logOut btn">
                    <input type="submit" value="Delete User" name="del" id="del" class="del btn red">
                </form>

            </div>
            <div class="infoContainer">
                <p class="disp"><button id="show_btns" class="show_btns"> press for change info</button></p>
                <p class="disp">name <?= $first ?> <button class="ch_btn" id="change_name" onclick="chng(id)" name="change_name">Change</button></p>
                <p class="disp">lastname <?= $last ?> <button class="ch_btn" id="change_last" onclick="chng(id)" name="change_last">Change</button></p>
                <p class="disp">username <?= $uid ?> <button class="ch_btn" id="change_uid" onclick="chng(id)" name="change_uid">Change</button></p>
                <p class="disp">email <?= $email ?> <button class="ch_btn" id="change_email" onclick="chng(id)" name="change_email">Change</button></p>
                <p class="disp">gender <?= $gen ?> <button class="ch_btn" id="gen_change"> Change</button></p>



                <div class="genChangeBox" id="genChangeBox">

                    <h3>Choose your Gender</h3>
                    <form class="radios" action="change.php" id="radios" name="radios" method="POST">
                        <?php
                        if ($gen == 'male') {
                        ?>
                            <input type="radio" name="gender" value="female">female
                            <input type="radio" name="gender" value="animale">animale
                            <br>
                            <input type="submit" name="ChangeGender" value="submit">
                        <?php
                        } elseif ($gen == 'female') {
                        ?>
                            <input type="radio" name="gender" value="male">male
                            <input type="radio" name="gender" value="animale">animale
                            <br>
                            <input type="submit" name="ChangeGender" value="submit">
                        <?php
                        } else {
                        ?>
                            <input type="radio" name="gender" value="male">male
                            <input type="radio" name="gender" value="female">female
                            <br>
                            <input type="submit" name="ChangeGender" value="submitGender">
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>


            <div id="changeContainer" class="changeContainer">
                <form action="change.php" method="POST" id="chform" class="chForm">
                    <h3>Write new info</h3>
                    <input type="text" id="input_change" placeholder="write new">
                    <div class="">
                        <input type="submit" value="done" class="btn">
                        <input type="submit" value="cancel" class="btn red">
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script src="./script.js"></script>
</body>

</html>