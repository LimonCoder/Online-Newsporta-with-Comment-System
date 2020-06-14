<!--------------------------------- comments Section------------------------------------------>
<?php

require_once ('includes/News.php');

$publiccomment = new News();
$results = $publiccomment->con->sql->query("SELECT * FROM tblecmt ");

$row = $results->fetch_all();

foreach ($row as $index => $value){ ?>


    <div class="col-md-8">
<!--        comment header-->
        <div class="comment-header clearfix" style="margin-bottom: 10px">
            <div class="user-image">
                <img alt="" src="img/cmt.jpeg" width="45" height="40" style="border-radius:50%; float: left; margin-right: 10px">
            </div>
            <div class="header-userimage">
                <header>
                    <div>
                        <b style="color: #005cbf; font-family: 'Times New Roman'"><?= $value[2] ?></b>
                    </div>
                    <div>
                        <span style="font-family: 'Times New Roman'"><?= "17 March 2020" ?></span>
                    </div>
                </header>
                <!-- .ast-comment-meta -->
            </div>
        </div>
<!--        comment body-->
        <div class="comment-body">
            <section class="comment-content">
                <div class="public-comment">
                    <p class="text-justify" style="margin-left: 50px;padding: 5px"><?= $value[4] ?></p>
                </div>
                <div class=reply-comment" style="margin-left: 50px">
                    <div class="reply-header clearfix" style="margin-bottom: 10px">
                        <div><img alt="" src="img/cmt.jpeg" width="45" height="40" style="border-radius:50%; float: left; margin-right: 10px">
                        </div>
                        <div class="reply-main">
                            <header>
                                <div><b style="color: #005cbf; font-family: 'Times New Roman'">Nurul
                                        Amin limon</b></div>
                                <div><span style="font-family: 'Times New Roman'">May 7, 2020 at 3:36 </span>
                                </div>
                            </header> <!-- .ast-comment-meta -->
                        </div>
                    </div>
                    <!-- Remove 1px Space
                -->
                    <div class="reply-body">
                        <section>
                            <p class="text-justify">khub shundor likhesen vai… shamne React niye
                                in depth aro jante chai….
                            </p>

                        </section> <!-- .ast-comment-content -->


                    </div>

                    <!------------reply form-->
                    <div class="row " id="replyform" style="display: none">
                        <div class="col-md-6 offset-2">
                            <h5 class="section-subtitle">Reply to Comment </h5>
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-group">
                                                                    <textarea class="col-md-7 form-control" id="sms"
                                                                              placeholder="Type Here.." rows="2"
                                                                              cols="20"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                           class="col-md-7 form-control mr-3" id="name"
                                                           name="Name" placeholder="Name">

                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="col-md-7 form-control"
                                                           id="email" name="Email" placeholder="Email">

                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        reply..
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="ast-comment-edit-reply-wrap float-right">
                        <span class="ast-reply-link"><a class="comment-reply" href="">Reply</a></span>

                    </div>
            </section> <!-- .ast-comment-content -->
        </div>

    </div>


<?php }
?>


<!---------------------------------add to comment-------------------------------->
<div class="row">
    <div class="col-md-8 offset-2" style="margin-top: 15px;">
        <h4 class="section-subtitle">Leave a Comment </h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form id="fromcomment">
                            <h5 class="mb-md" style="font-family: 'Times New Roman';font-size: 12px">our email address
                                will not be published. Required fields are marked </h5>
                            <div class="form-group">
                                <textarea class="form-control sms" placeholder="Type Here.." rows="5"
                                          cols="6"></textarea>
                            </div>
                            <div class="form-group row justify-content-center">
                                <input type="text" class="col-md-4 form-control mr-3" id="name" name="Name"
                                       placeholder="Name">
                                <input type="text" class="col-md-4 form-control" id="email" name="Email"
                                       placeholder="Email">
                            </div>
                            <div class="form-group row justify-content-center">
                                <button type="submit" id="comment" class="btn btn-primary">Post Comment >></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>