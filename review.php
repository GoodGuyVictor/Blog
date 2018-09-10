<?php

session_start();
require_once ("Db.php");

$postTitle = '';
$postContent = '';
$postImage = '';
$postPublished = '';

if($_GET['post']) {
    $db = \blog\db\Db::getInstance();
    $sql = "SELECT title, content, published, image FROM post WHERE id =".$_GET['post']." LIMIT 1";
    $result = $db->sqlSelectQuery($sql);
    if($result) {
        $row = $result->fetch();
        $postTitle = $row['title'];
        $postContent = $row['content'];
        $postImage = $row['image'];
        $postPublished = $row['published'];
        $_SESSION['page-title'] = $postTitle;
    }
} else {
    echo 'Post not found: 404';
}

?>

<?php require 'header.php'; ?>

<div class="container">
    <h2><?php echo $postTitle; ?></h2>
    <?php if($postImage): ?>
        <img src="<?php echo $postImage; ?>" alt="image">
    <?php endif; ?>
    <div class="content">
        <?php echo $postContent; ?>
    </div>
</div>

<?php require 'footer.php'; ?>

