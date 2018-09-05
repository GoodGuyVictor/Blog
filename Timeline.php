<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:42 PM
 */

namespace blog\timeline;


use blog\db\Db;
use blog\post\Post;

require_once ("Db.php");
require_once ("Post.php");

class Timeline
{
    private $db;
    private $posts = [];

    public function __construct()
    {
        $this->db = Db::getInstance();
        $sql = "SELECT * FROM post ORDER BY published DESC";
        $result = $this->db->sqlSelectQuery($sql);
        if($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $this->posts[] = new Post($row["id"], $row["title"], $row["content"], $row["published"]);
            }
        }
    }

    public function __toString()
    {
        $output = '';

        if(!empty($this->posts)){
            foreach($this->posts as $post) {
                $output .= '<div class="post"><h2>'.$post->title.'</h2><div class="post-content">'.$post->content.'</div></div>';
            }
        } else {
            $output = "No posts yet";
        }

        return $output;
    }
}