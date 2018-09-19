<?php

session_start();
require_once("Db.php");

$postTitle = '';
$postContent = '';
$postImage = '';
$postPublished = '';
$authorId = 0;

if ($_GET['post']) {
    $db = \blog\db\Db::getInstance();
    $sql = "SELECT title, content, published, image, author_id FROM post WHERE id =" . $_GET['post'] . " LIMIT 1";
    $result = $db->sqlSelectQuery($sql);
    if ($result) {
        $row = $result->fetch();
        $postTitle = $row['title'];
        $postContent = $row['content'];
        $postImage = $row['image'];
        $postPublished = $row['published'];
        $authorId = $row['author_id'];
        $_SESSION['page-title'] = $postTitle;
        $_SESSION['post_id'] = $_GET['post'];
    }
} else {
    echo 'Post not found: 404';
}

?>

<?php require 'header.php'; ?>

<div class="container">
    <div class="post-wrapper">
        <div class="post-section">
            <h1 class="title"><?php echo $postTitle; ?></h1>
            <?php if($_SESSION['logged_in'] && $_SESSION['user_id'] == $authorId): ?>
                <div class="post-interface">
                    <a href="edit-post.php" class="post-interface__edit">Edit</a>
                    <a href="edit-post.php" class="post-interface__delete">Delete</a>
                </div>
            <?php endif; ?>
            
            <?php if ($postImage): ?>
                <img src="<?php echo $postImage; ?>" alt="image">
            <?php endif; ?>
            <div class="content">
                <?php echo $postContent; ?>
            </div>
        </div>
        <div class="comment-section">
            <?php require 'comments.php'; ?>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>

