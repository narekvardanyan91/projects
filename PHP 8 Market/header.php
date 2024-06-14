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


<?php
$current_page = basename(($_SERVER['PHP_SELF']));
// echo $current_page;
if ($current_page == 'index.php') {
    $link = './index.php';
} elseif ($current_page == 'admin.php') {
    $link = './admincontrol.php';
} else {
    // by default
    $link = './index.php';
}
?>

<div class="nav_container">
    <div class="nav_box">
        <div class="logo">
            <img src="./logo.jpg" width="100%" height="100%" alt="">
        </div>
        <ul class="nav_items">
            <li class="some_nav_items"><a href="<?= $link; ?>?all">All</a></li>
            <li class="some_nav_items"><a href="<?= $link; ?>?fruit">Fruit</a></li>
            <li class="some_nav_items"><a href="<?= $link; ?>?vegitable">Vegitable</a></li>
            <li class="some_nav_items"><a href="<?= $link; ?>?m50">Sale -50%</a></li>
            <li class="some_nav_items"><a href="<?= $link; ?>?p50">Sale 50%+</a></li>
        </ul>
    </div>
</div>
