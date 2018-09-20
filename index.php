<?php

use blog\timeline\Timeline;
require_once ("Timeline.php");

session_start();
$_SESSION['page-title'] = 'My blog';
$timeline = new Timeline();

?>

<?php require 'header.php'; ?>

<div class="container">
    <?php echo $timeline; ?>
</div>

<?php require 'footer.php'; ?>