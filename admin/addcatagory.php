<?php
include('include/header.php');

if (isset($_POST['Submit'])){


    $inputerrors = array();

    if (!empty($_POST['catagory'])){
        $catagoryname = $_POST['catagory'];
    }else{
        $inputerrors['catagoryname'] = "fill in the fields";
    }

    if (!empty($_POST['catagorydescription'])){

        if(strlen($_POST['catagorydescription'])>=6){
            $catagorydesname = $_POST['catagorydescription'];
        }else{
            $inputerrors['catagorydeslength'] = "Character must be grather than 6";
        }



    }else{
        $inputerrors['catagorydescription'] = "fill in the fields";
    }

    if (count($inputerrors) == 0){

        $query = "INSERT INTO tblecatagory VALUES (NULL,'$catagoryname','$catagorydesname',1, NULL, NULL)";

        $success = mysqli_query($con,$query);

        if ($success){
           echo '<script> catagorysuccess();</script>';
       }else{
            echo '<script>catagoryfaild();</script>';
        }

    }




}



?>
<!--Header Heading Part -->
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Catagory</li>
    <li class="breadcrumb-item active">Add Catagory</li>
</ol>
<!--Header Heading Part -->
<!---------------------------------------Main Part Starting ------->
    <div class="row">
        <div class="col-sm-12">

            <div class="alertx alert alert-success collapse">
                <strong>Welldone !</strong> Catagory Added Successfully.
            </div>
            <div class="alerty alert alert-danger alert-dismissible collapse">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> Oppos !</strong> Catagory Added Failed
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Add Catagory</h2>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <form action="" method="post" class="form-horizontal form-stripe">
                            <div class="form-group">
                                <label for="catagory" class="col-sm-4 control-label">Catagory :
                                    <span style="color: red; font-size: 13px;">
                                     <?php
                                     if(isset($inputerrors['catagoryname'])){
                                         echo $inputerrors['catagoryname'];
                                     }?>
                                </span>
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="catagory" name="catagory" value="<?=(isset($_POST['catagory']))?$_POST['catagory']:''?>" placeholder="Catagory">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discatagory" class="col-sm-6 control-label">Catagory Description :
                                    <span style="color: red; font-size: 13px;">
                                     <?php
                                     if(isset($inputerrors['catagorydescription'])){
                                         echo $inputerrors['catagorydescription'];
                                     }elseif (isset($inputerrors['catagorydeslength'])){
                                         echo $inputerrors['catagorydeslength'];
                                     }?>
                                </span>
                                </label>

                                <div class="col-sm-6">
                                    <textarea name="catagorydescription" class="form-control" id="discatagory"  cols="30" rows="5" style="resize: none"></textarea>
                                </div>
                            </div>


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



<?php include('include/footer.php');?>


