<?php
    session_start();

    require("dbconnect.php");

    $follower_id = $_GET["follower_id"];

    $following_id = $_SESSION["id"];

    if (isset($_GET["unfollow"])) {
        $sql ="DELETE FROM `followers` WHERE `following_id` = ?  and `follower_id` = ?";
    } else {
        $sql = "INSERT INTO `followers` (`following_id`, `follower_id`) VALUES (?, ?);";
    }

    $data = array($following_id, $follower_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    header("Location: profile.php?user_id=".$follower_id);
    exit();