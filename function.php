<?php

    function get_user($dbh, $user_id)
    {
        $sql = 'SELECT * FROM `users` WHERE `id`=?';
        $data = [$user_id];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
      
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function create_feed($dbh, $feed, $user_id)
    {
        $sql = 'INSERT INTO `feeds` SET `feed`=?, `user_id`=?, `created`=NOW()';
        $data = array($feed, $user_id);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }

    function count_like($dbh, $feed_id)
    {
        $like_sql = "SELECT COUNT(*) AS `like_cnt` FROM `likes` WHERE `feed_id` = ?";

        $like_data = [$feed_id];

        $like_stmt = $dbh->prepare($like_sql);
        $like_stmt->execute($like_data);

        $like = $like_stmt->fetch(PDO::FETCH_ASSOC);

        return $like["like_cnt"];
    }