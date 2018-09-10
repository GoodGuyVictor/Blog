<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:30 PM
 */

namespace blog\post;


class BlogPost
{

    public $id;
    public $title;
    public $content;
    public $published;
    public $image;

    public function __construct($id, $title, $content, $published, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->published = $published;
        $this->image = $image;
    }

    public function __toString()
    {
        if($this->image != null)
            return '<div class="post"><a href="review.php?post='.$this->id.'"><h2 class="post-title">'.$this->title.'</h2><div class="post-image"><img src="'.$this->image.'" alt="post image"></div><div class="post-content">'.$this->content.'</div></a></div>';
        else
            return '<div class="post"><a href="review.php?post='.$this->id.'"><h2 class="post-title">'.$this->title.'</h2><div class="post-content">'.$this->content.'</div></a></div>';
    }

    public function printPost()
    {
        return $this->__toString();
    }
}