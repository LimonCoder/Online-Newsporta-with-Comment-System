<?php
    require_once ('config.php');
if(!isset($_SESSION['email'])){
    echo '<script>window.open("login.php","_self")</script>';

}
$activepage =  basename($_SERVER['PHP_SELF']);



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online News Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/font-awesome.css" >
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/custom-style.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
        <script src="http://localhost/newsportal/admin/assets/js/main.js"></script>

    </head>
    <body class="sb-nav-fixed" style="font-family: 'Times New Roman'">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-align-justify"></i></button>
            <a class="navbar-brand" href="index.html">NewsPortal</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <img src="assets/img/admin.png" alt="" width="40" height="40" style="border-radius: 50%">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Profile</a><a class="dropdown-item" href="#">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Dashboard</a
                            >

                            <a class="nav-link <?=($activepage == "addcatagory.php" || $activepage == "managecatagory.php" )?"":"collapsed"?> " href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="<?=($activepage == "addcatagory.php" || $activepage == "managecatagory.php" )?"true":"false"?>" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fa fa-align-justify"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div></a>
                            <div class="collapse <?=($activepage == "addcatagory.php" || $activepage == "managecatagory.php" )?"show":""?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?=($activepage == "addcatagory.php")?"active":""?>" href="addcatagory.php">Add  Category</a>
                                    <a class="nav-link <?=($activepage == "managecatagory.php")?"active":""?>" href="managecatagory.php">Manage  Category</a>
                                </nav>
                            </div>
                            <a class="nav-link <?=($activepage == "addsubcatagory.php" || $activepage == "managesubcatagory.php" )?"":"collapsed"?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="<?=($activepage == "addsubcatagory.php" || $activepage == "managesubcatagory.php" )?"true":"false"?>" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fa fa-align-justify"></i></div>
                                Sub Catagory
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div
                            ></a>
                            <div class="collapse <?=($activepage == 'addsubcatagory.php' || $activepage == 'managesubcatagory.php' )?"show":""?>" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="addsubcatagory.php"
                                        >Add Sub Catagory
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                    ></a>
                                    
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="managesubcatagory.php"
                                        >Manage Sub Catagory
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                    ></a>
                                    
                                </nav>
                            </div>
                            <a class="nav-link <?=($activepage == "addpost.php" || $activepage == "manageposts.php" )?"":"collapsed"?>" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="<?=($activepage == "addpost.php" || $activepage == "manageposts.php" )?"true":"false"?>" aria-controls="collapsePages"
                            ><div class="sb-nav-link-icon"><i class="fa fa-align-justify"></i></div>
                                Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div
                                ></a>
                            <div class="collapse <?=($activepage == 'addpost.php' || $activepage == 'manageposts.php' )?"show":""?>" id="collapsePost" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="addpost.php"
                                    >Add Post
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                        ></a>

                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="manageposts.php"
                                    >Manage Posts
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                        ></a>

                                </nav>

                            </div>
                            <a class="nav-link <?=($activepage == "trash-catagory.php" || $activepage == "trash-subcatagory.php" || $activepage == "trashe-post.php" )?"":"collapsed"?>" href="#" data-toggle="collapse" data-target="#collapsetrashe" aria-expanded="<?=($activepage == "trash-catagory.php" || $activepage == "trash-subcatagory.php" || $activepage == "trashe-post.php" )?"true":"false"?>" aria-controls="collapsePages"
                            ><div class="sb-nav-link-icon"><i class="fa fa-align-justify"></i></div>
                               Trash
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div
                                ></a>
                            <div class="collapse <?=($activepage == 'trash-catagory.php' || $activepage == 'trash-subcatagory.php' || $activepage == 'trashe-post.php' )?"show":""?>" id="collapsetrashe" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="trash-catagory.php"
                                    >Catgorys Trash
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                        ></a>

                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="trash-subcatagory.php"
                                    >Sub-Catagorys Trash
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                        ></a>

                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="trashe-post.php"
                                    > Posts Trash
                                        <div class="sb-sidenav-collapse-arrow"></i></div
                                        ></a>

                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading">Addons</div>

                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        