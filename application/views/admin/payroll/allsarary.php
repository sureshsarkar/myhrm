<?php $this->load->view('header'); ?>

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

.label-text {
    color: #1a5089;
}

.modal-header .close,
.modal-header .mailbox-attachment-close {
    /* padding: 1rem; */
    margin: -1rem -1rem -1rem auto;
    padding-right: 10px;
    font-size: 25px;
    padding-top: 5px;
}

@media (min-width: 768px) {
    .modelWid {
        max-width: 800px !important;
        margin: 1.75rem auto;

    }
}
</style>

<div class="section-body">
    <div class="container-fluid">
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
                <div class="card cardData p-2 border-0" style="background-color:#cef3d3ab;">
                    <a href='<?= base_url()?>admin/payroll/salary'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/money.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalSalary) && !empty($totalSalary)) ? $totalSalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Total Salary
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href='<?= base_url()?>admin/payroll/salary?type=this_month_s'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/get-money.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($thisMonthSalary) && !empty($thisMonthSalary)) ? $thisMonthSalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    This Month Salary
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#fde7fc;">
                    <a href='<?= base_url()?>admin/payroll/salary?type=last_month_s'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/salary.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($lastMonthSalary) && !empty($lastMonthSalary)) ? $lastMonthSalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Last Month Salary
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card cardData p-2 border-0" style="background-color:#e3e3e3;">
                    <a href='<?= base_url()?>admin/payroll/salary?type=last_12month_s'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/rupee.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($last12MonthSalary) && !empty($last12MonthSalary)) ? $last12MonthSalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Last 12 Month Salary
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
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="payroll-list" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title flex-grow-1"><img src="<?= base_url()?>assets/images/get-money.png"
                                style="width: 25px;" alt="">Salary Management</h3>
                        <a href="#" title="Create Salary Slip">
                            <button type="button" class="btn add_btn" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="bi bi-plus fa-1x"></i>Create
                            </button>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- <table id="myTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0"> -->
                            <table id="example" class="table table-light table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="customth">Employee</th>
                                        <th class="customth">Month</th>
                                        <th class="customth">Total Earning</th>
                                        <th class="customth">Total Deduction</th>
                                        <th class="customth">Net Salary</th>
                                        <th class="customth">Status</th>
                                        <th class="customth">Created</th>
                                        <th class="customth">Salary Slip</th>
                                        <th class="customth">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="m-0 p-0">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Salary Modal start -->
<div class="modal" id="staticBackdrop" id="exampleModalLong" data-target="#exampleModalLong" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modelWid">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> <i
                        class="bi bi-wallet2 text-info"></i> Create Salary Slip <i class="bi bi-arrow-right "></i>
                </h5>
                <button type="button" class="close text-primary " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="<?= base_url() ?>admin/payroll/addsalary" method="post">
                <?php $Date = date("Y-m-00"); ?>

                <div class="modal-body">
                    <div class="border-calendera ">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="attendancesheet">
                                <div class="card shadow-md border">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="employee" class="form-label label-text">
                                                    Employee Name*</label>
                                                <select class="form-select mb-3 form-control" name="employee_id"
                                                    id="employee_id" required>
                                                    <option>Select Employee</option>
                                                    <?php if (isset($employee) && !empty($employee)) {
                                                        foreach ($employee as $k => $v) {
                                                            ?>
                                                    <option value="<?= $v->id ?>">
                                                        <?= ucwords($v->fname . ' ' . $v->lname) ?>
                                                    </option>
                                                    <?php }

                                                    } ?>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="month" class="form-label label-text">Salary Month*
                                                    <select class="form-select mb-3 mt-2 form-control" name="month"
                                                        required>
                                                        <option>Select Month</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="year" class="form-label label-text">Salary Year*
                                                    <select class="form-select mb-3 mt-2 form-control" name="year"
                                                        required>
                                                        <option>Select Year</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="days_in_month" class="form-label label-text">Days In
                                                    Month*</label>
                                                <input type="text" class="form-control" id="days_in_month"
                                                    name="days_in_month" placeholder="Days In Month" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="attendance_in_days" class="form-label label-text">Attendance
                                                    In Days*</label>
                                                <input type="text" class="form-control" id="attendance_in_days"
                                                    name="attendance_in_days" placeholder="Attendance In Days" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="late_mark" class="form-label label-text">No Of Late
                                                    Marks:</label>
                                                <input type="text" class="form-control" id="late_mark" name="late_mark"
                                                    placeholder="No Of Late Marks">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="casual_leave" class="form-label label-text">No Of Casual
                                                    Leave:</label>
                                                <input type="text" class="form-control" id="casual_leave"
                                                    name="casual_leave" placeholder="No Of Casual Leave">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="paid_leave" class="form-label label-text">No Of Paid
                                                    Leaves:</label>
                                                <input type="text" class="form-control" id="paid_leave"
                                                    name="paid_leave" placeholder="No Of Paid Leaves">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h6 class='font-weight-bold text-center'>EARNINGS <i class="bi bi-arrow-right">
                                            </i>
                                        </h6>
                                        <div class="card shadow-md border">
                                            <div class="mb-3">
                                                <label for="basic" class="form-label label-text">Basic Salary*</label>
                                                <input type="number" class="form-control basic" name="basic"
                                                    placeholder="Basic Salary" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hra" class="form-label label-text">HRA*</label>
                                                <input type="number" class="form-control hra" name="hra"
                                                    placeholder="HRA Salary" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="conveyance_allowance"
                                                    class="form-label label-text">Conveyance Allowance:</label>
                                                <input type="number" class="form-control conveyance_allowance"
                                                    name="conveyance_allowance" placeholder="Conveyance Allowance">
                                            </div>

                                            <div class="mb-3">
                                                <label for="special_allowance" class="form-label label-text">Special
                                                    Allowance:</label>
                                                <input type="number" class="form-control special_allowance"
                                                    name="special_allowance" placeholder="Special Allowance">
                                            </div>

                                            <div class="mb-3">
                                                <label for="compensation"
                                                    class="form-label label-text">Compensation:</label>
                                                <input type="number" class="form-control compensation"
                                                    name="compensation" placeholder="Compensation">
                                            </div>

                                            <div class="mb-3">
                                                <label for="incentive" class="form-label label-text">Incentive:</label>
                                                <input type="number" class="form-control incentive" name="incentive"
                                                    placeholder="Incentive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class='font-weight-bold text-center'>DEDUCTIONS <i
                                                class="bi bi-arrow-right"></i></h6>
                                        <div class="card shadow-md border">
                                            <div class="mb-3">
                                                <label for="tds" class="form-label label-text">TDS:</label>
                                                <input type="number" class="form-control tds" name="tds"
                                                    placeholder="TDS">
                                            </div>

                                            <div class="mb-3">
                                                <label for="pf_amount" class="form-label label-text"> PF:</label>
                                                <input type="number" class="form-control pf_amount" name="pf_amount"
                                                    placeholder="PF Amount">
                                            </div>

                                            <div class="mb-3">
                                                <label for="esi" class="form-label label-text"> ESI:</label>
                                                <input type="number" class="form-control esi" name="esi"
                                                    placeholder="ESI">
                                            </div>

                                            <div class="mb-3">
                                                <label for="salary_advance" class="form-label label-text">Salary
                                                    Advance:</label>
                                                <input type="number" class="form-control salary_advance"
                                                    name="salary_advance" placeholder="Salary Advance">
                                            </div>



                                            <div class="mb-3">
                                                <label for="late_mark" class="form-label label-text">Late Marks
                                                    Amount:</label>
                                                <input type="number" class="form-control late_mark_amount"
                                                    name="late_mark_amount" placeholder="Late Marks Amount">
                                            </div>

                                            <div class="mb-3">
                                                <label for="casual_leave_amount" class="form-label label-text">Casual
                                                    Leave Amount</label>
                                                <input type="number" class="form-control casual_leave_amount"
                                                    name="casual_leave_amount" placeholder="Casual Leave Amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card shadow-md border">
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="mb-3">
                                                <label for="total_earning" class="form-label label-text">TOTAL
                                                    EARNINGS*</label>
                                                <input type="text" class="form-control total_earning"
                                                    name="total_earning" placeholder="Total Earning" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="total_deduction" class="form-label label-text"> TOTAL
                                                    DEDUCTION</label>
                                                <input type="text" class="form-control total_deduction"
                                                    name="total_deduction" placeholder="Total Deduction">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="net_salary" class="form-label label-text">NET SALARY
                                                    PAYABLE*</label>
                                                <input type="text" class="form-control net_salary" name="net_salary"
                                                    placeholder="Net Salary Payable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Salary Modal end -->



<?php $this->load->view('footer'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>



<script>
$(document).ready(function() {
    $(".basic, .hra, .conveyance_allowance, .special_allowance, .compensation, .incentive, .tds, .pf_amount, .esi, .salary_advance, .late_mark_amount, .casual_leave_amount")
        .keyup(function() {
            let basic = $(".basic").val();
            let hra = $(".hra").val();
            let conveyance_allowance = $(".conveyance_allowance").val();
            let special_allowance = $(".special_allowance").val();
            let compensation = $(".compensation").val();
            let incentive = $(".incentive").val();
            let tds = $(".tds").val();
            let pf_amount = $(".pf_amount").val();
            let esi = $(".esi").val();
            let salary_advance = $(".salary_advance").val();
            let late_mark_amount = $(".late_mark_amount").val();
            let casual_leave_amount = $(".casual_leave_amount").val();
            if (basic == "") {
                basic = 0;
            }
            if (hra == "") {
                hra = 0;
            }
            if (conveyance_allowance == "") {
                conveyance_allowance = 0;
            }
            if (special_allowance == "") {
                special_allowance = 0;
            }
            if (compensation == "") {
                compensation = 0;
            }
            if (incentive == "") {
                incentive = 0;
            }
            if (tds == "") {
                tds = 0;
            }
            if (pf_amount == "") {
                pf_amount = 0;
            }
            if (esi == "") {
                esi = 0;
            }
            if (salary_advance == "") {
                salary_advance = 0;
            }
            if (late_mark_amount == "") {
                late_mark_amount = 0;
            }
            if (casual_leave_amount == "") {
                casual_leave_amount = 0;
            }


            let totalAmount = 0;
            let totalDeduction = 0;
            let netSary = 0;
            totalAmount = parseInt(basic) + parseInt(hra) + parseInt(conveyance_allowance) + parseInt(
                special_allowance) + parseInt(compensation) + parseInt(incentive);
            totalDeduction = parseInt(tds) + parseInt(pf_amount) + parseInt(esi) + parseInt(
                salary_advance) + parseInt(late_mark_amount) + parseInt(casual_leave_amount);

            if (totalAmount != "") {
                $(".total_earning").val(totalAmount);
            }

            if (totalDeduction != "") {
                $(".total_deduction").val(totalDeduction);
            }
            netSary = totalAmount - totalDeduction;
            if (netSary != "") {
                $(".net_salary").val(netSary);
            }
            // console.log(totalAmount+" "+totalDeduction);
        });
})
</script>



<script type="text/javascript">
var table;
$(document).ready(function() {
    // return fales;
    //datatables
    var type = "<?php echo isset($_GET['type']) ? '?type=' . $_GET['type'] : '' ?>";

    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?php echo site_url('admin/payroll/all_salary_list') ?>" + type,

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


<!-- Delete Script-->
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(document).on("click", ".deletebtn", function() {
        var tableId = $(this).attr("data_id");
        currentRow = $(this);
        hitURL = "<?php echo base_url() ?>admin/payroll/deleteSalary";
        var confirmation = confirm("Are you sure to delete this Salary Data?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: hitURL,
                data: {
                    id: tableId
                }, // serializes the form's elements.
                success: function(data) {
                    currentRow.parents('tr').remove();
                    if (data.status = true) {} else if (data.status = false) {
                        alert("deletion failed");
                    } else {
                        alert("Access denied..!");
                    }
                }
            });
        }
    });
});
</script>

<!-- Delete Script-->
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(document).on("click", ".downloadSlip", function() {
        var tableId = $(this).attr("data_id");

        hitURL = "<?php echo base_url() ?>admin/payroll/downloadSlip?id=" + tableId;
        var confirmation = confirm("Are you sure to Download the Salary Slip ?");
        if (confirmation) {
            window.location.replace(hitURL);
        }
    });
});
</script>