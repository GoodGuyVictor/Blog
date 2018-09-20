<?php

use blog\comment\Comment;
use blog\db\Db;


require_once ('Db.php');
require_once ('Comment.php');

     function displayPostComments()
     {
         $db = Db::instance();
         $sql = "SELECT * FROM comment WHERE post_id = ".$_SESSION['post_id']." ORDER BY created DESC";
         $result = $db->sqlSelectQuery($sql);
         $comments = [];
         if($result) {
             while($row = $result->fetch()) {
                 $comments[] = new Comment($row['id'], $row['content'], $row['created'], $row['user_id'], $row['post_id']);
             }

             foreach ($comments as $comment) {
                 echo $comment;
             }
         } else {
             echo 'No comments yet';
         }
     }