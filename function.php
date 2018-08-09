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

    function is_liked($dbh, $user_id, $feed_id)
    {
        $like_flg_sql = "SELECT `id` FROM `likes` WHERE `user_id` = ? AND `feed_id` = ?";

        $like_flg_data = [$user_id, $feed_id];

        $like_flg_stmt = $dbh->prepare($like_flg_sql);
        $like_flg_stmt->execute($like_flg_data);

        $is_liked = $like_flg_stmt->fetch(PDO::FETCH_ASSOC);

        return $is_liked ? true : false;
    }

    function count_feed($dbh, $feed_id)
    {
        $feed_sql = "SELECT COUNT(*) AS `feed_cnt` FROM `feeds` WHERE `user_id` = ?";

        $feed_data = [$feed_id];

        $feed_stmt = $dbh->prepare($feed_sql);
        $feed_stmt->execute($feed_data);

        $feed = $feed_stmt->fetch(PDO::FETCH_ASSOC);

        return $feed["feed_cnt"];
    }

    function is_followed($dbh, $user_id, $follower_id)
    {
        $sql = "SELECT `id` FROM `followers` WHERE `user_id` = ? AND `follower_id` = ?";

        $data = [$user_id, $follower_id];

        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $is_followed = $stmt->fetch(PDO::FETCH_ASSOC);

        return $is_followed ? true : false;
    }

    function get_follower($dbh, $user_id)
    {
        $sql = 'SELECT fw.*, u.name, u.img_name, u.created FROM followers AS fw LEFT JOIN users AS u ON fw.user_id = u.id WHERE fw.user_id = ?';

        $data = array($user_id);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $follower = [];
        while (true) {
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($record == false) break;

            $follower[] = $record;
        }

        return $follower;
    }