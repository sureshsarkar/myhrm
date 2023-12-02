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
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- <table id="myTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0"> -->
                            <table id="example" class="table table-light table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="customth">Employee</th>
                                        <th class="customth">Total Earning</th>
                                        <th class="customth">Total Deduction</th>
                                        <th class="customth">Net Salary</th>
                                        <th class="customth">Created</th>
                                        <th class="customth">Salary Slip</th>
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

            "url": "<?php echo site_url('employee/salary/ajax_list') ?>" + type,

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

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(document).on("click", ".downloadSlip", function() {
        var tableId = $(this).attr("data_id");

        hitURL = "<?php echo base_url() ?>employee/salary/downloadSlip?id=" + tableId;
        var confirmation = confirm("Are you sure to Download the Salary Slip ?");
        if (confirmation) {
            window.location.replace(hitURL);
        }
    });
});
</script>