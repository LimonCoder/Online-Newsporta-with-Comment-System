<?php
include('include/header.php');

$sl = 1;


?>
<!--Header Heading Part -->
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Catagory</li>
    <li class="breadcrumb-item active">Manage Catagory</li>
</ol>
<!--Header Heading Part -->
<!---------------------------------------Main Part Starting ------->
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <a href="addcatagory.php" class="btn bg-primary m-2"><i class="fa fa-plus"></i> Add Catagory</a>
            <div class="tempdelete alert alert-success collapse">
              <strong>Welldone !!</strong> Catagory deleted .
          </div>
          <div class="restore alert alert-success collapse">
              <strong>Welldone !!</strong> Catagory restore successfully .
          </div>
            <div class="card">
                <div class="card-header">
                    <h4>Manage Catagory</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="catagorytable" class="table table-bordered" width="100%" style="font-size: 15px">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Catagory Name</th>
                                <th>Catagory Description</th>
                                <th>Posting Date</th>
                                <th>Last Upadate Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM tblecatagory WHERE isActive = 1 ORDER BY id DESC";
                                $results = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($results)){ ?>
                                    <tr id="deleteid<?=$row['id']?>">
                                        <td><?=$sl++?></td>
                                        <td><?=$row['catagoryname']?></td>
                                        <td><?=$row['catagorydescription']?></td>
                                        <td><?=$row['Postdate']?></td>
                                        <td><?=$row['UpdateDate']?></td>
                                        <td>
                                            <button  class="deletecatagory btn btn-danger" id="<?=$row['id']?>" ><i class="fa fa-trash-o"></i></button>
                                            <button class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        </td>
                                    </tr>


                                <?php    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-12 col-md-offset-1">
            <div class="table-responsive">
                <h5 class=" btn-danger my-2 p-2"><i class="fa fa-trash-o"></i> Delete catagory</h5>
                <table class="table table-bordered"  >
                    <thead>
                    <tr class="bg-primary">
                        <th>SL No</th>
                        <th>Catagory Name</th>
                        <th>Catagory Description</th>
                        <th>Posting Date</th>
                        <th>Last Upadate Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tabledeletedata">
                        <!-- deletedatatable.php  -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<!---------------------------------------Main Part Starting ------->



<?php include('include/footer.php');?>


