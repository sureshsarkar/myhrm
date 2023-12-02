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
    </div>
</div>

<div class="section-body">
    <div class="container-fluid px-0">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="leavemanagement-list" role="tabpanel">
                <div class="card">
                    <div class="container-fluid px-0">
                        <div class="row mb-2 card-header fvgfb" style="display: flow-root">
                            <div class="col-sm-4">
                                    <h3 class="card-title font-weight-bold pr-2">
                                        <img src="<?= base_url()?>assets/images/users-icons.png" style="width: 30px;">List
                                    </h3>
                            </div>
                            <div class="col-sm-8">
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
                                                </ul>
                                            </div>
                                        </div>
                                    <a href="<?= base_url()?>employee/leavemanagement/add" title="Add Leave Form">
                                        <button type="button" class="btn add_btn"><img
                                                src="https://cdn-icons-png.flaticon.com/512/863/863823.png"
                                                style="width: 20px;margin-top: -6px;" alt="">
                                            Add</button>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive mt-2">
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0">
                                <thead>
                                    <tr class="mt-5">
                                        <th class="customth">Leave From</th>
                                        <th class="customth">Type</th>
                                        <th class="customth">Status</th>
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

<script>
// get lawyer list by click the active,pending& new  

$(document).ready(function() {
    $(".clickCase").click(function() {
        var sortBy = $(this).attr("data-value");
        var url = "<?php echo base_url();?>";
        url = url + 'employee/leavemanagement?type=' + sortBy;
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

            "url": "<?php echo site_url('employee/leavemanagement/mobile_ajax_list') ?>" + type,

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