<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/10/2018
 * Time: 3:21 PM
 */

namespace blog\comment;


use blog\db\Db;

class Comment
{
    public $id;
    public $content;
    public $created;
    public $user_id;
    public $post_id;

    public function __construct($id, $content, $created, $user_id, $post_id)
    {
        $this->id = $id;
        $this->content = $content;
        $this->created = $created;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
    }

    public function getUsernameById($user_id)
    {
        $db = Db::getInstance();
        $sql = "SELECT username FROM user JOIN comment ON comment.user_id = user.id WHERE user.id = ".$user_id." LIMIT 1";
        $result = $db->sqlSelectQuery($sql);
        if($result) {
            $row = $result->fetch();
            return $row['username'];
        } else {
            return null;
        }
    }

    public function __toString()
    {
        $user = $this->getUsernameById($this->user_id);
        return '<hr><div class="comment"><div class="comment-header"><div class="username">'.$user.'</div><div class="date">'.$this->created.'</div></div><div class="comment-body">'.$this->content.'</div></div><hr>';
    }

    public function printComment()
    {
        echo $this->__toString();
    }
}