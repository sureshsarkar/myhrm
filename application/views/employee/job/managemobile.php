
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

<div class="section-body ">
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
            <div class="tab-pane fade active show" id="Employee-list" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title font-weight-bold flex-grow-1" style="color:#042c56;"><img
                                src="<?= base_url()?>assets/images/website.png" style="width: 30px;" alt=""> Job List
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="customth">Attachment</th>
                                        <th class="customth">Designation</th>
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

            "url": "<?php echo site_url('employee/job/mobile_ajax_list') ?>" + type,

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
