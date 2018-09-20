<div class="create-comment">
    <?php if($_SESSION['user_id']): ?>
        <p><?php echo 'Logged in as <u>'. $_SESSION['username'].'</u>'; ?></p>
        <form action="publish-comment.php" method="post">
            <fieldset class="form-group">
                <label for="new-comment" class="sr-only">New comment</label>
                <textarea class="form-control" name="new-comment" id="new-comment" placeholder="Leave a comment here"></textarea>
            </fieldset>
            <button type="submit" class="btn btn-success">Comment</button>
        </form>
    <?php else: ?>
        <p><a href="login.php">Login</a> to leave a comment</p>
    <?php endif; ?>
</div>
<div class="comments">
    <h1>Comments</h1>
    <hr>
    <?php $post->displayPostComments(); ?>
</div>
