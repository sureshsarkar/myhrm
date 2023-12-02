<?php

if (!isset($title)) {
    $title = "empty";
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo (isset($title)) ? ucwords($title) : "HRMS"; ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="<?= base_url() ?>assets/plugins/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/chosen.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/newmain.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>


<body class="font-montserrat">
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>
    <div id="main_content">
        <div id="header_top" class="header_top">
            <div class="container bradius">
                <div class="hleft">
                    <div class="dropdown">
                        <a href="<?= base_url() ?>admin/dashboard" class="nav-link icon xs-hide"><i
                                class="bi bi-speedometer2"></i></a>
                        <a href="<?= base_url() ?>admin/employee" class="nav-link icon app_inbox xs-hide"><i
                                class="bi bi-people"></i></a>
                        <a href="<?= base_url() ?>admin/leavemanagement" class="nav-link icon app_inbox xs-hide"><i
                                class="bi bi-file-earmark-break"></i></a>
                        <a href="<?= base_url() ?>admin/performance" class="nav-link icon xs-hide"><i
                                class="bi bi-hand-thumbs-up"></i></a>
                        <a href="<?= base_url() ?>admin/holiday" class="nav-link icon xs-hide"><i
                                class="bi bi-wallet2"></i></a>
                        <a href="<?= base_url() ?>admin/jobportal/applicant" class="nav-link icon xs-hide"><i
                                class="bi bi-layout-text-sidebar-reverse"></i></a>
                        <a href="<?= base_url() ?>admin/jobportal/applicant" class="nav-link icon xs-hide"><i class="bi bi-people"></i></a>
                        <a href="<?= base_url() ?>admin/events" class="nav-link icon xs-hide"><i class="bi bi-calendar-event"></i></a>
                         <a href="<?= base_url() ?>admin/policy" class="nav-link icon xs-hide"><i class="bi bi-book"></i></a>
                    </div>

                    <div class="hright">
                        <div class="dropdown">
                            <a href="javascript:void(0)"
                                class="nav-link icon menu_toggle d-lg-none d-sm-block d-md-block"><i
                                    class="fa  fa-align-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rightsidebar" class="right_sidebar">
            <a href="javascript:void(0)" class="p-3 settingbar float-right"><i class="fa fa-close"></i></a>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Settings"
                        aria-expanded="true">Settings</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity"
                        aria-expanded="false">Activity</a></li>
            </ul>
        </div>



        <div id="left-sidebar" class="sidebar">
            <h5 class="welcome-text">
                 <b style="color: black;">नमस्कार 
               <img src="<?= base_url()?>assets/images/namaste.gif" style="width: 25%;margin-top: -11px;"></b>
            </h5>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul class="metismenu">
                    <li class="<?= (isset($title) && $title == "dashboard") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/dashboard">Dashboard</a>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "employee" || $title == "edit_employee" || $title == "add_employee" || $title == "View Employee") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/employee">Employee</a>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Leavemanagement" || $title == "Add Leave" || $title == "Edit Leave" || $title == "View Leavemanagement") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/leavemanagement">Leave Management</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "Performance" || $title == "Edit Performance" || $title == "View Performance") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/performance">Performance</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "holiday" || $title == "Add Holiday" || $title == "Edit Holiday") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/holiday">Holidays</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "payroll" || $title == "salary" || $title == "allattendance" || $title =="addattendance") ? "active" : "" ?>">
                        <a href="javascript:void(0)" class="">Payroll
                            <?= (isset($title) && $title == "payroll" || $title == "salary" || $title == "allattendance")?'<i class="bi bi-dash"></i>':'<i class="bi bi-plus"></i>'?></a>
                        <ul class='dropdown_links m-0'>
                            <!-- <li class="<?= (isset($title) && $title == "payroll") ? "subActive" : "" ?>"><a
                                    href="<?= base_url() ?>admin/payroll">Payroll Dashboard</a></li> -->
                            <li class="<?= (isset($title) && $title == "salary") ? "subActive" : "" ?>"><a
                                    href="<?= base_url() ?>admin/payroll/salary">Salary Module</a></li>
                            <li class="<?= (isset($title) && $title == "allattendance") ? "subActive" : "" ?>"><a
                                    href="<?= base_url() ?>admin/payroll/allattendance">Attendance Module</a></li>
                        </ul>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Applicant Module" || $title == "applicant" || $title == "Add Applicant" || $title == "Job Module") ? "active" : "" ?>">
                        <a href="javascript:void(0)" class="">Job Portal
                            <?= (isset($title) && $title == "Applicant Module" || $title == "applicant" || $title == "Add Applicant" || $title == "Job Module")?'<i class="bi bi-dash"></i>':'<i class="bi bi-plus"></i>'?></a>
                        <ul class='dropdown_links m-0'>

                            <li
                                class="<?= (isset($title) && $title == "Applicant Module" || $title == "Add Applicant") ? "subActive" : "" ?>">
                                <a href="<?= base_url() ?>admin/jobportal/applicant">Applicant</a>
                            </li>

                            <li class="<?= (isset($title) && $title == "Job Module") ? "subActive" : "" ?>">
                                <a href="<?= base_url() ?>admin/jobportal/job">Job Module</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Events" || $title == "Add Event" || $title == "Edit Event") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/events">Events</a>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Policy" || $title == "Add Policy" || $title == "Edit Policy" || $title == "View Policy") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>admin/policy">Company Policy</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="page">
            <div id="page_top" class="section-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <a href="javascript:void(0)"
                                class="nav-link icon menu_toggle d-none d-lg-block d-xl-block "><i
                                    class="fa  fa-align-left dropCol "></i></a>
                            <h1 class="page-title font-weight-bold text-uppercase text-dark">
                                <?= (isset($_SESSION['name']) && !empty($_SESSION['name'])) ? $_SESSION['name'] : ""; ?>
                                <i class="bi bi-emoji-smile-upside-down"></i>
                            </h1>
                        </div>

                        <div class="offcanvas offcanvas-end" style="width:205px;" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <div class="userData">
                                    <div class="">
                                        <div class="media1 text-center">
                                            <img class="avatar avatar-xl mr-3"
                                                src="<?= base_url()?>assets/images/user.png" alt="avatar">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-2 text-center text-uppercase font-weight-bold"
                                                style="color:#1a5089;">
                                                <?= (isset($_SESSION['name']) && !empty($_SESSION['name'])) ? $_SESSION['name'] : ""; ?>
                                                HRM
                                            </h5>
                                            <ul class="social-links list-inline mb-0 mt-2">
                                            </ul>

                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <ul class="list-group">
                                            <li class=" d-flex "
                                                style="background-color:#d3d3d39e;padding:5px 10px;border-radius:4px;">
                                                <a href="<?= base_url() ?>admin/dashboard/dashboard"
                                                    class="font-weight-normal" style><i class="bi bi-person fa-1x"></i>
                                                    Profile</a>
                                            </li>
                                            <li class=" d-flex mt-2"
                                                style="background-color:#d3d3d39e;padding:5px 10px;border-radius:4px;">
                                                <a href="<?= base_url() ?>admin/login/logout" class="font-weight-normal"
                                                    style><i class="bi bi-box-arrow-right"></i>
                                                    Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="notification d-flex">
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1"
                                        data-toggle="dropdown">
                                        <i class="fa fa-envelope"></i>
                                        <span class="badge badge-success nav-unread"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="right_chat list-unstyled w250 p-0">
                                            <li class="online">
                                                <a href="javascript:void(0);">
                                                    <div class="media">
                                                        <img class="media-object "
                                                            src="<?= base_url() ?>assets/images/user.png" alt>
                                                        <div class="media-body">
                                                            <span class="name">Donald Gardner</span>
                                                            <span class="message">Designer, Blogger</span>
                                                            <span class="badge badge-outline status"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="online">
                                                <a href="javascript:void(0);">
                                                    <div class="media">
                                                        <img class="media-object "
                                                            src="<?= base_url() ?>assets/images/user.png" alt>
                                                        <div class="media-body">
                                                            <span class="name">Wendy Keen</span>
                                                            <span class="message">Java Developer</span>
                                                            <span class="badge badge-outline status"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="offline">
                                                <a href="javascript:void(0);">
                                                    <div class="media">
                                                        <img class="media-object "
                                                            src="<?= base_url() ?>assets/images/user.png" alt>
                                                        <div class="media-body">
                                                            <span class="name">Matt Rosales</span>
                                                            <span class="message">CEO, Epic Theme</span>
                                                            <span class="badge badge-outline status"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="online">
                                                <a href="javascript:void(0);">
                                                    <div class="media">
                                                        <img class="media-object "
                                                            src="<?= base_url() ?>assets/images/user.png" alt>
                                                        <div class="media-body">
                                                            <span class="name">Phillip Smith</span>
                                                            <span class="message">Writter, Mag Editor</span>
                                                            <span class="badge badge-outline status"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1"
                                        data-toggle="dropdown"><i class="fa fa-bell"></i><span
                                            class="badge badge-primary nav-unread"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="list-unstyled feeds_widget">
                                            <li>
                                                <div class="feeds-left"><i class="fa fa-check"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-danger">Issue Fixed <small
                                                            class="float-right text-muted">11:05</small></h4>
                                                    <small>WE have fix all Design bug with Responsive</small>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="feeds-body">
                                                    <h4 class="title">New User <small
                                                            class="float-right text-muted">10:45</small></h4>
                                                    <small>I feel great! Thanks team</small>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title">7 New Feedback <small
                                                            class="float-right text-muted">Today</small></h4>
                                                    <small>It will give a smart finishing to your site</small>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left"><i class="fa fa-question-circle"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-warning">Server Warning <small
                                                            class="float-right text-muted">10:50</small></h4>
                                                    <small>Your connection is not private</small>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left"><i class="fa fa-shopping-cart"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title">7 New Orders <small
                                                            class="float-right text-muted">11:35</small></h4>
                                                    <small>You received a new oder from Tina.</small>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)"
                                            class="dropdown-item text-center text-muted-dark readall">Mark all as
                                            read</a>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight">
                                    <img class="avatar ml-2" src="<?= base_url()?>assets/images/user.png" alt=""
                                        data-toggle="tooltip" data-placement="right" title=""
                                        data-original-title="User Menu">

                                </a>
                                <div class="dropdown d-flex">
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                        <a class="dropdown-item" href="<?= base_url() ?>admin/profile"><i
                                                class="fa fa-gear fa-spin text-dark" data-toggle="tooltip"
                                                data-placement="right" title="" data-original-title="Settings"></i>
                                            Profile</a>

                                        <a class="dropdown-item" href="<?= base_url() ?>admin/login/logout"><i
                                                class="bi bi-box-arrow-right text-dark"></i> Sign out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>