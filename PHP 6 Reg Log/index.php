<?php
include('./connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main_page</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <div class="registration">
            <form action="reg.php" method="POST">
                <h1>REGISTRATION</h1>
                <?php
                if (@$_GET['signup'] == 'success') {
                    echo '<span>';
                    echo "success";
                    echo '</span>';
                }
                ?>
                <input type="text" name="first" placeholder="firstname"><span>* <?php echo @$_GET["firstErr"]; ?></span>
                <input type="text" name="last" placeholder="lastname"><span>* <?php echo @$_GET['lastErr']; ?></span>
                <input type="text" name="uid" placeholder="UserName"><span>* <?php echo @$_GET['uidErr']; ?></span>
                <input type="email" name="email" placeholder="email"><span>* <?php echo @$_GET['emailErr']; ?></span>
                <input type="password" name="pass" placeholder="password"><span>* <?php echo @$_GET['passErr']; ?></span>
                <input type="password" name="passConf" placeholder="password"><span>* <?php echo @$_GET['passConfErr']; ?></span>
                <div class="gender">
                    <span>* <?php @$_GET['genErr']; ?></span>
                    <input type="radio" class="gen" value="male" name="gen">Male
                    <input type="radio" class="gen" value="female" name="gen">Female
                    <input type="radio" class="gen" value="animale" name="gen">Animale
                </div>
                <input type="submit" class="btn sub" name="register" value="Register">
                <input type="reset" class="btn" value="cancel">
            </form>
        </div>
        <div class="login">
            <form action="loginprocess.php" method="POST">
                <h1>LOGIN</h1>
                <span> <?php echo @$_GET['loginErr']; ?></span>
                <input type="text" name="login" placeholder="Email or Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="submit" class="btn sub" name="log_btn" value="Log-in">
                <input type="reset" class="btn" value="cancel">
            </form>
        </div>
    </div>
</body>

</html>
<!-- Narek1991.* -->