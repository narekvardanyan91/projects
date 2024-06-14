<?php
include('./connection.php');

$firstErr = $lastErr = $uidErr = $emailErr = $passErr = $passConfErr = $genErr = "";
$first = $last = $uid = $email = $gen = $pass = $passConf =  "";

if (empty($_POST["first"])) {
    $firstErr = "Name is required";
} elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['first'])) {
    $firstErr = "Only letters allowed";
} else {
    $first = $_POST["first"];
}

if (empty($_POST["last"])) {
    $lastErr = "the last Name is required";
} elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['last'])) {
    $lastErr = "Only letters allowed";
} else {
    $last = $_POST['last'];
}

if (empty($_POST['email'])) {
    $emailErr = "Write your email please";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
} else {
    $searchEmail = "SELECT `email` FROM `users_db` WHERE `email` = '" . $_POST['email'] . "'";
    $result = mysqli_query($con, $searchEmail);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $emailErr =  'Email allready exists';
        }
    } else{
        $email = $_POST['email'];
        echo $email;
    }
    $email = $_POST['email'];
}

if (empty($_POST['uid'])) {
    $uidErr = "User name is required";
} elseif (!empty($_POST['uid'])) {
    $searchUid = "SELECT `uid` FROM `users_db` WHERE `uid` = '" . $_POST['uid'] . "'";
    $result = mysqli_query($con, $searchUid);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $uidErr =  'uid allready exists';
        }
    } else {
        $uid = $_POST['uid'];
        echo $uid;
    }
}

if (empty($_POST['pass'])) {
    $passErr = "password is required";
} else {
    if (empty($_POST['passConf'])) {
        $passConfErr = "confirm is required";
    } elseif ($_POST['passConf'] != $_POST['pass']) {
        $passConfErr = "wrong confirm";
    } elseif ($_POST['passConf'] == $_POST['pass']) {
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST['pass'])) {
            $passErr = 'Minimum 8 characters, at least one uppercase letter, one lowercase letter and one number';
        } else {

            $pass = $_POST['pass'];
            $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
            $passConf = $pass;
        }
    }
}

if (empty($_POST["gen"])) {
    $genErr = "Gender is required";
} elseif (!empty($_POST["gen"])) {
    $gen = $_POST["gen"];
}

if (!empty($first) && !empty($last) && !empty($email) && !empty($uid) && !empty($pass) && !empty($passConf) && !empty($gen)) {
    $sql = "INSERT INTO `users_db`(`first`, `last`, `uid`, `email`, `pass`, `gen`) 
                    VALUES ('$first','$last','$uid','$email','$pass','$gen')";
    mysqli_query($con, $sql);
    header("Location: index.php?signup=success");
} else {
    header("Location: index.php?firstErr=$firstErr&lastErr=$lastErr&emailErr=$emailErr&uidErr=$uidErr&passErr=$passErr&passConfErr=$passConfErr&genErr=$genErr");
}


//  first, last, email, uid, pass, gender