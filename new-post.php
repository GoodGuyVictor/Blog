<?php session_start(); ?>

<?php require 'header.php'; ?>

<div class="new-post-dashboard">
    <div class="container">
        <div class="error"><?php echo $_SESSION['error']; ?></div>
        <form action="publish.php" method="post" enctype="multipart/form-data">
            <fieldset class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Enter your title">
            </fieldset>
            <fieldset class="form-group">
                <label for="post-content" class="sr-only">Content</label>
                <textarea name="post-content" id="post-content" placeholder="Contents..." class="form-control"></textarea>
            </fieldset>
            <fieldset class="form-group">
                <label for="post-image">Upload image</label>
                <input type="file" class="form-control-file" name="post-image" id="post-image">
            </fieldset>
            <button type="submit" class="btn btn-success">Publish</button>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>