<?php
require("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./adminstyle.css">
    <link rel="stylesheet" href="../fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="./head.css">
    <link rel="stylesheet" href="./style1.css">
</head>

<body>

    <?php


    if (isset($_SESSION['logged_in'])) {
    ?>
        <div class="some_div_container">
            <div class="container">
                <form action="check.php" class="add_form" method="POST" enctype="multipart/form-data">
                    <h1>Admin Panel</h1>
                    <h3>Add your product</h3>
                    <input class="inputs i_name" type="text" placeholder="name" name="name">
                    <span class="err"><?= @$_GET['nameErr']; ?> </span>
                    <input class="inputs i_name" type="text" placeholder="price" name="price">
                    <span class="err"><?= @$_GET['priceErr']; ?></span>
                    <input class="inputs load" type="file" placeholder="file img" name="file">
                    <span class="err"><?= @$_GET['imgErr']; ?></span>
                    <div class="typeBox">
                        <input class="inputs rad" type="radio" name="type" value="fruit" checked>fruit
                        <input class="inputs rad" type="radio" name="type" value="vegitable">vegitable
                    </div>
                    <div class="measureBox">
                        <input class="inputs rad" type="radio" name="measure" value="weight" checked>weight
                        <input class="inputs rad" type="radio" name="measure" value="count">count
                    </div>
                    <span class="txt">
                        <input class="inputs rad chk" type="checkbox" name="sale">sale
                        <input class="inputs saleValue" type="number" name="sale_val" value="0" min="0" max="99" step="1"></span>
                    <span class="err"><?= @$_GET['sale_valErr']; ?></span>
                    <div class="btns">
                        <input type="submit" class="btn inputs " name="add" value="add">
                        <input type="reset" class="btn inputs " name="reset" value="cancel">
                    </div>
                </form>
            </div>
            <!-- <div class="tableContainer">
            <table border="2">
                <?php
                $query = "SELECT * FROM `shop`";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td class="td_id"><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['price'] . 'amd'; ?></td>
                            <td><?= $row['type']; ?></td>
                            <td><?= $row['measure']; ?></td>
                            <td class="td_sale"><?= $row['sale_val'] . '%'; ?></td>
                            <td><?= $row['image']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div> -->
            <!--     
    <iframe src="./admincontrol.php" frameborder="0" width="100%">
    </iframe> -->
            <div class="some_div">
                <div class="nav_container">
                    <div class="nav_box">
                        <div class="logo">
                            <img src="./logo.jpg" width="100%" height="100%" alt="">
                        </div>
                        <ul class="nav_items">
                            <li class="some_nav_items"><a href="./admincontrol.php?all">All</a></li>
                            <li class="some_nav_items"><a href="./admincontrol.php?fruit">Fruit</a></li>
                            <li class="some_nav_items"><a href="./admincontrol.php?vegitable">vegitable</a></li>
                            <li class="some_nav_items"><a href="./admincontrol.php?m50">sale -50%</a></li>
                            <li class="some_nav_items"><a href="./admincontrol.php?p50">sale 50%+</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mainContainer">
                    <?php
                    if (isset($_GET['fruit'])) {
                        $sql = "SELECT * FROM `shop` WHERE `type` = 'fruit'";
                    } elseif (isset($_GET['vegitable'])) {
                        $sql = "SELECT * FROM `shop` WHERE `type` = 'vegitable'";
                    } elseif (isset($_GET['m50'])) {
                        $sql = "SELECT * FROM `shop` WHERE `sale_val` < 50";
                    } elseif (isset($_GET['p50'])) {
                        $sql = "SELECT * FROM `shop` WHERE `sale_val` >= 50";
                    } else {
                        $sql = "SELECT * FROM `shop`";
                    }
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="container1 ">
                                <?php
                                if ($row['sale_val'] > 0) {
                                ?>
                                    <div class="sale"><?= $row['sale_val'] . '%' ?></div>
                                <?php
                                }
                                ?>
                                <h2 class="productName"><?= $row['name']; ?></h2>
                                <p class="price">
                                    <?php
                                    if ($row['sale_val'] > 0) {
                                    ?>
                                        <span><del><?= $row['price']; ?></del></span>amd
                                        <!-- echo '<del>' . $row['price'] . ' amd' . '</del>' . ' '; -->
                                        <?php
                                        ?>
                                        <span class="ginn"><?= $row['price'] - $row['price'] * $row['sale_val'] / 100; ?></span> amd
                                    <?php
                                    } else {
                                    ?>
                                        <span class='ginn'><?= $row['price'] ?> </span> amd
                                        <!-- echo $row['price'] . ' amd'; -->
                                    <?php
                                    }
                                    ?>
                                </p>
                                <div class="photo">
                                    <img class="imgg" src="./images/<?= $row['image']; ?>" alt="" height="100%">
                                </div>
                                <div class="btnnns">
                                    <button class="button change_Name changeee">Change Name</button>
                                    <button class="button change_Price changeee">Change Price</button>
                                    <button class="button change_Sale changeee">Change Sale</button>
                                    <button class="button change_Type changeee">Change Type</button>
                                    <button class="button change_Measure changeee">Change Measure</button>
                                    <button class="button change_Photo changeee">Change Photo</button>
                                    <button class="dell btnnn">delete</button>
                                </div>
                            </div>
                            <div class="container2">
                                <h2>Are you sure want to delete this item?</h2>
                                <?php $id = $row['id']; ?>
                                <form class="delform" action="del.php?id=<?= $id ?>" method="POST">
                                    <input type="submit" class="dell btnnn" name="dell" value="delete"></input>
                                    <input type="reset" class="cancelll" id="cancelll" name="cancel" value="cancel"></input>
                                </form>
                            </div>
                            <div class="container3">
                                <button class="close"><a href="admin.php">X</a></button>
                                <?php
                                $id = $row['id'];
                                $prod_name = $row['name'];
                                $prod_price = $row['price'];
                                $prod_type = $row['type'];
                                $prod_measure = $row['measure'];
                                $prod_sale_val = $row['sale_val'];
                                $prod_image = $row['image'];
                                ?>

                                <form class='for_change_name hided' action="change.php?name&id=<?= $id ?>" method="POST">
                                    <input class="inp_change_name" type="text" placeholder="<?= $prod_name ?>" name="new_name">
                                    <input type="submit" name="submit" value="submit">
                                </form>

                                <form class='for_change_price hided' action="change.php?price&id=<?= $id ?>" method="POST">
                                    <input class="inp_change_name" type="text" placeholder="<?= $prod_price ?>" name="new_price">
                                    <input type="submit" name="submit" value="submit">
                                </form>

                                <form class="for_change_sale hided" action="change.php?sale&id=<?= $id ?>" method="POST">
                                    <input class="inp_change_class" type="number" placeholder="<?= $prod_sale_val ?> %" min="0" max="99" name="new_sale">
                                    <input type="submit" name="submit" value="submit">
                                </form>

                                <form class="for_change_type hided" action="change.php?type&id=<?= $id ?>" method="POST">
                                    <input type="radio" name="new_type" checked value='fruit'> fruit
                                    <input type="radio" name="new_type" value='vegitable'> vegitable
                                    <input type="submit" name="submit" value="submit">
                                </form>

                                <form class="for_change_measure hided" action="change.php?measure&id=<?= $id ?>" method="POST">
                                    <input type="radio" name="new_measure" checked value='weight'> weight
                                    <input type="radio" name="new_measure" value='count'> conut
                                    <input type="submit" name="submit" value="submit">
                                </form>

                                <form class="for_change_image hided" action="change.php?image&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                                    <input class="inputs load" type="file" placeholder="file img" name="new_file">
                                    <input type="submit" name="submit" value="submit">
                                </form>

                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="login_container">
            <h1>Wellcome To Admin control center</h1>
            <h3>Write login and pasword to continue</h3>
            <form class="login_form" action="login.php" class="admin_login" method="POST">
                <input type="text" placeholder="Login" style="padding-left: 10px;" name="admin_uid">
                <input type="password" placeholder="Password" style="padding-left: 10px;" name="admin_pwd">
                <br>
                <input type="submit" value="Login" style="width: 150px;" name="submit">
            </form>
        </div>
    <?php
    }
    ?>









    <!-- prcnuma stex -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./script.js"></script>
    <script src="./adminscript.js"></script>
</body>

</html>