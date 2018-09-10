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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>