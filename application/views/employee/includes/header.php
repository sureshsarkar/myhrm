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

<style>
@keyframes blink {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.blinking-text {
    animation: blink 1s infinite;
    /* Adjust the animation duration as needed */
}

.fontSi {
    font-size: 8px;
    font-weight: 400;
}
.seenMe{
    padding: 3px;
    background: #0d5cad;
    display: inline-block;
    border-radius:50%;
}
</style>

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
                        <a href="<?= base_url() ?>employee/dashboard" class="nav-link icon xs-hide"><i
                                class="bi bi-speedometer2"></i></a>
                        <a href="<?= base_url() ?>employee/attendance" class="nav-link icon app_inbox xs-hide"><i
                                class="bi bi-people"></i></a>
                        <a href="<?= base_url() ?>employee/salary" class="nav-link icon app_inbox xs-hide">
                            <i class="bi bi-cash"></i></a>
                        <a href="<?= base_url() ?>employee/leavemanagement" class="nav-link icon xs-hide"><i
                                class="bi bi-calendar-check"></i></a>
                        <a href="<?= base_url() ?>employee/performance" class="nav-link icon xs-hide"><i
                                class="bi bi-arrow-up-right-circle"></i></a>
                        <a href="<?= base_url() ?>employee/holiday" class="nav-link icon xs-hide"><i
                                class="bi bi-layout-text-sidebar-reverse"></i></a>
                        <a href="<?= base_url() ?>employee/job" class="nav-link icon xs-hide"><i
                                class="bi bi-people"></i></a>
                        <a href="<?= base_url() ?>employee/profile" class="nav-link icon xs-hide"><i
                                class="bi bi-person-circle"></i></a>
                        <a href="<?= base_url() ?>employee/events" class="nav-link icon xs-hide"><i
                                class="bi bi-calendar"></i></a>
                        <a href="<?= base_url() ?>employee/policy" class="nav-link icon xs-hide"><i
                                class="bi bi-building"></i></a>
                        <a href="#" class="nav-link icon xs-hide"><i class="bi bi-arrow-repeat"></i></a>
                        <a href="#" class="nav-link icon xs-hide"><i class="bi bi-stickies"></i></a>
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
            <h5 class="welcome-text"> <b style="color: black;">नमस्कार <img
                        src="<?= base_url()?>assets/images/namaste.gif" style="width: 25%;margin-top: -11px;"></b></h5>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul class="metismenu">
                    <li class="<?= (isset($title) && $title == "TCHRMS :Dashboard") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/dashboard">Dashboard</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "Attendance" || $title == "View Attendance" || $title == "add_employee" || $title == "View Employee") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/attendance">Attendance</a>
                    </li>

                    <li class="<?= (isset($title) && $title == "Salary") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/salary">Salary Module</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "Leave Management" || $title == "Add Leave Form") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/leavemanagement">Leave Management</a>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Performance" ||$title == "View Performance") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/performance">Performance</a>
                    </li>
                    <li
                        class="<?= (isset($title) && $title == "Holiday" || $title == "edit_employee") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/holiday">Holiday List</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "Jobs" || $title == "edit_employee" || $title == "add_employee" || $title == "View Employee") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/job">Internal Jobs View</a>
                    </li>

                    <li class="<?= (isset($title) && $title == "Employee Profile") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/profile">Profile Section</a>
                    </li>

                    <li class="<?= (isset($title) && $title == "Events") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/events">Events</a>
                    </li>

                    <li class="<?= (isset($title) && $title == "Company Policy") ? "active" : "" ?>">
                        <a href="<?= base_url() ?>employee/policy">Company Policy</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "employee" || $title == "edit_employee" || $title == "add_employee" || $title == "View Employee") ? "active" : "" ?>">
                        <a href="#">Important Updates</a>
                    </li>

                    <li
                        class="<?= (isset($title) && $title == "employee" || $title == "edit_employee" || $title == "add_employee" || $title == "View Employee") ? "active" : "" ?>">
                        <a href="#">Employee Tickets</a>
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
                            <?php if(isset($_SESSION['police_code']) && empty($_SESSION['police_code'])){ ?>
                            <a href="https://noidapolice.com/noidapolice/form.php?type=1" target="_blank"
                                class="badge bg-inverse-success blinking-text"> <span>Police Verification
                                    Link</span></a>
                            <?php }?>
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
                                            </h5>
                                            <ul class="social-links list-inline mb-0 mt-2">
                                            </ul>

                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <ul class="list-group">
                                            <li class=" d-flex "
                                                style="background-color:#d3d3d39e;padding:5px 10px;border-radius:4px;">
                                                <a href="<?= base_url() ?>employee/profile" class="font-weight-normal"
                                                    style><i class="bi bi-person fa-1x"></i>
                                                    Profile</a>
                                            </li>
                                            <li class=" d-flex mt-2"
                                                style="background-color:#d3d3d39e;padding:5px 10px;border-radius:4px;">
                                                <a href="<?= base_url() ?>employee/login/logout"
                                                    class="font-weight-normal" style><i
                                                        class="bi bi-box-arrow-right"></i>
                                                    Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- ----------  -->
                            </div>
                        </div>
                        <div class="right">
                            <div class="notification d-flex">
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1 updateNotiSeenBtn" data-toggle="dropdown"><i class="fa fa-bell"></i>
                                        <span class="badge badge-primary nav-unread fontSi counter"><?= (isset($totalNotiCount))?count($totalNotiCount):0?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="list-unstyled w300 feeds_widget notificationOverFlowY overflow_x_hide">
                                            <?php if(isset($totalNotification)){
                                            foreach ($totalNotification as $k => $v) {
                                            ?>
                                            <li class="px-1 py-2 lineHeight_initial">
                                                <div class="feeds-left right_chat">
                                                    <i class="bi bi-bell"></i><span class="badge badge-outline status"></span>
                                                </div>
                                                <div class="feeds-body">
                                                    <h4 class="notifyTitle"> <?= $v->title;?>
                                                    <?php if($v->seen ==0){ ;?>
                                                        <span class="seenMe"></span>
                                                        <?php }?>
                                                        <small class="float-right badge bg-inverse-success mr-3"><?= date("h:i A",strtotime($v->created_at));?></small>
                                                    </h4>
                                                    <small> <?= $v->content;?></small>
                                                </div>
                                            </li>
                                            <?php }}?>
                                        </ul>
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
                                        <a class="dropdown-item" href="<?= base_url() ?>employee/profile"><i
                                                class="fa fa-gear fa-spin text-dark" data-toggle="tooltip"
                                                data-placement="right" title="" data-original-title="Settings"></i>
                                            Profile</a>

                                        <a class="dropdown-item" href="<?= base_url() ?>employee/login/logout"><i
                                                class="bi bi-box-arrow-right text-dark"></i> Sign out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    var URL_link = "<?php echo base_url('employee/dashboard/updateNotiSeen')?>"
                   $(".updateNotiSeenBtn").click(function(){
                    $.ajax({
                        type: "post",
                        url: URL_link,
                        data: {postData:1},
                        contentType: "application/x-www-form-urlencoded",
                        success: function(responseData) {
                            console.log(responseData)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    })
                   })
                })
            </script>

            