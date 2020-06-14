<?php
include('include/header.php');


?>
<!--Header Heading Part -->
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Sub Catagory</li>
    <li class="breadcrumb-item active">Add Subcatagory</li>
</ol>
<!--Header Heading Part -->
<!---------------------------------------Main Part Starting ------->
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h2>Add Catagory</h2>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <form action="" method="post" id="subcatagory" class="form-horizontal form-stripe">
                        <div class="form-group">
                            <label for="catagory" class="col-sm-4 control-label">Catagory :
                            </label>

                            <div class="col-sm-6">
                                <select class="form-control catagory" name="catagory">
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
                            <label for="catagory" class="col-sm-4 control-label">Sub-Catagory :
                            </label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="subcatagory" name="subcatagory"
                                       placeholder="Catagory" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discatagory" class="col-sm-6 control-label">Sub-Catagory Description :
                                <span id="characterlength" style="color: red; font-size: 13px; display: none">
                                        character must be grather than 6
                                </span>
                            </label>

                            <div class="col-sm-6">
                                <textarea name="subcatagorydescription" class="form-control" id="discatagory" cols="30"
                                          rows="5" style="resize: none" required></textarea>
                            </div>
                        </div>

                        <img class="loading" src="assets/img/loading.gif" alt=""><br>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="Submit" value="sumit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------Main Part Starting ------->


<?php include('include/footer.php'); ?>

<script>
    $(document).ready(function () {


        $("#subcatagory").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: 'subcatagorybackground.php',
                type: 'post',
                data: $("#subcatagory").serializeArray(),
                dataType: 'json',
                beforeSend: function () {
                    $(".loading").show();
                },
                success: function (res) {
                    if (res == "success") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Sub-Catagory Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#characterlength").hide();
                        $(".catagory").css("border", "1px solid #ced4da");
                        document.getElementById("subcatagory").reset();


                    }else if (res == "faild") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sub-Catagory Added Failed',
                            text: 'Something went wrong!'
                        })
                        $("#characterlength").hide();
                        $(".catagory").css("border", "1px solid #ced4da");

                    }else {
                        console.log(res);
                        if (res.emptycatagory == "select") {
                            $(".catagory").css("border", "1px solid red");
                        } else {
                            $(".catagory").css("border", "1px solid #ced4da");
                        }
                        if (res.invalidsubcatagorydis == "invalid") {
                            $("#characterlength").show();
                        } else {
                            $("#characterlength").hide();
                        }
                    }
                    $(".loading").hide();
                }
            })
        })

    })
</script>