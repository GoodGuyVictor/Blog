<?php
    session_start();

    require_once ('Db.php');
    $db = \blog\db\Db::getInstance();

    //deleting comments first
    $sql = "DELETE FROM comment WHERE post_id =" . $_SESSION['post_id'];
    $db->sqlQuery($sql);

    //deleting post itself
    $sql = "DELETE FROM post WHERE id =" . $_SESSION['post_id'];
    $db->sqlQuery($sql);

    header('Location: index.php');
    exit;