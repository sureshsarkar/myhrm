<?php

if(!isset($title))
{
    $title="empty";
}else{
  $title = $title;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php echo (isset($title))? ucwords($title):"Techcentrica";?></title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/ionicons.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet"
        href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


    <!-- iCheck -->

    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- JQVMap -->



    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">

    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Daterange picker -->

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">

    <!-- DataTables -->

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <script src="<?=base_url()?>assets/plugins/jquery.min.js"></script>


    <link rel="stylesheet" href="<?=base_url()?>assets/css/chosen.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/sub-admin-style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <style>
    body {

        zoom: 90%;

    }

    .delete {

        background: #c31414;

        border: red;

    }

    .eye {

        background: #143ac3;

        border: #0300ad;

    }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->

        <!-- <div class="preloader flex-column justify-content-center align-items-center">

  <img class="animation__shake" src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">

</div> -->

        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->

            <ul class="navbar-nav">



                <li class="nav-item d-none d-sm-inline-block">

                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Greetings, <b style="color: black;">Isha Mehndiratta</b> 🥳</h1>
                    <h3 class="welcome-sub-text">Check out the latest leads!</h3>
                </li>

                </li>

            </ul>

            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                <li class="nav-item menu-open">
                    <img src="<?=base_url()?>assets/images/tc-logo.png" style="width: 15%;
    /* margin-left: -20px; */
    position: absolute;
    top: -28px;
    right: 10px;">

                </li>

            </ul>

        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100%">

            <!-- Brand Logo -->

            <a href="#" class="brand-link">

                <img src="<?=base_url()?>assets/images/favicon.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">

                <span
                    class="brand-text font-weight-light"><?= (isset($_SESSION['name']))?$_SESSION['name']:"Sub Admin"?></span>

            </a>

            <!-- Sidebar -->

            <div class="sidebar">
                <!-- Sidebar Menu -->

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false" style="margin-top:50px;">

                        <!-- Add icons to the links using the .nav-icon class

             with font-awesome or any other icon font library -->

                        <li class="nav-item menu-open">

                            <a href="<?=base_url()?>sub_admin/dashboard"
                                class="nav-link <?php if ( $title == "Techcentrica :Dashboard" ) { ?>active<?php } ?>">

                                <p>

                                    Dashboard

                                </p>

                            </a>

                        </li>

                        <li class="nav-item menu-open">

                            <a href="<?=base_url()?>sub_admin/enquery"
                                class="nav-link <?php if ( $title == "Techcentrica :Enquery List" ) { ?>active<?php } ?>">

                                <p>
                                    <i class="bi bi-activity"></i> View All Leads
                                </p>

                            </a>

                        </li>
                        <li class="nav-item menu-open">

                            <a href="<?=base_url()?>sub_admin/enquery/add"
                                class="nav-link <?php if ( $title == "Techcentrica :Add Lead" ) { ?>active<?php } ?>">

                                <p>
                                    <i class="bi bi-building-fill-add"></i> Add New Lead
                                </p>

                            </a>

                        </li>

                        <li class="nav-item menu-open">

                            <a href="<?= base_url('sub_admin/login/logout')?>" class="nav-link">

                                <p>
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </p>

                            </a>

                        </li>

                        <!-- end code for activites  -->

                        <!-- banner menu start  -->
                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "add banner" || $title == "banner list" ) { ?>active<?php } ?>">

            <i class="bi bi-back"></i>

              <p>

              Banner

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/banner/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/banner" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>
            </ul>

          </li> -->

                        <!-- end code for category  -->

                        <!-- Category menu start  -->
                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "add category" || $title == "category list" ) { ?>active<?php } ?>">

            <i class="bi bi-bookmarks"></i>

              <p>

              Category

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/category/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/category" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>
            </ul>

          </li> -->

                        <!-- end code for category  -->


                        <!-- sub-category menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "sub_category" || $title == "sub_category" ) { ?>active<?php } ?>">

            <i class="bi bi-bookmarks"></i>

              <p>

              Sub Category

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/sub_category/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/sub_category" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

             

            </ul>

          </li> -->

                        <!-- Top home menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "home" || $title == "add_home" || $title == "edit_home" ) { ?>active<?php } ?>">
            <i class="bi bi-house-add"></i>

              <p>

              Home

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/home/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/home" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

            </li> -->

                        <!-- Top Company menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "company" || $title == "add_company" || $title == "edit_company" ) { ?>active<?php } ?>">
            <i class="bi bi-building-fill-add"></i>

              <p>

              Company

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/company/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/company" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->



                        <!-- Top DESIGN & DEVELOPEMENT menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "design_dev" || $title == "add_design_dev" || $title == "edit_design_dev" ) { ?>active<?php } ?>">

            <i class="bi bi-file-diff"></i>

              <p>

              Design & Dev.

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/design_dev/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/design_dev" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->



                        <!-- Top OUR SOLUTIONS menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "our_solutions" || $title == "add_our_solutions" || $title == "edit_our_solutions" ) { ?>active<?php } ?>">

            <i class="bi bi-bar-chart-line-fill"></i>

              <p>

              Our Solutions

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/our_solutions/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/our_solutions" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top Digital Solution menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "digi_solution" || $title == "add_digi_solution" || $title == "edit_digi_solution" ) { ?>active<?php } ?>">

            <i class="bi bi-smartwatch"></i>

              <p>

              Digital Solution

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/digi_solution/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/digi_solution" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top Experience menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "experience" || $title == "add_experience" || $title == "edit_experience" ) { ?>active<?php } ?>">

            <i class="bi bi-person-workspace"></i>

              <p>

              Experience

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/experience/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/experience" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top Contact Us menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "contact_us" || $title == "add_contact_us" || $title == "edit_contact_us" ) { ?>active<?php } ?>">

            <i class="bi bi-person-rolodex"></i>

              <p>

              Contact Us

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/contact_us/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/contact_us" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top Enquery menu -->
                        <!-- 
           <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "enquery" || $title == "add_enquery" || $title == "edit_enquery" ) { ?>active<?php } ?>">

            <i class="bi bi-graph-up-arrow"></i>

              <p>

              Enquery

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/enquery/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/enquery" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top Sub Admin menu -->

                        <!-- <li class="nav-item">

            <a href="#" class="nav-link  <?php if ( $title == "sub_admin" || $title == "add_sub_admin" || $title == "edit_sub_admin" ) { ?>active<?php } ?>">

            <i class="bi bi-people-fill"></i>

              <p>

              Sub Admin

                <i class="right fas fa-angle-left"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/sub_admin/add" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="<?=base_url()?>sub_admin/sub_admin" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>

            </ul>

          </li> -->

                        <!-- Top footer menu -->

                        <!-- <li class="nav-item">

          <a href="#" class="nav-link  <?php if ( $title == "topfooter" || $title == "add_topfooter" || $title == "edit_topfooter" ) { ?>active<?php } ?>">

          <i class="bi bi-file-earmark-arrow-down-fill"></i>

            <p>

            Top Footer

              <i class="right fas fa-angle-left"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="<?=base_url()?>sub_admin/topfooter/add" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>Add</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="<?=base_url()?>sub_admin/topfooter" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>Manage</p>

              </a>

            </li>

          </ul>

          </li>

          <li class="nav-item">

            <a  href="<?=base_url()?>sub_admin/login/logout" class="nav-link  <?php if ( $title == "hotel_category" || $title == "add_hotel_category" ) { ?>active<?php } ?>">

            <i class="bi bi-box-arrow-right"></i>

              <p>

              LogOut 

              </p>

            </a>

          </li> -->

                        <!-- end code for banner  -->
                        <img src="https://demos.themeselection.com/materio-mui-react-nextjs-admin-template-free/images/misc/upgrade-banner-light.png"
                            style="
    width: 115%;
    position: absolute;
    bottom: -390px;
">
                    </ul>

                </nav>

                <!-- /.sidebar-menu -->

            </div>

            <!-- /.sidebar -->

        </aside>