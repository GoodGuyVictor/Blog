<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 9/5/2018
 * Time: 3:42 PM
 */

namespace blog\timeline;


use blog\db\Db;
use blog\post\BlogPost;

require_once ("Db.php");
require_once("BlogPost.php");

class Timeline
{
    private $db;
    private $posts = [];

    public function __construct()
    {
        $this->db = Db::instance();
        $sql = "SELECT * FROM post ORDER BY created_at DESC";
        $result = $this->db->sqlSelectQuery($sql);
        if($result !== null) {
            while ($row = $result->fetch()) {
                $this->posts[] = new BlogPost($row["id"], $row["title"], $row["content"], $row["created_at"], $row["image"]);
            }
        }
    }

    public function __toString()
    {
        $output = '<div class="timeline">';

        if(!empty($this->posts)){
            foreach($this->posts as $post) {
                $output .= $post->displayInTimeline();
            }
            $output .= '</div>';
        } else {
            $output .= "No posts yet</div>";
        }

        return $output;
    }
}