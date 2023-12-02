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

<div class="section-body ">
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
                <div class="card cardData p-2 border-0" style="background-color:#f7fde7;">
                    <a href="<?= base_url()?>admin/jobportal/applicant?type=a">
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/reviews.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($awaitningReviewed) && !empty($awaitningReviewed)) ? $awaitningReviewed : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Awaitning Reviewed
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#f3daceb0;">
                    <a href="<?= base_url() ?>admin/jobportal/applicant?type=c">
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/contact.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($contactingReviewed) && !empty($contactingReviewed)) ? $contactingReviewed : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Contacting
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#fde7fc;">
                    <a href="<?= base_url() ?>admin/jobportal/applicant?type=s">
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/list.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>
                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($shortListed) && !empty($shortListed)) ? $shortListed : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Short Listed
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href="<?= base_url() ?>admin/jobportal/applicant?type=h">
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-2'>
                                    <img src="<?= base_url() ?>assets/images/candidate.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($hieredReviewed) && !empty($hieredReviewed)) ? $hieredReviewed : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Hiered
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
                    <div class="card-header d-flex">
                        <h3 class="card-title font-weight-bold flex-grow-1">
                            <img src="<?= base_url()?>assets/images/users-icons.png" style="width: 30px;" alt="">
                            Applicant List
                        </h3>
                        <a href="<?= base_url() ?>admin/jobportal/addapplicant" title="Add Employee">
                            <button type="button" class="btn add_btn"><i class="bi bi-plus fa-1x"></i>
                                Add </button>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="customth">Applicant</th>
                                        <th class="customth">Email</th>
                                        <th class="customth">Department</th>
                                        <th class="customth">Experience</th>
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

            "url": "<?php echo site_url('admin/jobportal/applicant_ajax_list') ?>" + type,

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
        hitURL = "<?php echo base_url() ?>admin/jobportal/applicant_delete";
        var confirmation = confirm("Are you sure to delete this applicant ?");
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