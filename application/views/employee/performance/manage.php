<div class="section-body">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4"><br>
                    <h4 class="text-uppercase"><b>Improved performance experience and productivity with TCHRMS.</b></h4>
                    <small class="text-muted"><b>TCHRMS</b> helps you build an environment of efficiency, transparency
                        and trust where performances have easy digital access to all necessary people, processes,
                        information and documents.<br></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e8e7fd;">
                    <a href='<?= base_url('employee/performance?type=this') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/users-icons.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($thisMonthPerformance) && !empty($thisMonthPerformance)) ? $thisMonthPerformance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    This Month Performance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f9f3cc99;">
                    <a href='<?= base_url('employee/performance?type=last')?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/profile.png"
                                        style="width: 43px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($lastMonthPerformance) && !empty($lastMonthPerformance)) ? $lastMonthPerformance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">Last Month
                                    Performance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#d4fde3;">
                    <a href='<?= base_url('employee/performance?type=last12') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/verify.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($last12MonthPerformance) && !empty($last12MonthPerformance))?$last12MonthPerformance:'0';?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">1 Year
                                    Performance</p>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
            <div class="col-lg-3 col-md-6">

                <div class="card cardData p-2 border-0" style="background-color:#f4dbda;">
                    <a href='<?= base_url('employee/performance') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets\images\cancel.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalEmployeePerformance) && !empty($totalEmployeePerformance)) ? $totalEmployeePerformance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Total Performance</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="Performance-list" role="tabpanel">
                <div class="card p-0">
                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row mb-2 card-header fvgfb">
                                <div class="col-sm-6 col-md-6">
                                    <h3 class="card-title font-weight-bold"><img
                                            src="<?= base_url()?>assets/images/users-icons.png" style="width: 30px;"
                                            alt="">
                                        Performances List</h3>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="header-action" style="float:right;">
                                        <div class="dropdown add_btn btn">
                                            <div class="dropdown-toggle" title="View Lead By Filter" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">FILTER </div>

                                            <div class="dropdown-menu leads " aria-labelledby="dropdownMenuButton">
                                                <ul>
                                                    <li class="clickCase" data-value="all">All</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="#" title="Add Your Monthly Performance Report" data-toggle="modal" data-target="#leaveFormApprovalModal">
                                            <button type="button" class="btn add_btn">
                                                <img src="https://cdn-icons-png.flaticon.com/512/863/863823.png" style="width: 20px;margin-top: -6px;" alt="">
                                                Add Performance</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" style="background-color:#ededed;">
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0"
                                style="width:100%;">
                                <thead>
                                    <tr class='mt-5 table-heading'>
                                        <th class="customth">Document</th>
                                        <th class="customth">Employee Name</th>
                                        <th class="customth">Employee Code</th>
                                        <th class="customth">Rating</th>
                                        <th class="customth">Month</th>
                                        <th class="customth">Created</th>
                                        <th class="customth">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal show" id="leaveFormApprovalModal" data-target="#leaveFormApprovalModal" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modelWid">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="leaveFormApprovalModalTitle"> Performance Form
                </h5>
                <button type="button" class="close text-primary " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url()?>employee/performance/add" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="border-calendera ">
                        <div class="attendancesheet">
                            <div class="card shadow-md border">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-12">
                                        <label for="employee" class="form-label label-text">Select Month*</label>
                                        <select name="month" class="form-control">
                                            <option>Select Month</option>
                                            <?php for ($i=0; $i <=11; $i++) {?>
                                            <option value="<?= date('F',strtotime(date('F') . ' +'.$i.' month'))?>">
                                                <?= date('F',strtotime(date('F') . ' +'.$i.' month'))?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-md border">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="file" class="form-label label-text">Document*</label>
                                        <input type="file" class="form-control" name="document" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
var table;

$(document).ready(function() {

    //datatables
    var type = "<?php echo isset($_GET['type']) ? '?type=' . $_GET['type'] : '' ?>";

    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?php echo site_url('employee/performance/ajax_list') ?>" + type,

            "type": "POST"

        },

        //Set column definition initialisation properties.

        "columnDefs": [

            {

                "targets": [0], //first column / numbering column

                "orderable": false, //set not orderable

            },

        ],

    });

});
</script>