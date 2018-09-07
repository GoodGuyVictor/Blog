<?php

use blog\timeline\Timeline;

require_once ("Timeline.php");

session_start();
    $timeline = new Timeline();

?>

<?php require 'header.php'; ?>
<?php require 'slider.php'; ?>
<h1 class="text-center mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, obcaecati.</h1>
    <div class="timeline">
           <div class="container-fluid text-center mt-5">
               <?php echo $timeline; ?>
           </div>
    </div>

<?php require 'footer.php'; ?>