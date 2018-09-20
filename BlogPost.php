<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:30 PM
 */

namespace blog\post;


use blog\db\Db;

class BlogPost
{

    public $id;
    public $title;
    public $content;
    public $image;
    public $created_at;
    public $updated_at;
    public $author_id;

    public function __construct($id, $title = '', $content = '', $created_at = '', $image = '', $updated_at = '', $author_id = '')
    {
        if($title) {
            $this->id = $id;
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

    public function __toString()
    {
        if($this->image != null)
            return '<div class="post"><a href="review.php?post='.$this->id.'" class="post__link"><h2 class="post-title">'.$this->title.'</h2><div class="post-image"><img src="'.$this->image.'" alt="post image"></div><div class="post-content">'.$this->content.'</div></a></div>';
        else
            return '<div class="post"><a href="review.php?post='.$this->id.'" class="post__link"><h2 class="post-title">'.$this->title.'</h2><div class="post-content">'.$this->content.'</div></a></div>';
    }

    public function printPost()
    {
        return $this->__toString();
    }
}