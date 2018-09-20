<?php

use blog\db\Db;
require_once ('Db.php');
session_start();

if($_POST['new-comment']) {
        $db = Db::instance();
        $userId = $_SESSION['user_id'];
        $postId = $_SESSION['post_id'];
        $sql = "INSERT INTO comment (content, user_id, post_id) VALUES ('".$_POST['new-comment']."', '".$userId."', '".$postId."')";
        $db->sqlQuery($sql);
        header('Location: review.php?post='.$_SESSION['post_id']);
        exit;
    }