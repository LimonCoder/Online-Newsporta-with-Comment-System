<?php
include('include/header.php');
$sl = 1;



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
                Manage Posts
            </div>
            <div class="card-body">
                <table id="catagorytable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                       <th>Sl No</th>
                       <th>Catagory</th>
                       <th>Sub-Catagory</th>
                       <th>Post Tittle</th>
                       <th>Post Image</th>
                       <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT tblecatagory.catagoryname, tblesubcatagory.subcatagoryname,tblepost.post_tittle, tblepost.postimage FROM tblepost
                                        JOIN tblecatagory ON tblepost.catagory_id = tblecatagory.id
                                        JOIN tblesubcatagory ON tblepost.subcatagory_id = tblesubcatagory.id";
                            $results = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_array($results)){ ?>
                                <tr>
                                    <td><?=$sl++?></td>
                                    <td><?=$row['catagoryname']?></td>
                                    <td><?=$row['subcatagoryname']?></td>
                                    <td><?=$row['post_tittle']?></td>
                                    <td><?=$row['postimage']?></td>
                                    <td>
                                        <button class="btn btn-danger"><i class="fa fa-pencil "></i></button>
                                        <button class="btn bg-primary"><i class="fa fa-trash-o"></i></button>

                                    </td>
                                </tr>
                  <?php          }

                        ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------Main Part Starting ------->



<?php include('include/footer.php');?>