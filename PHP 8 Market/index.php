<?php
include('./connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" href="../fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="./head.css">
</head>

<body>
    <?php
    // include('header.php');
    // require('like.php');
    function debuger($arr)
    {
        echo '<pre>';
        print_r("$arr");
        echo '</pre>';
    }
    ?>
    <div class="nav_container">
        <div class="nav_box">
            <div class="logo">
                <img src="./logo.jpg" width="100%" height="100%" alt="">
            </div>

            <ul class="nav_items">
                <li class="some_nav_items"><a href="./index.php?all">All</a></li>
                <li class="some_nav_items"><a href="./index.php?fruit">Fruit</a></li>
                <li class="some_nav_items"><a href="./index.php?vegitable">vegitable</a></li>
                <li class="some_nav_items"><a href="./index.php?m50">sale -50%</a></li>
                <li class="some_nav_items"><a href="./index.php?p50">sale 50%+</a></li>
            </ul>
        </div>
    </div>

    <div class="mainContainer">

        <?php


        // if(header('location:index.php?fruit')){
        //     $sql = "SELECT * FROM `shop` WHERE `type` = 'fruit'";
        // }elseif(header('location:index.php?vegitable')) {
        //     $sql = "SELECT * FROM `shop` WHERE `type` = 'vegitable'";
        // }elseif(header('location:index.php?p50')){
        //     $sql = "SELECT * FROM `shop` WHERE `sale_val` < 50";
        // }else{
        //     $sql = "SELECT * FROM `shop`";
        // }

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
                // debuger($row['id']);
        ?>
                <div class="container">
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
                    <div class="main">

                        <div class="buyPrice"><span class='finish_price'>0.0</span> amd</div>

                        <div class="control_weight">
                            <div class="side minuses">
                                <span>
                                    <button class="btnM bbb kgm">
                                        -
                                    </button>
                                    <?php if ($row['measure'] == 'weight') {
                                        echo 'kg';
                                    } else {
                                        echo 'hat';
                                    } ?>
                                </span>
                                <?php
                                if ($row['measure'] == 'weight') {
                                ?>
                                    <span>
                                        <button class="btnM bbb grm">
                                            -
                                        </button> gr
                                    </span>
                                <?php
                                }
                                ?>
                            </div>
                            <input class="display" value="0.0">
                            <div class="side pluses">
                                <span>
                                    <button class="btnP bbb kgp">
                                        +
                                    </button>
                                    <?php if ($row['measure'] == 'weight') {
                                        echo 'kg';
                                    } else {
                                        echo 'hat';
                                    }
                                    ?>
                                </span>
                                <?php
                                if ($row['measure'] == 'weight') {
                                ?>
                                    <span>
                                        <button class="btnP bbb grp">
                                            +
                                        </button> gr
                                    </span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottomBtns">
                        <p><i class="fa-solid fa-cart-shopping"></i>
                            <i class="fa-solid fa-heart"></i>
                        </p>
                    </div>
                    <!-- <div class="gin">0.0 dram</div> -->
                </div>
        <?php
            }
        }
        ?>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>