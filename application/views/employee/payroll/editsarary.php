<?php $this->load->view('header'); ?>

<style>
.label-text {
    color: #1a5089;
}
</style>

<div class="section-body">
    <div class="container-fluid">
        <!-- Add attendance Modal start -->
        <div class="modal-content card">
            <div class="row m-0 card-header fvgfb">
                <div class="col-sm-6 col-md-6">
                    <div class=" ">
                        <h3 class="card-title font-weight-bold">
                            <img src="<?= base_url()?>assets/images/money.png" style="width: 30px;"
                                alt=""> Edit Salary Slip
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header-action " style="float:right;">
                        <a href="<?= base_url()?>admin/payroll/salary" title="Add Leave Form">
                            <button type="button" class="btn add_btn"><img
                                    src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                    style="width: 20px;margin-top: -6px;" alt="">Back</button>
                        </a>
                    </div>
                </div>
            </div>
            <form action="<?= base_url() ?>admin/payroll/updatesarary" method="post">
                <input type="hidden" name="id" value="<?= $edit_data->id;?>">
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
                                                <select class="form-select mb-3 form-control"
                                                    name="employee_id" id="employee_id" required>
                                                    <option>Select Employee</option>
                                                    <?php if (isset($employee) && !empty($employee)) {
                                                        foreach ($employee as $k => $v) {
                                                            ?>
                                                    <option value="<?= $v->id ?>"
                                                        <?php if($v->id == $edit_data->emp_id) echo 'selected';?>>
                                                        <?= ucwords($v->fname . ' ' . $v->fname)?>
                                                    </option>
                                                    <?php }
                                                    
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="month" class="form-label label-text">Salary Month*
                                                    <select class="form-select mb-3 mt-2 form-control"
                                                        name="month" required>
                                                        <option>Select Month</option>
                                                        <option value="January"
                                                            <?php if($edit_data->month =='January') echo 'selected';?>>
                                                            January</option>
                                                        <option value="February"
                                                            <?php if($edit_data->month =='February') echo 'selected';?>>
                                                            February</option>
                                                        <option value="March"
                                                            <?php if($edit_data->month =='March') echo 'selected';?>>
                                                            March</option>
                                                        <option value="April"
                                                            <?php if($edit_data->month =='April') echo 'selected';?>>
                                                            April</option>
                                                        <option value="May"
                                                            <?php if($edit_data->month =='May') echo 'selected';?>>May
                                                        </option>
                                                        <option value="June"
                                                            <?php if($edit_data->month =='June') echo 'selected';?>>June
                                                        </option>
                                                        <option value="July"
                                                            <?php if($edit_data->month =='July') echo 'selected';?>>July
                                                        </option>
                                                        <option value="August"
                                                            <?php if($edit_data->month =='August') echo 'selected';?>>
                                                            August</option>
                                                        <option value="September"
                                                            <?php if($edit_data->month =='September') echo 'selected';?>>
                                                            September</option>
                                                        <option value="October"
                                                            <?php if($edit_data->month =='October') echo 'selected';?>>
                                                            October</option>
                                                        <option value="November"
                                                            <?php if($edit_data->month =='November') echo 'selected';?>>
                                                            November</option>
                                                        <option value="December"
                                                            <?php if($edit_data->month =='December') echo 'selected';?>>
                                                            December</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="year" class="form-label label-text">Salary Year*
                                                    <select class="form-select mb-3 mt-2 form-control"
                                                        name="year" required>
                                                        <option>Select Year</option>
                                                        <option value="2023"
                                                            <?php if($edit_data->year =='2023') echo 'selected';?>>2023
                                                        </option>
                                                        <option value="2024"
                                                            <?php if($edit_data->year =='2024') echo 'selected';?>>2024
                                                        </option>
                                                        <option value="2025"
                                                            <?php if($edit_data->year =='2025') echo 'selected';?>>2025
                                                        </option>
                                                        <option value="2026"
                                                            <?php if($edit_data->year =='2026') echo 'selected';?>>2026
                                                        </option>
                                                        <option value="2027"
                                                            <?php if($edit_data->year =='2027') echo 'selected';?>>2027
                                                        </option>
                                                        <option value="2028"
                                                            <?php if($edit_data->year =='2028') echo 'selected';?>>2028
                                                        </option>
                                                        <option value="2029"
                                                            <?php if($edit_data->year =='2029') echo 'selected';?>>2029
                                                        </option>
                                                        <option value="2030"
                                                            <?php if($edit_data->year =='2030') echo 'selected';?>>2030
                                                        </option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="days_in_month" class="form-label label-text">Days In
                                                    Month*</label>
                                                <input type="text" class="form-control" id="days_in_month"
                                                    name="days_in_month" value="<?= $edit_data->days_in_month?>"
                                                    placeholder="Days In Month" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="attendance_in_days" class="form-label label-text">Attendance
                                                    In Days*</label>
                                                <input type="text" class="form-control" id="attendance_in_days"
                                                    name="attendance_in_days" value="<?= $edit_data->days_in_month?>"
                                                    placeholder="Attendance In Days" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="late_mark" class="form-label label-text">No Of Late
                                                    Marks:</label>
                                                <input type="text" class="form-control" id="late_mark" name="late_mark"
                                                    placeholder="No Of Late Marks"
                                                    value="<?= $edit_data->days_in_month?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="casual_leave" class="form-label label-text">No Of
                                                    Casual Leave:</label>
                                                <input type="text" class="form-control" id="casual_leave"
                                                    name="casual_leave" placeholder="No Of Casual Leave"
                                                    value="<?= $edit_data->days_in_month?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-12">
                                            <div class="mb-3">
                                                <label for="paid_leave" class="form-label label-text">No Of Paid
                                                    Leaves:</label>
                                                <input type="text" class="form-control" id="paid_leave"
                                                    name="paid_leave" placeholder="No Of Paid Leaves"
                                                    value="<?= $edit_data->days_in_month?>">
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
                                                <label for="basic" class="form-label label-text">Basic
                                                    Salary*</label>
                                                <input type="number" class="form-control basic" name="basic"
                                                    value="<?= $edit_data->basic ?>" placeholder="Basic Salary"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hra" class="form-label label-text">HRA*</label>
                                                <input type="number" class="form-control hra" name="hra"
                                                    value="<?= $edit_data->hra?>" placeholder="HRA Salary" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="conveyance_allowance"
                                                    class="form-label label-text">Conveyance Allowance:</label>
                                                <input type="number" class="form-control conveyance_allowance"
                                                    name="conveyance_allowance"
                                                    value="<?= $edit_data->conveyance_allowance?>"
                                                    placeholder="Conveyance Allowance">
                                            </div>

                                            <div class="mb-3">
                                                <label for="special_allowance" class="form-label label-text">Special
                                                    Allowance:</label>
                                                <input type="number" class="form-control special_allowance"
                                                    name="special_allowance" value="<?= $edit_data->special_allowance?>"
                                                    placeholder="Special Allowance">
                                            </div>

                                            <div class="mb-3">
                                                <label for="compensation"
                                                    class="form-label label-text">Compensation:</label>
                                                <input type="number" class="form-control compensation"
                                                    name="compensation" value="<?= $edit_data->compensation?>"
                                                    placeholder="Compensation">
                                            </div>

                                            <div class="mb-3">
                                                <label for="incentive" class="form-label label-text">Incentive:</label>
                                                <input type="number" class="form-control incentive" name="incentive"
                                                    value="<?= $edit_data->incentive?>" placeholder="Incentive">
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
                                                    value="<?= $edit_data->tds?>" placeholder="TDS">
                                            </div>

                                            <div class="mb-3">
                                                <label for="pf_amount" class="form-label label-text">
                                                    PF:</label>
                                                <input type="number" class="form-control pf_amount" name="pf_amount"
                                                    value="<?= $edit_data->pf_amount?>" placeholder="PF Amount">
                                            </div>

                                            <div class="mb-3">
                                                <label for="esi" class="form-label label-text"> ESI:</label>
                                                <input type="number" class="form-control esi" name="esi"
                                                    value="<?= $edit_data->esi?>" placeholder="ESI">
                                            </div>

                                            <div class="mb-3">
                                                <label for="salary_advance" class="form-label label-text">Salary
                                                    Advance:</label>
                                                <input type="number" class="form-control salary_advance"
                                                    name="salary_advance" value="<?= $edit_data->salary_advance?>"
                                                    placeholder="Salary Advance">
                                            </div>



                                            <div class="mb-3">
                                                <label for="late_mark" class="form-label label-text">Late Marks
                                                    Amount:</label>
                                                <input type="number" class="form-control late_mark_amount"
                                                    name="late_mark_amount" value="<?= $edit_data->late_mark_amount?>"
                                                    placeholder="Late Marks Amount">
                                            </div>

                                            <div class="mb-3">
                                                <label for="casual_leave_amount" class="form-label label-text">Casual
                                                    Leave Amount</label>
                                                <input type="number" class="form-control casual_leave_amount"
                                                    name="casual_leave_amount"
                                                    value="<?= $edit_data->casual_leave_amount?>"
                                                    placeholder="Casual Leave Amount">
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
                                                    name="total_earning" value="<?= $edit_data->total_earning?>"
                                                    placeholder="Total Earning" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="total_deduction" class="form-label label-text">
                                                    TOTAL DEDUCTION</label>
                                                <input type="text" class="form-control total_deduction"
                                                    name="total_deduction" value="<?= $edit_data->total_deduction?>"
                                                    placeholder="Total Deduction">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="net_salary" class="form-label label-text">NET SALARY
                                                    PAYABLE*</label>
                                                <input type="text" class="form-control net_salary" name="net_salary"
                                                    value="<?= $edit_data->net_salary?>"
                                                    placeholder="Net Salary Payable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>

    <!-- Add attendance Modal end -->



</div>



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
        hitURL = "<?php echo base_url() ?>admin/payroll/delete";
        var confirmation = confirm("Are you sure to delete this payroll ?");
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