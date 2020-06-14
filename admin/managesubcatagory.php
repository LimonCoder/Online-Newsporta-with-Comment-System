<?php
include('include/header.php');
$sl = 1;
$dlesl = 1;


?>
<!--Header Heading Part -->
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<!--Header Heading Part -->
<!---------------------------------------Main Part Starting ------->
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                Manage Sub Catagory
            </div>
            <div class="card-body">
                <table id="catagorytable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr style="font-size: 16px">
                        <td>Sl No</td>
                        <td>Catagory Name</td>
                        <td>Sub-Catagory Name</td>
                        <td>Sub-Catagory Description</td>
                        <td>Posting Date</td>
                        <td>Last Upadate Date</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody style="font-size: 14px">
                    <?php
                    $query = "SELECT tblesubcatagory.*, tblecatagory.catagoryname catagory
                        FROM tblesubcatagory
                        JOIN tblecatagory
                        on tblesubcatagory.catagoryid = tblecatagory.id WHERE tblesubcatagory.Active = 1";
                    $resutls = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($resutls)){ ?>
                        <tr id="deleteid<?=$row['id'];?>">
                            <td><?= $sl++ ?></td>
                            <input type="number" id="slno" value="<?= $sl; ?>" hidden>
                            <td><?= $row['catagory']; ?></td>
                            <td><?= $row['subcatagoryname']; ?></td>
                            <td><?= $row['subcatagorydescription']; ?></td>
                            <td><?= $row['Postdate']; ?></td>
                            <td><?=($row['Postdate'] == $row['updatepostdate'] )? '':$row['updatepostdate']; ?></td>
                            <td>
                                <i class="fa fa-pencil" style="color: blue; cursor: pointer; padding-left: 10px"></i>
                                <i class="fa fa-trash-o subcatdelete" id="<?=$row['id']?>" style="color: red; margin-left: 13px;cursor: pointer"></i>
                            </td>

                        </tr>
                    <?php  }
                    ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!--delete manage catagory-->
<div class="row mt-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header bg-danger text-white">
                Manage Sub Catagory
            </div>
            <div class="card-body">
                <table id="catagorytable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr style="font-size: 16px">
                        <td>Sl No</td>
                        <td>Catagory Name</td>
                        <td>Sub-Catagory Name</td>
                        <td>Sub-Catagory Description</td>
                        <td>Posting Date</td>
                        <td>Last Upadate Date</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody style="font-size: 14px" id="deletecatagory">
                    <?php
                    $query = "SELECT tblesubcatagory.*, tblecatagory.catagoryname catagory
                        FROM tblesubcatagory
                        JOIN tblecatagory
                        on tblesubcatagory.catagoryid = tblecatagory.id WHERE tblesubcatagory.Active = 0";
                    $resutls = mysqli_query($con,$query);
                    if(mysqli_num_rows($resutls) > 0){
                        while ($row = mysqli_fetch_array($resutls)){ ?>
                            <tr>
                                <td><?= $dlesl++ ?></td>
                                <td><?= $row['catagory']; ?></td>
                                <td><?= $row['subcatagoryname']; ?></td>
                                <td><?= $row['subcatagorydescription']; ?></td>
                                <td><?= $row['Postdate']; ?></td>
                                <td><?=($row['Postdate'] == $row['updatepostdate'] )? '':$row['updatepostdate']; ?></td>
                                <td>
                                    <i class="fa fa-undo" style="color: blue; cursor: pointer; padding-left: 10px"></i>
                                    <i class="permanentdelete fa fa-trash-o" id="<?=$row['id']?>" style="color: red; margin-left: 13px;cursor: pointer"></i>
                                </td>

                            </tr>
                        <?php  }
                    }else{ ?>
                        <tr id="recordavaible">
                            <td colspan="7" style="text-align: center; color: red; font-size: 18px" >No Record Found</td>
                        </tr>

                  <?php  }

                    ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------Main Part Starting ------->



<?php include('include/footer.php');?>
<script>







    $(document).ready(function () {

        $(".subcatdelete").click(function () {
            var slno = 1;
            var deleteid = $(this).attr('id');
            
            $.ajax({
                url:'tmpsubcatagorydelete.php',
                type:'post',
                data:{
                    id:deleteid
                },
                dataType:'json',
                beforeSend:function () {

                },
                success:function (res) {

                    var td = "";

                    $.each(res, function (index,value) {
                        var no = slno++;

                         td += "<tr style='font-size: 12px'>";
                         td += "<td>"+no+"</td>";
                         td += "<td>"+value[7]+"</td>";
                         td += "<td>"+value[2]+"</td>";
                         td += "<td>"+value[3]+"</td>";
                         td += "<td>"+value[4]+"</td>";
                         td += "<td>"+value[5]+"</td>";
                         td += "<td>";
                         td +=  '<i class="icon fa fa-undo" style="color: blue; cursor: pointer;padding: 8px;display: inherit;"></i>'
                         td +=  '<i class=" fa fa-trash-o" onclick="perfrer()" style="color: red; cursor: pointer;padding: 8px;display: inherit;"></i>';
                         td +=  "</td>";
                         td += "</tr>";



                    })
                    $("#deletecatagory").html(td);


                    $("#recordavaible").hide();

                    $("#deleteid"+deleteid).hide();
                     setTimeout(function () {
                         window.open("managesubcatagory.php","_self");
                     },1400);

                }

            });


        })





    })
</script>
