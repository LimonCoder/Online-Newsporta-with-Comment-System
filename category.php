<?php require_once('includes/header.php');
if(!isset($_SESSION))
{
    session_start();
}
?>
<div class="col-md-8">
    <?php
    $slno = 1;
    $length = 4;

    if (isset($_GET['cid'])){
        $_SESSION['cataid'] = base64_decode($_GET['cid']);
    }


     $cid =  $_SESSION['cataid'];



    if (isset($_GET['id'])){
        $id = $_GET['id'];


        $start =  ($length * $id) - $length;

        $query = "SELECT tblecatagory.id as catid,tblecatagory.catagoryname, tblepost.* 
                            FROM tblepost
                            JOIN tblecatagory ON tblepost.catagory_id = tblecatagory.id 
                            WHERE is_active = 1 AND tblepost.catagory_id = $cid  ORDER BY tblepost.id DESC  LIMIT $start, $length";

    }else{
        $id = 1;
        $query = "SELECT tblecatagory.id as catid,tblecatagory.catagoryname, tblepost.* 
                            FROM tblepost
                            JOIN tblecatagory ON tblepost.catagory_id = tblecatagory.id 
                            WHERE is_active = 1 AND tblepost.catagory_id = $cid  ORDER BY tblepost.id DESC  LIMIT 0, $length";
    }
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)){ ?>
        <div class="card mb-4">
            <img class="card-img-top" src="admin/assets/img/<?=$row['postimage']?>" width="100%" height="400" ">

            <div class="card-body">
                <h2 class="card-title" ><?=$row['post_tittle']?></h2>
                <p  class="lead" ><?=substr($row['post_details'],1,565)?>...</p>

                <p class="lead" style="font-family: SutonnyOMJ; font-size: 17px;"><b>বিষয় : </b>
                    <a href="category.php?catid=1"><?=$row['catagoryname']?></a></p>

                <a href="newsdetails.php?nid=<?=base64_encode($row['id'])?>" class="btn btn-primary" ‍ style="font-family: SutonnyOMJ">বিস্তারিত পড়ুন &rarr;</a>
            </div>
            <div class="card-footer text-muted" style="font-family: SutonnyOMJ;font-size: 16px;">
                <?= datatimeformat($row['postdate']);// user defined function calling?>
            </div>
        </div>
    <?php   }
    ?>
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $res = mysqli_query($con,"SELECT * FROM tblepost WHERE catagory_id = $cid");
                $count = mysqli_num_rows($res);
                $total = ceil($count / $length);

                if ($id> 1){ ?>
                    <li class="page-item"><a class="page-link " href="category.php?id=<?= $id-1?>" >পূর্ববর্তী</a></li>
                <?php    }else{ ?>
                    <li class="page-item disabled"><a class="page-link " href="" >পূর্ববর্তী</a></li>
                <?php    }
                ?>

                <?php

                for ($i = 1; $i<=$total; $i++){ ?>
                    <li class="page-item <?=($id == $i)?'disabled':''?>"><a class="page-link" href="category.php?id=<?= $i?>"><?= $i?></a></li>
                <?php    }
                if ($id != $total){ ?>
                    <li class="page-item"><a class="page-link " href="category.php?id=<?= $id+1?>" >পরবর্তী</a></li>
                <?php    }else{ ?>
                    <li class="page-item disabled"><a class="page-link " href="" >পরবর্তী</a></li>
                <?php    }
                ?>
            </ul>
        </nav>
    </div>
</div>
<?php require_once ('includes/footer-rightbar.php')?>
