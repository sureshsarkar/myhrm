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
            <div class="col-lg-3 col-md-3">
                <div class="card cardData p-2 border-0" style="background-color:#e8e7fd;">
                    <a href='<?= base_url()?>admin/payroll/allattendance?type=this_month_a'>
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
            <div class="col-lg-3 col-md-3">
                <div class="card cardData p-2 border-0" style="background-color:#f9f3cc99;">
                    <a href='<?= base_url()?>admin/payroll/allattendance?type=last_month_a'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/lastmonth.png"
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

            <div class="col-lg-3 col-md-3">
                <div class="card cardData p-2 border-0" style="background-color:#d4fde3;">
                    <a href='<?= base_url()?>admin/payroll/salary?type=last_month_s'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url()?>assets/images/rupee.png"
                                        style="width: 45px; height: 45px;" alt="">
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

            <div class="col-lg-3 col-md-3">
                <div class="card cardData p-2 border-0" style="background-color:#f4dbda;">
                    <a href='<?= base_url()?>admin/payroll/salary?type=this_year_s'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/get-money.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($thisYearSalary) && !empty($thisYearSalary)) ? $thisYearSalary : "0" ?>
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
            <div class="tab-pane fade active show" id="Employee-list" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold" style="color:#1a5089;"><img src="<?= base_url()?>assets/images/users-icons.png" style="width: 25px;" alt=""> Employee List</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th class="customth">S.N</th>
                                        <th class="customth">Employee</th>
                                        <th class="customth">Email</th>
                                        <th class="customth">Mobile</th>
                                        <th class="customth">Department</th>
                                        <th class="customth">Designation</th>
                                        <th class="customth">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($employee) && !empty($employee)) {
                                        foreach ($employee as $k => $v) {
                                            if (isset($v->profile_image) && !empty($v->profile_image)) {
                                                $profile_image = '<img src="' . base_url() . $v->profile_image . '" alt="" style="width:30px;height:30px;border-radius:50%;">';
                                            } else {
                                                $profile_image = "";
                                            }
                                            ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $k + 1; ?>
                                        </th>
                                        <td><a href="<?= base_url() ?>admin/payroll/addattendance?emp_id=<?= $v->id ?>">
                                                <?= $profile_image . ' ' . $v->fname . ' ' . $v->lname ?>
                                            </a></td>
                                        <td>
                                            <?= $v->email ?>
                                        </td>
                                        <td>
                                            <?= $v->phone ?>
                                        </td>
                                        <td>
                                        <?= $this->config->item('department')[$v->department]?>
                                        </td>
                                        <td>
                                            <?= $v->role ?>
                                        </td>
                                        <td>
                                            <a href=" <?= base_url() ?>admin/payroll/addattendance?emp_id=<?= $v->id ?>"
                                                title="View Attendance Sheet">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="7">No Data Found</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('footer'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

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

            "url": "<?php echo site_url('admin/employee/ajax_list') ?>" + type,

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
        hitURL = "<?php echo base_url() ?>admin/employee/delete";
        var confirmation = confirm("Are you sure to delete this employee ?");
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