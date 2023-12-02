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
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e8e7fd;">
                    <a href="<?= base_url()?>admin/leavemanagement">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/512/914/914612.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalLeave) && !empty($totalLeave))?$totalLeave:0;?></h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">Total
                                    Leaves
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f9f3cc99;">
                    <a href="<?= base_url()?>admin/leavemanagement?type=seo">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3579/3579143.png"
                                        style="width: 43px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($seoLeave) && !empty($seoLeave))?$seoLeave:0;?></h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">SEO Leaves
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#d4fde3;">
                    <a href="<?= base_url()?>admin/leavemanagement?type=dev">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3242/3242257.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalDeveloperLeave) && !empty($totalDeveloperLeave))?$totalDeveloperLeave:0;?>
                                </h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">Developers
                                    Leave</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f4dbda;">
                    <a href="<?= base_url()?>admin/leavemanagement?type=design">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3270/3270932.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalDesignerLeave) && !empty($totalDesignerLeave))?$totalDesignerLeave:0;?>
                                </h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">Designer's
                                    Leave</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#d1eaf9 ;">
                    <a href="<?= base_url()?>admin/leavemanagement?type=hr">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/128/7966/7966941.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalHrLeave) && !empty($totalHrLeave))?$totalHrLeave:0;?></h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">HR's Leave
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#e3e3e3;">
                    <a href="<?= base_url()?>admin/leavemanagement?type=a">
                        <div class="card-body p-0">
                            <div>
                                <div class="text-center mt-3">
                                    <img src="https://cdn-icons-png.flaticon.com/128/1552/1552545.png"
                                        style="width: 40px; height: 40px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalAccountantLeave) && !empty($totalAccountantLeave))?$totalAccountantLeave:0;?>
                                </h5>
                                <p class="font-weight-bold text-muted text-center" style="font-size:12px;">Accountant's
                                    Leave</p>
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
            <div class="tab-pane fade active show" id="leavemanagement-list" role="tabpanel">
                <div class="card">
                    <div class="container-fluid">
                        <div class="row mb-2 card-header fvgfb">
                            <div class="col-sm-8 col-md-8">
                                <div class="d-flex">
                                    <h3 class="card-title font-weight-bold pr-2">
                                        <img src="<?= base_url()?>assets/images/users-icons.png" style="width: 30px;">
                                        Leave Management List
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="header-action" style="float:right;">
                                    <div class="dropdown add_btn btn">
                                        <div class="dropdown-toggle" title="View Lead By Filter" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">FILTER </div>

                                        <div class="dropdown-menu leads " aria-labelledby="dropdownMenuButton">
                                            <ul>
                                                <li class="clickCase" data-value="all">All</li>
                                                <li class="clickCase" data-value="sick">Sick Leave</li>
                                                <li class="clickCase" data-value="priv">Privilege Leave</li>
                                                <li class="clickCase" data-value="wfh">WFH</li>
                                                <li class="clickCase" data-value="casual">Casual Leave</li>
                                                <li class="clickCase" data-value="1">Today</li>
                                                <li class="clickCase" data-value="7">Weekly</li>
                                                <li class="clickCase" data-value="30">Monthly</li>
                                                <li class="clickCase" data-value="365">Yearly</li>
                                                <li class="clickCase" data-value="seo">SEO</li>
                                                <li class="clickCase" data-value="dev">Development</li>
                                                <li class="clickCase" data-value="design">Designing</li>
                                                <li class="clickCase" data-value="hr">HR</li>
                                                <li class="clickCase" data-value="a">Accountant</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive mt-2">
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0">
                                <thead>
                                    <tr class="mt-5">
                                        <th class="customth">Emp Id</th>
                                        <th class="customth">Name</th>
                                        <th class="customth">Phone</th>
                                        <th class="customth">Department</th>
                                        <th class="customth">Leave From</th>
                                        <th class="customth">Leave To</th>
                                        <th class="customth">Type</th>
                                        <th class="customth">Status</th>
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

<?php $this->load->view('footer'); ?>

<script>
// get lawyer list by click the active,pending& new  
$(document).ready(function() {
    $(".clickCase").click(function() {
        var sortBy = $(this).attr("data-value");
        var url = "<?php echo base_url();?>";
        url = url + 'admin/leavemanagement?type=' + sortBy;
        window.location.href = url;

    })

});
</script>

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

            "url": "<?php echo site_url('admin/leavemanagement/ajax_list') ?>" + type,

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
        hitURL = "<?php echo base_url() ?>admin/leavemanagement/delete";
        var confirmation = confirm("Are you sure to delete this leavemanagement ?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: hitURL,
                data: {
                    id: tableId
                }, // serializes the form's elements.
                success: function(data) {
                    // alert(data);
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