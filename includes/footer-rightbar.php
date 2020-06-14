<?php
  if (!isset($_SESSION)){
      session_start();
  }

?>
<!------------------- right bar ------------->
        <div class="col-md-4 clearfix">

            <!-- Search widget -->
            <div class="card mb-4">
                <h5 class="card-header" style="font-family: SutonnyOMJ">খুজুন :</h5>
                <div class="card-body">
                    <form name="search" action="search.php" method="post">
                        <div class="input-group">

                            <input type="text" style="font-family: SutonnyOMJ" ‍ name="searchtitle" class="form-control" placeholder="খুজ করুন ..."
                                   ><span style="color: red; margin: 3px"><?php
                            if (isset($_SESSION['emptyseche'])) {
                                echo $_SESSION['emptyseche'];
                            }
                            if (isset($_SESSION['emptyseche'])) {
                                unset($_SESSION['emptyseche']);
                            }

                            ?></span>
                            <span class="input-group-btn">
									<button class="btn btn-secondary ml-2" type="submit" name="go"> যান !</button>
								</span>
                    </form>
                </div>
            </div></div>

<!--        catagory widgets -->
        <div class="card mt-4">
            <h5 class="card-header" style="font-family: SutonnyOMJ">বিষয় সমূহ</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="mb-2" style="font-size: 17px;" type="i">
                            <?php
                                $query = "SELECT * FROM tblecatagory WHERE isActive = 1";
                                $results = mysqli_query($con,$query);
                                while ($row = mysqli_fetch_array($results)){ ?>
                                    <li>
                                        <a href="category.php?cid=<?=base64_encode($row['id'])?>"><?=$row['catagoryname']?></a>
                                    </li>

                             <?php   }
                            ?>


                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!--        post widgets -->
        <div class="card mt-4">
            <h5 class="card-header" style="font-family: SutonnyOMJ; ">সাম্প্রতিক পোষ্টসমূহ</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="mb-4"  style="font-size: 16px; font-family: SutonnyOMJ, 'Times New Roman'; list-style-type: square">
                            <?php
                            $postquery = "SELECT * FROM tblepost WHERE is_active = 1 ORDER BY id DESC LIMIT 8";
                            $results = mysqli_query($con,$postquery);
                            while ($postrow = mysqli_fetch_array($results)){ ?>
                                <li>
                                    <a href="post.php?pid=<?=base64_encode($postrow['id'])?>"><?= substr($postrow['post_tittle'],0,107) ?>...</a>
                                </li>
                       <?php     }
                            ?>



                        </ul>
                    </div>

                </div>
            </div>
        </div>


        <!--        facebook widgets -->
        <div class="card mt-4">
            <h5 class="card-header" style="font-family: SutonnyOMJ">ফেসবুকে আমি</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="https://web.facebook.com/Limon369949" target="_blank"><img src="img/limon.jpeg"  alt="" width="300" height="300"></a>
                    </div>
                </div>

            </div>
        </div>
         </div>
</div>



</body>
</html>