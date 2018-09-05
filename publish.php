<?php

use blog\db\Db;
require_once ("Db.php");

if($_POST) {
        $db = Db::getInstance();
        $date = new DateTime();
        $sql = "INSERT INTO post (title, content, published) VALUES('".$_POST["post-title"]."', '".$_POST["post-content"]."', now())";
        $db->sqlQuery($sql);
        header('Location: index.php');
        exit;
    }