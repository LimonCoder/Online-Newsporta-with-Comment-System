<?php

include('includes/News.php');

if (!isset($_SESSION)){
    session_start();
}

if (isset($_POST['go'])) {

    if (!empty($_POST['searchtitle'])) {

        $news = new News();

        $searchresults = $news->newsSearch($_POST['searchtitle']);


        require_once('includes/header.php') ?>
        <div class="col-md-8">
            <?php
            if (count($searchresults) > 0) {
                foreach ($searchresults as $value) { ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="admin/assets/img/<?= $value[7] ?>" width="100%" height="400" ">
                        <div class="card-body">
                            <h2 class="card-title"><?= $value[3] ?></h2>
                            <p class="lead"><?= substr($value[6], 1, 565) ?>...</p>

                            <p class="lead" style="font-family: SutonnyOMJ; font-size: 17px;"><b>বিষয় : </b>
                                <a href="category.php?cid=<?= base64_encode($value[0]) ?>"><?= $value[1] ?></a></p>

                            <a href="newsdetails.php?nid=<?= base64_encode($value[2]) ?>" class="btn btn-primary" ‍
                               style="font-family: SutonnyOMJ">বিস্তারিত পড়ুন &rarr;</a>
                        </div>
                        <div class="card-footer text-muted" style="font-family: SutonnyOMJ;font-size: 16px;">
                            <?= datatimeformat($value[8]);// user defined function calling  ?>
                            <h2></h2>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <h2 style="color: red">NO RECORD FOUND</h2>
            <?php }

            ?>


            <?php


            ?>

        </div>

        <?php
        require_once('includes/footer-rightbar.php');
    } else {
        $_SESSION['emptyseche'] = "*";
        echo '<script>window.open("index.php","_self")</script>';
    }
}

?>








