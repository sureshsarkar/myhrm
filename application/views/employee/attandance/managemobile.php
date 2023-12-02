
<style>
.dataTables_filter input {
    border: 2px solid #949393;
}

.dataTables_filter label {
    color: #949393;
}

.cardData {
    height: 137px;
}
</style>

<div class="section-body">
    <div class="container-fluid px-0">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4"><br>
                    <h4 class="text-uppercase"><b>Improved employee experience and productivity with TCHRMS.</b></h4>
                    <small class="text-muted"><b>TCHRMS</b> helps you build an environment of efficiency, transparency
                        and trust where employees have easy digital access to all necessary people, processes,
                        information and documents.<br></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href='<?= base_url() ?>employee/attendance?type=this_month_a'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/month.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($thisMonthAttendance) && !empty($thisMonthAttendance)) ? $thisMonthAttendance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    This Month Attendance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#cef3d3ab   ;">
                    <a href='<?= base_url() ?>employee/attendance?type=last_month_a'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/leave.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($lastMonthAttendance) && !empty($lastMonthAttendance)) ? $lastMonthAttendance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Last Month Attendance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e3e3e3;">
                    <a href='<?= base_url() ?>employee/attendance'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/dates.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalAttendance) && !empty($totalAttendance)) ? $totalAttendance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Total Attendance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body">
    <div class="container-fluid px-0">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="payroll-list" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title flex-grow-1"><img src="<?= base_url()?>assets/images/leave.png"
                                style="width: 25px;" alt="">Attendance Management</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped w-100">
                                <thead>
                                    <tr>
                                        <th class="customth">Employee</th>
                                        <th class="customth">Phone</th>
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


<!-- Add attendance Modal start -->
<div class="modal show" id="staticBackdrop" id="exampleModalLong" data-target="#exampleModalLong" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modelWid">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> <i
                        class="bi bi-wallet2 text-info"></i> Add Attendance Sheet <i class="bi bi-arrow-right "></i>
                </h5>
                <a href="<?= base_url()?>assets/images/attendance-sheet-format.xlsx" download="">
                    <button class="btn-primary badge">Download Format <i class="bi bi-download"></i></button>
                </a>
                <button type="button" class="close text-primary " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>admin/payroll/uploadAttandance" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="border-calendera ">
                        <div class="attendancesheet">
                            <div class="card shadow-md border">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-12">
                                        <label for="employee" class="form-label label-text">
                                            Employee Name*</label>
                                        <select class="form-control" name="employee_id" id="employee_id" required>
                                            <option>Select Employee</option>
                                            <?php if (isset($employee) && !empty($employee)) {
                                                        foreach ($employee as $k => $v) {
                                                            ?>
                                            <option value="<?= $v->id ?>">
                                                <?= ucwords($v->fname . ' ' . $v->fname) ?>
                                            </option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-md border">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="file" class="form-label label-text">Choose Attendance Sheet*</label>
                                        <input type="file" class="form-control" name="attendance_sheet"
                                            placeholder="Total Earning" required>
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
<!-- Add attendance Modal end -->

<script type="text/javascript">
var table;

$(document).ready(function() {

    // alert();
    //datatables
    var type = "<?php echo isset($_GET['type']) ? '?type=' . $_GET['type'] : '' ?>";

    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?= base_url('employee/attendance/mobile_ajax_list') ?>" + type,

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
