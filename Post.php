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

    public function __construct($id, $title, $content, $published)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->published = $published;
    }
}