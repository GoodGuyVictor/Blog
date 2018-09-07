<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:30 PM
 */

namespace blog\post;


class Post
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
}