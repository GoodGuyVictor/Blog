<?php

use blog\timeline\Timeline;

require_once ("Timeline.php");

session_start();
    $timeline = new Timeline();

?>

<?php require 'header.php'; ?>
<?php require 'slider.php'; ?>
<h1 class="text-center mt-5 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, obcaecati.</h1>

<div class="container-fluid text-center" style="padding: 0px 40px 0px 40px" id="article">
    <div class="row">
        <div class="col-md-8" style="padding: 0px 20px 0px 0px">
               <?php echo $timeline; ?>
        </div>
        <div class="col-md-4 post2" id="aside1">
           <h2 style="padding:20px 10px 10px 10px">Лучшие посты за сегодня</h2><hr>
            <a href="">- Сирийские послания Путина и ливанская инициатива Макрона</a><hr>
            <a href="">- Никакой войны с КНДР не будет</a><hr>
            <a href="">- Запретите США участвовать в Олимпийских играх</a><hr>
            <a href="">- Чего ждать в случае провала переговоров Трампа с Северной Кореей</a><hr>
        </div>
    </div>
</div>
   


<?php require 'footer.php'; ?>