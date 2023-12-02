<?php $this->load->view('header'); ?>

<div class="section-body">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4"><br>
                    <h4 class="text-uppercase"><b>Improved events experience and productivity with TCHRMS.</b></h4>
                    <small class="text-muted"><b>TCHRMS</b> helps you build an environment of efficiency, transparency
                        and trust where eventss have easy digital access to all necessary people, processes,
                        information and documents.<br></small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="events-list" role="tabpanel">
                <div class="card p-0">
                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row mb-2 card-header fvgfb">
                                <div class="col-sm-6 col-md-6 p-0">
                                    <div class=" ">
                                        <h3 class="card-title font-weight-bold"><img
                                                src="https://cdn-icons-png.flaticon.com/128/2664/2664627.png" style="width: 30px;"
                                                alt="">
                                            Events List</h3>
                                    </div>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <div class="header-action " style="float:right;">
                                        <a href="<?= base_url()?>admin/events/add" title="Add Event">
                                            <button type="button" class="btn add_btn"><img
                                                    src="https://cdn-icons-png.flaticon.com/128/2744/2744038.png"
                                                    style="width: 20px;margin-top: -6px;" alt="">
                                                Add Events</button>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="background-color:#ededed;">
                            <table id="example" class="table table-striped table-hover text-nowrap table-vcenter mb-0"
                                style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="customth">EVENT TYPE</th>
                                        <th class="customth">EVENT DATE</th>
                                        <th class="customth">EVENT TIME</th>
                                        <th class="customth">EVENT HEADING</th>
                                        <th class="customth">STATUS</th>
                                        <th class="customth">ACTION</th>
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

            "url": "<?php echo site_url('admin/events/ajax_list') ?>" + type,

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
        hitURL = "<?php echo base_url() ?>admin/events/delete";
        var confirmation = confirm(
            "Are you sure to delete this events ?");
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