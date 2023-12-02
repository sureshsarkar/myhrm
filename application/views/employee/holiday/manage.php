
<div class="section-body">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4"><br>
                    <h4 class="text-uppercase"><b>Improved holiday experience and productivity with TCHRMS.</b></h4>
                    <small class="text-muted"><b>TCHRMS</b> helps you build an environment of efficiency, transparency
                        and trust where holidays have easy digital access to all necessary people, processes,
                        information and documents.<br></small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="holiday-list" role="tabpanel">
                <div class="card p-0">
                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row mb-2 card-header fvgfb">
                                <div class="col-sm-6 col-md-6 p-0">
                                    <div class=" ">
                                        <h3 class="card-title font-weight-bold"><img
                                                src="https://cdn-icons-png.flaticon.com/128/2664/2664627.png" style="width: 30px;"
                                                alt="">
                                            Holiday List</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="background-color:#ededed;">
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0"
                                style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="customth">DAY Name</th>
                                        <th class="customth">DATE FROM</th>
                                        <th class="customth">DATE TO</th>
                                        <th class="customth">HOLIDAY Reason</th>
                                        <th class="customth">DAYS</th>
                                        <th class="customth">STATUS</th>
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

            "url": "<?php echo site_url('employee/holiday/ajax_list') ?>" + type,

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
