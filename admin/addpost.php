<?php
include('include/header.php');

if (isset($_POST['Submit'])){

}


?>
<!--Header Heading Part -->
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Posts</li>
    <li class="breadcrumb-item active">Add Post</li>
</ol>
<!--Header Heading Part -->
<!---------------------------------------Main Part Starting ------->
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h2>Add Post</h2>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <form action="" method="post" id="posts" class="form-horizontal form-stripe" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="post" class="col-sm-4 control-label">Post Tittle :
                            </label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="posttittle" id="post" placeholder="Enter Post Tittle here :">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="catagory" class="col-sm-4 control-label">Catagory :
                            </label>

                            <div class="col-sm-8">
                                <select class="form-control catagory" id="catagory" onchange="subcataory(this.value)" name="catagory">
                                    <option value="select">Select Catagory</option>
                                    <?php
                                    $query = "SELECT * FROM tblecatagory WHERE isActive = 1";
                                    $results = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($results)) { ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['catagoryname']; ?></option>

                                    <?php }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subcat" class="col-sm-4 control-label">Sub-Catagory :
                            </label>

                            <div class="col-sm-8">
                                <select  id="subcat" class="form-control" name="subcatagory">
                                    <option value="select" selected>Select Sub-Catagory</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discatagory" class="col-sm-3 control-label">Post Description :
                                <span id="postdetailsId" style="color: red; display: none;">Please fillup this field</span>
                            </label>

                            <div class="col-sm-8">
                                <textarea id="summernote"  name="postdetails"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discatagory" class="col-sm-3 control-label">Feature Image :
                                <span id="invildimage" style="color: red; font-family: 'Times New Roman'; display: none">Invaild Image</span>
                            </label>

                            <div class="col-sm-7">
                                    <input type="file" id="postimage" class="form-control" required>

                            </div>
                        </div>

                        <img class="loading" src="assets/img/loading.gif" alt=""><br>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" name="Submit" value="sumit" id="btnclick" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------Main Part Starting ------->



<?php include('include/footer.php');?>

<script>

    $(document).ready(function () {
        $("#posts").submit(function (e) {
            e.preventDefault();
            // image fill access to js
            var files = $('#postimage')[0].files[0];
            // form all data convert to array object..
            var otherdata = $("#posts").serializeArray();

            const formData = new FormData();


            formData.append("postimage",files);

            $(otherdata).each(function (key, value) {
                formData.append(value.name,value.value);
            })



            $.ajax({
                url: 'addpostback.php',
                type: 'post',
                processData: false, // If you want to DOM and no process data...
                contentType: false, // ai line ta kno add kora hoicee
                data: formData,
                dataType:'json', // retrun back json format datatype
                success:function (res) {
                    // database successfully sweetAlert
                    if (res == 1){
                        swal({
                            title: "Success !",
                            text: "Post save successfully",
                            icon: "success",
                            buttons: false,
                            timer: 1700
                        });
                        setTimeout(function () {
                            // form reset
                            document.getElementById("posts").reset();
                            // sumeernote reset
                            $('#summernote').summernote('reset');
                        },1500);

                    }else{
                        
                    }
                    // form data values empty Alert System
                    if (res.post == "*"){
                        $("#post").css("border-color","red");
                    }else{
                        $("#post").css("border-color","#A9A9A9");
                    }
                    if (res.catagory == "*"){
                        $("#catagory").css("border-color","red");
                    }else{
                        $("#catagory").css("border-color","#A9A9A9");
                    }
                    if (res.subcatagory == "*"){
                        $("#subcat").css("border-color","red");
                    }else{
                        $("#subcat").css("border-color","#A9A9A9");
                    }
                    if (res.postdetails == "*"){
                        $("#postdetailsId").css("display","inline");
                    }else{
                        $("#postdetailsId").css("display","none");
                    }
                    if (res.imageinvaliedex == "invalid Extension"){
                        $("#postimage").css("border-color","red");
                        $("#invildimage").css("display","inline");
                    }else{
                        $("#postimage").css("border-color","#A9A9A9");
                        $("#invildimage").css("display","none");
                    }
                    // form data values empty Alert System //




                }
            })
            

        })
    })



    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: 'Text write here',
            tabsize: 2,
            height: 300,
            minHeight:null,
            maxHeight:null,
        });


    })


   function subcataory(value){
      var catagoryid = value;


      $(document).ready(function () {




            $.ajax({
                url:'subcatagorylistback.php',
                type:'post',
                data:{
                  id:catagoryid
                },
                dataType:'html',
                success:function (res) {
                    $("#subcat").html(res);
                }
            })


      })
   }


</script>
