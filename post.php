<?php require_once('includes/header.php');
    include ('includes/News.php');
?>

        <div class="col-md-8">
            <?php
            if (!isset($_SESSION)){
                session_start();
            }

            if (isset($_GET['pid'])){
                $_SESSION['pid'] = base64_decode($_GET['pid']);
            }
            $pid = $_SESSION['pid'];
            $query = "SELECT tblepost.* FROM tblepost WHERE id = $pid";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id'];
            $postid = $_SESSION['id'];
            ?>
            <div class="card mb-5">
                <img class="card-img-top" src="admin/assets/img/<?=$row['postimage']?>" width="100%" height="400" ">
                <div class="card-body">
                    <h2 class="card-title" ><?=$row['post_tittle']?></h2>
                    <p class="lead" style="font-family: SutonnyOMJ; text-align: justify; font-size: 19px;">
                        <?= $row['post_details'] ?> </p>
                </div>
                <div class="card-footer text-muted" style="font-family: SutonnyOMJ;font-size: 16px;">
                    <?= datatimeformat($row['postdate']);// user defined function calling?>
                    <h2></h2>
                </div>
            </div>

            <?php
            $publiccomment = new News();
            $results = $publiccomment->con->sql->query("SELECT * FROM tblecmt WHERE post_id = $postid");

            $row = $results->fetch_all();
            foreach ($row as $index => $value) { ?>

                <div class="row " style="margin-top: 15px; margin-bottom: 15px">

                    <div class="col-md-10 bg-light p-2 offset-1">
                        <div class="comment-section" >
                            <div class="comment-header clearfix" style="margin-bottom: 10px">
                                <div class="user-image">
                                    <img alt="" src="img/cmt.jpeg" width="45" height="40"
                                         style="border-radius:50%; float: left; margin-right: 10px">
                                </div>
                                <div class="header-userinfo">
                                    <header>
                                        <div>
                                            <b style="color: #005cbf; font-family: 'Times New Roman'"><?=$value['2'] ?></b>
                                        </div>
                                        <div>
                                            <span style="font-family: 'Times New Roman'; font-size: 12px"><?php
                                                $data = new DateTime($value[5], new DateTimezone('Asia/Dhaka'));
                                                echo $data->format( ' jS F Y, g:iA'); ?></span>
                                        </div>
                                    </header>
                                    <!-- .ast-comment-meta -->
                                </div>
                            </div>
                            <div class="comment-body" style="margin-top: -10px">
                                <div class="public-comment">
                                    <p class="text-justify" style="padding: 5px; font-family: 'Times New Roman'; font-size: 16px; "><?= ucfirst($value['4']) ?></p>
                                </div>
                           <!-- --------------------- reply section---------------------------->
                                <?php

                                $commentid = $value['0'];
                                $replyresults = $publiccomment->con->sql->query("SELECT * FROM tblereply WHERE post_id = $postid AND comment_id = $commentid");

                                $replyrow = $replyresults->fetch_all();
                                foreach ($replyrow as $replyvalues){ ?>
                                    <div class="reply-section p-2" style="margin-left: 50px; background-color: #E9EDF0; margin-bottom: 15px">
                                        <div class="reply-header">
                                            <div class="replyuser-image"><img alt="" src="img/cmt.jpeg" width="45" height="40" style="border-radius:50%; float: left; margin-right: 10px">
                                            </div>
                                            <div class="header-userinfo">
                                                <header>
                                                    <div>
                                                        <b style="color: #005cbf; font-family: 'Times New Roman'"><?=$replyvalues[3] ?></b>
                                                    </div>
                                                    <div>
                                            <span style="font-family: 'Times New Roman'; font-size: 12px"><?php
                                                $dat = new DateTime($replyvalues[6], new DateTimezone('Asia/Dhaka'));
                                                echo $dat->format( ' jS F Y, g:iA'); ?></span>
                                                    </div>
                                                </header>
                                                <!-- .ast-comment-meta -->
                                            </div>

                                        </div>
                                        <div class="reply-body">
                                            <div class="reply-comment">
                                                <p class="text-justify" style="padding: 5px; font-family: 'Times New Roman'; font-size: 16px; "><?=$replyvalues[5] ?></p>
                                            </div>
                                        </div>
                                    </div>
                         <?php       }
                                ?>

                                <div class="reply-form text-center" id="formpost<?=$value[0]?>" style="display: none;">
                                    <h5 class="section-subtitle">Reply to Comment </h5>
                                    <div class="col-md-10 offset-3 panel">
                                        <div class="panel-content">
                                                    <form id="replyform<?=$value[0]?>">
                                                        <div class="form-group" >
                                                            <textarea class="col-md-7 form-control" id="replysms<?=$value[0]?>" placeholder="Type Here.." rows="2"
                                                                              cols="20"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                   class="col-md-7 form-control mr-3" id="name"
                                                                   name="Name" placeholder="Name">

                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="col-md-7 form-control"
                                                                   id="email" name="Email" placeholder="Email">
                                                            <input type="hidden" name="postid" value="<?=$postid?>">
                                                            <input type="hidden" name="commentid" value="<?=$value[0]?>">

                                                        </div>

                                                        <div class="form-group row justify-content-center">
                                                            <button id="<?=$value[0]?>" class="btn btn-primary replysubmit">
                                                                reply..
                                                            </button>
                                                        </div>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-footer float-right" style="margin-right: 10px">
                                <span class="ast-reply-link"><a class="comment-reply" id="<?=$value[0]?>" href="">Reply</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!--            comment form-->
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
                                            <input type="hidden" name="postid" value="<?=$_SESSION['id']?>">
                                            <input type="text" class="col-md-4 form-control mr-3" id="name" name="Name"
                                                   placeholder="Name">
                                            <input type="text" class="col-md-4 form-control" id="email" name="Email"
                                                   placeholder="Email">
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <button type="submit"  class="btn btn-primary">Post Comment >></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php require_once ('includes/footer-rightbar.php')?>

<script>
    $(document).ready(function () {
        $("#fromcomment").submit(function (event) {
            event.preventDefault();

            var values = $("#fromcomment").serializeArray();
            var fromData = new FormData();
            var massage = $(".sms").val();

            $(values).each(function (index, value) {
                fromData.append(value.name, value.value);
            })
            fromData.append("massage", massage);


            $.ajax({
                url: 'comment-back.php',
                type: 'POST',
                data: fromData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    window.open("post.php","_self");
                }
            });



        });

        $(".comment-reply").click(function (event) {
            event.preventDefault();

            var pid = $(this).attr('id');

            $("#formpost"+pid).toggle("fade");

            console.log(pid);

        });

        $(".replysubmit").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('id');


            var fromdat = new FormData();
            var text = $("#replysms"+id).val();
             var values =  $("#replyform"+id).serializeArray();
             console.log(text);
             console.log(values);


            $(values).each(function (index,value) {

                fromdat.append(value.name,value.value);

            })
            fromdat.append("text",text);

            $.ajax({
                url:'reply-back.php',
                type: 'POST',
                data: fromdat,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (res) {
                    window.open("post.php","_self");
                }

            })


        })
    });
</script>
