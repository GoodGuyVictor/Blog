<?php session_start();

    require_once ('Db.php');


    $postTitle = '';
    $postContent = '';

    $db = \blog\db\Db::getInstance();
    $sql = "SELECT title, content FROM post WHERE id =" . $_SESSION['post_id'];
    $result = $db->sqlSelectQuery($sql);
    if($result) {
        $row = $result->fetch();
        $postTitle = $row['title'];
        $postContent = $row['content'];
    }

?>

<?php require 'header.php'; ?>

    <div class="edit-post-dashboard">
        <div class="container">
            <div class="error"><?php echo $_SESSION['error']; ?></div>
            <form action="publish.php" method="post">
                <fieldset class="form-group">
                    <label for="post-title">Title</label>
                    <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Enter your title" value="<?php echo $postTitle; ?>">
                </fieldset>
                <fieldset class="form-group">
                    <label for="post-content" class="sr-only">Content</label>
                    <textarea name="post-content" id="post-content" placeholder="Contents..." class="form-control"><?php echo $postContent; ?></textarea>
                </fieldset>
                <button type="submit" class="btn btn-success">Publish</button>
                <input type="checkbox" name="update-post" checked class="sr-only">
            </form>
        </div>
    </div>

<?php require 'footer.php'; ?>