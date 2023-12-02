<?php $this->load->view('header'); ?>

<style>
.small-box .icon>i {
    font-size: 71px;
    margin-top: 30px;
}

.graph-box {
    height: 450px;
    margin-top: 1rem;
    margin-left: 1rem;
    background-color: #f2f2f2;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 0 3.5px #dddddd;
    -moz-box-shadow: 0 0 0 3.5px #dddddd;
    box-shadow: 0 0 0 3.5px #dddddd;
    padding: 20px;
}

.graph-bo2 {
    height: 400px;
    width: 400px;
    margin-top: 1rem;
    margin-left: 1rem;
    background-color: #f2f2f2;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 0 3.5px #dddddd;
    -moz-box-shadow: 0 0 0 3.5px #dddddd;
    box-shadow: 0 0 0 3.5px #dddddd;
    padding: 20px;
}

.container-team {
    margin-top: 1rem;
}

.user-list tbody td>img {
    position: relative;
    max-width: 40px;
    float: left;
    margin-right: 15px;
}

.user-list tbody td .user-link {
    display: flex;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}

.container-team>.label {
    width: 400px;
}


.label-success {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%);
    color: #fff;
    text-transform: uppercase;
}

.label-hold {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #279EFF 0%, #0C356A 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-unsuccess {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #BB2525 0%, #FF6969 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-suspended {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #9288F8 0%, #8062D6 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-completed {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #545B77 0%, #374259 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-unactive {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-pending {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #FF9EAA 0%, #FFD0D0 100%);
    color: #fff;
    text-transform: uppercase;

}

.label-working {
    border-radius: 20px;
    padding: 10px;
    background: linear-gradient(135deg, #E76161 0%, #B04759 100%);
    color: #fff;
    text-transform: uppercase;

}

.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}

/* TABLES */
.table {
    border-collapse: separate;
}

.table-hover>tbody>tr:hover>td,
.table-hover>tbody>tr:hover>th {
    background-color: #eee;
}

.table thead>tr>th {
    padding-bottom: 0;
}

.table tbody>tr>td {
    font-size: 0.875em;
    background: #f5f5f5;
    vertical-align: middle;
    padding: 12px 15px;
}

.table tbody>tr>td:first-child,
.table thead>tr>th:first-child {
    padding-left: 20px;
}

.table thead>tr>th span {
    border-bottom: 2px solid #C2C2C2;
    display: inline-block;
    padding: 0 5px;
    padding-bottom: 5px;
    font-weight: normal;
}

.table thead>tr>th>a span {
    color: #344644;
}

.table thead>tr>th>a span:after {
    content: "\f0dc";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    margin-left: 5px;
    font-size: 0.75em;
}

.table thead>tr>th>a.asc span:after {
    content: "\f0dd";
}

.table thead>tr>th>a.desc span:after {
    content: "\f0de";
}

.table thead>tr>th>a:hover span {
    text-decoration: none;
    color: #2bb6a3;
    border-color: #2bb6a3;
}

.table.table-hover tbody>tr>td {
    -webkit-transition: background-color 0.15s ease-in-out 0s;
    transition: background-color 0.15s ease-in-out 0s;
}

.table tbody tr td .call-type {
    display: block;
    font-size: 0.75em;
    text-align: center;
}

.table tbody tr td .first-line {
    line-height: 1.5;
    font-weight: 400;
    font-size: 1.125em;
}

.table tbody tr td .first-line span {
    font-size: 0.875em;
    color: #969696;
    font-weight: 300;
}

.table tbody tr td .second-line {
    font-size: 0.875em;
    line-height: 1.2;
}

.table a.table-link {
    margin: 0 5px;
    font-size: 1.125em;
}

.table a.table-link:hover {
    text-decoration: none;
    color: #2aa493;
}

.table a.table-link.danger {
    color: #fe635f;
}

.table a.table-link.danger:hover {
    color: #dd504c;
}

.table-products tbody>tr>td {
    background: none;
    border: none;
    border-bottom: 1px solid #ebebeb;
    -webkit-transition: background-color 0.15s ease-in-out 0s;
    transition: background-color 0.15s ease-in-out 0s;
    position: relative;
}

.table-products tbody>tr:hover>td {
    text-decoration: none;
    background-color: #f6f6f6;
}

.table-products .name {
    display: block;
    font-weight: 600;
    padding-bottom: 7px;
}

.table-products .price {
    display: block;
    text-decoration: none;
    width: 50%;
    float: left;
    font-size: 0.875em;
}

.table-products .price>i {
    color: #8dc859;
}

.table-products .warranty {
    display: block;
    text-decoration: none;
    width: 50%;
    float: left;
    font-size: 0.875em;
}

.table-products .warranty>i {
    color: #f1c40f;
}

.table tbody>tr.table-line-fb>td {
    background-color: #9daccb;
    color: #262525;
}

.table tbody>tr.table-line-twitter>td {
    background-color: #9fccff;
    color: #262525;
}

.table tbody>tr.table-line-plus>td {
    background-color: #eea59c;
    color: #262525;
}

.table-stats .status-social-icon {
    font-size: 1.9em;
    vertical-align: bottom;
}

.table-stats .table-line-fb .status-social-icon {
    color: #556484;
}

.table-stats .table-line-twitter .status-social-icon {
    color: #5885b8;
}

.table-stats .table-line-plus .status-social-icon {
    color: #a75d54;
}

.container-progress-bar {
    background-color: rgb(192, 192, 192);
    width: 80%;
    border-radius: 15px;
}

.skill {
    background-color: rgb(116, 194, 92);
    color: white;
    padding: 1%;
    text-align: right;
    font-size: 20px;
    border-radius: 15px;
    width: 80%;
}

.container-task {
    width: 500px;
}

.team-image {
    width: 20px;
    height: 20px;
}
</style>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <!-- <h1 class="m-0 text-left">Dashboard</h1> -->
                    <!-- <h1 class="super_admin">
                        <i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i>Super Admin Dashboard
                        <small>Control panel</small>
                    </h1> -->

                </div><!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Dashboard v1</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="small-box saf__box1">
                        <div class="inner">
                            <h2>New Tickets</h2>
                            <h3>
                                <?= (isset($totalBanner) && !empty($totalBanner)) ? $totalBanner : 25; ?>
                            </h3>
                            <p>18% Higher Than Last Month</p>
                        </div>
                        <div class="icon">
                            <i class='bx bx-lg bxs-coupon'></i>
                        </div>
                        <a href="<?= base_url('admin/banner') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="small-box saf__box2">
                        <div class="inner">
                            <h2>Project Assigned</h2>
                            <h3>
                                <?= (isset($totalBanner) && !empty($totalBanner)) ? $totalBanner : 15; ?>
                            </h3>
                            <p>21% Higher Than Last Month</p>
                        </div>
                        <div class="icon">
                            <i class='bx bx-lg bxs-keyboard'></i>
                        </div>
                        <a href="<?= base_url('admin/banner') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="small-box saf__box3">
                        <div class="inner">
                            <h2>Ticket Resolved</h2>
                            <h3>
                                <?= (isset($totalBanner) && !empty($totalBanner)) ? $totalBanner : 45; ?>
                            </h3>
                            <p>37% Higher Than Last Month</p>
                        </div>
                        <div class="icon">
                            <i class='bx bx-lg bx-calendar-check'></i>
                        </div>
                        <a href="<?= base_url('admin/banner') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="small-box saf__box4">
                        <div class="inner">
                            <h2>Available Leaves</h2>
                            <h3>
                                <?= (isset($totalBanner) && !empty($totalBanner)) ? $totalBanner : 15; ?>
                            </h3>
                            <p>10% Higher Than Last Month</p>
                        </div>
                        <div class="icon">
                            <i class='bx bx-lg bx-home-heart'></i>
                        </div>
                        <a href="<?= base_url('admin/banner') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


            <!-- /.row -->

            <!-- Main row -->

            <div class="row">

                <div class="col-md-6 graph-box">
                    <div id="chart">
                        <h2>Weekly Working Hours

                        </h2>
                    </div>
                </div>

                <div class="col-md-5 graph-box">
                    <div id="chartx"></div>
                </div>

                <!-- /.row (main row) -->

            </div><!-- /.container-fluid -->

            <div class="container-team">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-box clearfix">
                            <div class="table-responsive text-center">
                                <h2>MY TEAM</h2>
                                <table class="table user-list">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><span>Employee Details</span></th>
                                            <th class="text-center"><span>Created</span></th>
                                            <th class="text-center"><span>Status</span></th>
                                            <th class="text-center"><span>Documents</span></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-success">Active</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-unsuccess">Unactive</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-pending">Pending</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-hold">On Hold</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-working">working</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-suspended">suspended</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-completed">Completed</span>
                                            </td>
                                            <td>
                                                <i class='bx bx-sm bxs-file-archive' style="color:#526D82" ;></i>
                                            </td>
                                            <td style="width: 20%;">
                                                <i class='bx bx-md bxs-user-detail'></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-box clearfix">
                            <div class="table-responsive text-center">
                                <h2>TEAM TASK</h2>
                                <table class="table user-list">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><span>Employee Details</span></th>
                                            <th class="text-center"><span>Date</span></th>
                                            <th class="text-center"><span>Progress</span></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="emoplee-panel">
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                                    class="brand-image"> <a href="#" class="user-link">Lorem, ipsum.</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                2023/08/12
                                            </td>
                                            <td class="text-center">
                                                <div class="container-progress-bar">
                                                    <div class="skill">80%</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-todo">
                <div class="row">
                    <div class="col-md-4">
                        <div class="todo-list">
                            <h1>Todo List</h1>
                            <ul id="task-list" class="list-group">
                                <li class="list-group-item task">Task 1</li>
                                <li class="list-group-item task">Task 2</li>
                                <li class="list-group-item task">Task 3</li>
                                <li class="list-group-item task">Task 4</li>
                                <li class="list-group-item task">Task 5</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="graph-box">
                            <div id="charty"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="graph-box">
                            <div id="chartz"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="container-task">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2">
                        <div class="box">
                            <div class="col-sm">
                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt="AdminLTE Logo"
                                    class="team-image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box">
                            <div class="col-sm">
                                <a href="#" class="user-name">Lorem, ipsum.</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box">
                            <div class="col-sm">
                                <span>2023/08/12</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box">
                            <div class="col-sm">
                                <span class="designation">Member</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box">
                            <div class="col-sm">
                                <span class="label label-success">Active</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-between">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="user-image">
                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt=AdminLTE Logo"
                                    class="team-image">
                            </div>
                            <div class="user-name">
                                <a href="#" class="user-name">Lorem, ipsum.</a>
                            </div>
                            <div class="date-created">
                                <span> 2023/08/12</span>
                            </div>
                            <div class="position">
                                <span class="designation">Member</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="user-image">
                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt=AdminLTE Logo"
                                    class="team-image">
                            </div>
                            <div class="user-name">
                                <a href="#" class="user-name">Lorem, ipsum.</a>
                            </div>
                            <div class="date-created">
                                <span> 2023/08/12</span>
                            </div>
                            <div class="position">
                                <span class="designation">Member</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="user-image">
                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt=AdminLTE Logo"
                                    class="team-image">
                            </div>
                            <div class="user-name">
                                <a href="#" class="user-name">Lorem, ipsum.</a>
                            </div>
                            <div class="date-created">
                                <span> 2023/08/12</span>
                            </div>
                            <div class="position">
                                <span class="designation">Member</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="user-image">
                                <img src="<?= base_url() ?>assets/images/nobody.jpg" alt=AdminLTE Logo"
                                    class="team-image">
                            </div>
                            <div class="user-name">
                                <a href="#" class="user-name">Lorem, ipsum.</a>
                            </div>
                            <div class="date-created">
                                <span> 2023/08/12</span>
                            </div>
                            <div class="position">
                                <span class="designation">Member</span>
                            </div>
                        </div>
                    </div>
                </div>
             </div> -->

        </div>
    </section>

    <!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php $this->load->view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<script>
$(function() {
    $(".task").draggable({
        axis: "y",
        containment: "parent",
        cursor: "move",
        opacity: 0.7,
        revert: true,
        start: function(event, ui) {
            $(this).addClass("dragging");
        },
        stop: function(event, ui) {
            $(this).removeClass("dragging");
        }
    });

    $("#task-list").sortable({
        axis: "y",
        containment: "parent",
        cursor: "move",
        opacity: 0.7,
        revert: true,
        start: function(event, ui) {
            $(ui.item).addClass("dragging");
        },
        stop: function(event, ui) {
            $(ui.item).removeClass("dragging");
        }
    });

    $(".task").click(function() {
        $(this).toggleClass("completed-task");
    });
});
</script>


<script>
$(document).ready(function() {
    loadPage30sec();
    setInterval(loadPage30sec, 20000);
});
// auto refresh
function loadPage30sec() {
    $.ajax({
        type: "POST",
        url: '<?= base_url('admin/refresh/dashboard_data') ?>',
        success: function(returnVal) {
            var data = JSON.parse(returnVal);
            // new chat
            $(".newEnquery").removeClass("hidden");
            $(".newEnquery .notifData").text(data['newEnquery']);
        }
    });
};

// refresh
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
var options = {
    series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
    }, {
        name: 'series2',
        data: [11, 32, 45, 32, 34, 52, 41]
    }],
    chart: {
        height: 350,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
            "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
            "2018-09-19T06:30:00.000Z"
        ]
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>

<script>
var options = {
    series: [{
        name: 'Actual',
        data: [{
                x: '2011',
                y: 1292,
                goals: [{
                    name: 'Expected',
                    value: 1400,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2012',
                y: 4432,
                goals: [{
                    name: 'Expected',
                    value: 5400,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2013',
                y: 5423,
                goals: [{
                    name: 'Expected',
                    value: 5200,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2014',
                y: 6653,
                goals: [{
                    name: 'Expected',
                    value: 6500,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2015',
                y: 8133,
                goals: [{
                    name: 'Expected',
                    value: 6600,
                    strokeHeight: 13,
                    strokeWidth: 0,
                    strokeLineCap: 'round',
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2016',
                y: 7132,
                goals: [{
                    name: 'Expected',
                    value: 7500,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2017',
                y: 7332,
                goals: [{
                    name: 'Expected',
                    value: 8700,
                    strokeHeight: 5,
                    strokeColor: '#775DD0'
                }]
            },
            {
                x: '2018',
                y: 6553,
                goals: [{
                    name: 'Expected',
                    value: 7300,
                    strokeHeight: 2,
                    strokeDashArray: 2,
                    strokeColor: '#775DD0'
                }]
            }
        ]
    }],
    chart: {
        height: 350,
        type: 'bar'
    },
    plotOptions: {
        bar: {
            columnWidth: '60%'
        }
    },
    colors: ['#00E396'],
    dataLabels: {
        enabled: false
    },
    legend: {
        show: true,
        showForSingleSeries: true,
        customLegendItems: ['Actual', 'Expected'],
        markers: {
            fillColors: ['#00E396', '#775DD0']
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chartx"), options);
chart.render();
</script>

<script>
var options = {
    series: [67],
    chart: {
        height: 350,
        type: 'radialBar',
        offsetY: -10
    },
    plotOptions: {
        radialBar: {
            startAngle: -135,
            endAngle: 135,
            dataLabels: {
                name: {
                    fontSize: '16px',
                    color: undefined,
                    offsetY: 120
                },
                value: {
                    offsetY: 76,
                    fontSize: '22px',
                    color: undefined,
                    formatter: function(val) {
                        return val + "%";
                    }
                }
            }
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            shadeIntensity: 0.15,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 65, 91]
        },
    },
    stroke: {
        dashArray: 4
    },
    labels: ['Median Ratio'],
};

var chart = new ApexCharts(document.querySelector("#charty"), options);
chart.render();
</script>

<script>
var options = {
    series: [44, 55, 67, 83],
    chart: {
        height: 350,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Total',
                    formatter: function(w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 249
                    }
                }
            }
        }
    },
    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
};

var chart = new ApexCharts(document.querySelector("#chartz"), options);
chart.render();
</script>