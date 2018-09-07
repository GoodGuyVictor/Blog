<?php session_start(); ?>

<?php require 'header.php'; ?>

<div class="new-post-dashboard">
    <div class="container">
        <form action="publish.php" method="post">
            <fieldset class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Enter your title">
            </fieldset>
            <fieldset class="form-group">
                <label for="post-content" class="sr-only">Content</label>
                <textarea name="post-content" id="post-content" placeholder="Contents..." class="form-control"></textarea>
            </fieldset>
            <button type="submit" class="btn btn-success">Publish</button>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>