<?php $this->load->view('header'); ?>
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
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e8e7fd;">
                    <a href='<?= base_url('admin/employee') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/users-icons.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalEmployee) && !empty($totalEmployee)) ? $totalEmployee : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">Total
                                    Employee
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f9f3cc99;">
                    <a href='<?= base_url('admin/employee?type=new_emp')?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/profile.png"
                                        style="width: 43px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalNewEmployee) && !empty($totalNewEmployee)) ? $totalNewEmployee : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;"><?= $this->config->item('emp_type')[5]?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#d4fde3;">
                    <a href='<?= base_url('admin/employee?type=v_emp') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/verify.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalVerify) && !empty($totalVerify))?$totalVerify:'0';?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;"><?= $this->config->item('emp_type')[1]?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f4dbda;">
                    <a href='<?= base_url('admin/employee?type=uv_emp') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets\images\cancel.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalUnVerify) && !empty($totalUnVerify)) ? $totalUnVerify : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                <?= $this->config->item('emp_type')[2]?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#d1eaf9 ;">
                    <a href='<?= base_url('admin/employee?type=uv_emp') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="   https://cdn-icons-png.flaticon.com/512/2942/2942821.png "
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalUnVerify) && !empty($totalUnVerify)) ? $totalUnVerify : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                <?= $this->config->item('emp_type')[3]?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e3e3e3;">
                    <a href='<?= base_url('admin/employee?type=uv_emp') ?>'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="https://cdn-icons-png.flaticon.com/512/7544/7544788.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalUnVerify) && !empty($totalUnVerify)) ? $totalUnVerify : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                <?= $this->config->item('emp_type')[4]?></p>
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
            <div class="tab-pane fade active show" id="Employee-list" role="tabpanel">
                <div class="card p-0">
                    <div class="card-body">
                        <div class="container-fluid ">

                            <div class="row mb-2 card-header fvgfb"  >

                                <div class="col-sm-6 col-md-6">
                                    <div class=" ">
                                        <h3 class="card-title font-weight-bold"><img
                                                src="<?= base_url()?>assets/images/users-icons.png"
                                                style="width: 30px;" alt="">
                                            Employees List</h3>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="header-action " style="float:right;">
                                        <a href="<?= base_url()?>admin/employee/add" title="Add Leave Form">
                                            <button type="button" class="btn add_btn"><img
                                                    src="https://cdn-icons-png.flaticon.com/512/863/863823.png"
                                                    style="width: 20px;margin-top: -6px;" alt="">
                                                Add New Emplyoee</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="background-color:#ededed;">
                            <!-- <table id="myTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0"> -->
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0"
                                style="width:100%;">
                                <thead>
                                    <tr class='mt-5 table-heading'>
                                        <th class="customth">Employee</th>
                                        <th class="customth">Name</th>
                                        <th class="customth">EMP Id</th>
                                        <th class="customth">Phone</th>
                                        <th class="customth">Email</th>
                                        <th class="customth">Department</th>
                                        <th class="customth">Status</th>
                                        <th class="customth">Join Date</th>
                                        <th class="customth">Designation</th>
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
        var confirmation = confirm(
            "Are you sure to delete this employee ?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: hitURL,
                data: {
                    id: tableId
                }, // serializes the form's elements.
                success: function(data) {
                    currentRow.parents('tr').remove();
                    if (data.status = true) {} else if (data
                        .status = false) {
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