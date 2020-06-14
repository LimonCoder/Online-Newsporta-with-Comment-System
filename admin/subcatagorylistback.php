<?php
    require_once('include/config.php');
    $id = $_POST['id'];
    if ($id != "select"){
        $query = "SELECT tblesubcatagory.subcatagoryname,tblesubcatagory.id  FROM tblesubcatagory WHERE catagoryid = $id";

        $results = mysqli_query($con,$query); ?>
        <option value="select" selected>Select Sub-Catagory</option>
        <?php
        while ($row = mysqli_fetch_array($results)){ ?>
            <option value="<?=$row['id']?>"><?= $row['subcatagoryname']?></option>

  <?php      }


    }else{ ?>
        <option value="select" selected>Select Sub-Catagory</option>
<?php    }


?>