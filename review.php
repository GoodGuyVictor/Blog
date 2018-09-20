<?php

use blog\post\BlogPost;
require_once 'BlogPost.php';

session_start();

if ($_GET['post']) {
    $post = new BlogPost($_GET['post']);
} else {
    echo 'Post not found: 404';
    echo '<a href="index.php">Back to index page</a>';
}
?>

<?php require 'header.php'; ?>
<a href="index.php" class="go-back-arrow"><i class="fas fa-arrow-circle-left"></i></a>

<div class="container">
    <div class="post-wrapper">
        <div class="post-section">
            <?php echo $post; ?>
        </div>
        <div class="comment-section">
            <?php require 'comments.php'; ?>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>

