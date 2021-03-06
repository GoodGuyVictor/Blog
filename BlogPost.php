<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:30 PM
 */

namespace blog\post;
//comment

use blog\comment\Comment;
use blog\db\Db;
require_once 'Db.php';
require_once 'Comment.php';

class BlogPost
{
//comments
    public $id;
    public $title;
    public $content;
    public $image = null;
    public $created_at;
    public $updated_at;
    public $author_id;

    public function __construct($id, $title = '', $content = '', $created_at = '', $image = '', $updated_at = '', $author_id = '')
    {
        session_start();
        $this->id = $id;
        if($title) {
            $this->title = $title;
            $this->content = $content;
            $this->created_at = $created_at;
            $this->image = $image;
        } else {
            $db = Db::instance();
            $sql = "SELECT title, content, created_at, image, author_id FROM post WHERE id =" . $id . " LIMIT 1";
            $result = $db->sqlSelectQuery($sql);
            $row = $result->fetch();
            $this->title = $row['title'];
            $this->content = $row['content'];
            $this->image = $row['image'];
            $this->created_at = $row['created_at'];
            $this->author_id = $row['author_id'];
            $_SESSION['page-title'] = $this->title;
            $_SESSION['post_id'] = $this->id;
        }
    }

    public function displayInTimeline()
    {
        if($this->image != null)
            return '<div class="post"><a href="review.php?post='.$this->id.'" class="post__link"><h2 class="post-title">'.$this->title.'</h2><div class="post-image"><img src="'.$this->image.'" alt="post image"></div><div class="post-content">'.$this->content.'</div></a></div>';
        else
            return '<div class="post"><a href="review.php?post='.$this->id.'" class="post__link"><h2 class="post-title">'.$this->title.'</h2><div class="post-content">'.$this->content.'</div></a></div>';
    }

    public function __toString()
    {
        return $this->printPost();
    }

    private function printTitle()
    {
        $output = '<h1 class="title">'.$this->title.'</h1>';
        if($_SESSION['logged_in'] && $_SESSION['user_id'] == $this->author_id)
            $output .= $this->printPostInterface();

        return $output;
    }

    private function printPostInterface()
    {
        return '<div class="post-interface">
                    <a href="edit-post.php" class="post-interface__edit">Edit</a>
                    <a href="delete-post.php" class="post-interface__delete">Delete</a>
                </div>';
    }

    private function printImage()
    {
        return '<img src="'.$this->image.'" alt="...">';
    }

    private function printContent()
    {
        return '<div class="content">'.$this->content.'</div>';
    }

    private function printPost()
    {
        $output = $this->printTitle();
        if($this->image)
            $output .= $this->printImage();
        $output .= $this->printContent();

        return $output;
    }

    public function displayPostComments()
    {
        $db = Db::instance();
        $sql = "SELECT * FROM comment WHERE post_id = ".$this->id." ORDER BY created DESC";
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
}
