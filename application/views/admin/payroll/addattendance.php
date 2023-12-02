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

@media (min-width: 768px) {
    .modelWid {
        max-width: 1100px !important;
        margin: 1.75rem auto;
    }
}

.btn-outline-primary:hover {
    background-color: #1a508900 !important;
    border-color: #1A5089;
    color: #1A5089;
}

.btn-outline-primary {
    min-width: 150px !important;
}

.attendancesheet {
    text-align: center;
}

</style>


<div class="section-body">
    <br>
</div>


<div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="Employee-list" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title flex-grow-1"><img src="<?= base_url()?>assets/images/dates.png"
                                style="width: 25px;" alt=""> Attendance List</h3>
                        <a href="#" title="Add New Attendance">
                            <button type="button" class="btn box-bg-primary" data-toggle="modal"
                                data-target="#staticBackdrop">
                                <i class="bi bi-file-plus"></i> Add New Attendance</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Month</th>
                                        <th>Created</th>
                                        <th>Action</th>
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


<!-- Add attendance Modal start -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modelWid">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle"><img
                        src="<?= base_url().$employeeData->profile_image?>" class="profile_image">
                    <?= $employeeData->fname.' '.$employeeData->lname;?> <i class="bi bi-arrow-right"></i> Add
                    Attendance <i class="bi bi-arrow-right"></i> <?= date("F-Y")?></h5>
            </div>
            <form action="<?= base_url()?>admin/payroll/addattendance/<?= $employeeData->id;?>" method="post">
                <input type="hidden" name="month" value="<?= date("F")?>">
                <?php $Date = date("Y-m-00");?>
                <input type="hidden" name="employeeId" value="<?= $employeeData->id;?>">
                <div class="modal-body">
                    <div class="border-calendera">
                        <div class="d-flex flex-row flex-wrap">
                            <?php if(date("F") == "January"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "February"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 28;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "March"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "April"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 30;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "May"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "June"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 30;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "July"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) {?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "August"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "September"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 30;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "October"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <input type="hidden" name="month" value="<?= date("F")?>">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "November"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 30;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                            <?php if(date("F") == "December"){
								$i= 1;?>
                            <div class="attendancesheet">
                                <?php 
								$a = 31;
								for ($i=1; $i <= $a ; $i++) { 
								?>
                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2">
                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class=""
                                        data-day="Tue" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1">
                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>">
                                </label>
                                <?php }?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn box-bg-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add attendance Modal end -->

<script>
$(document).ready(function() {
    $(".addNote").click(function() {
        const addAction = $(this).attr("addAction");
        var type = $("." + addAction).attr("type");
        if (type === "hidden") {
            $("." + addAction).attr("type", "text");
            $(this).html("-");
        } else {
            $("." + addAction).attr("type", "hidden");
            $(this).html("+");
        }
    })
})
</script>

<?php $this->load->view('footer'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script type="text/javascript">
var table;

$(document).ready(function() {

    //datatables
    var type = "<?php echo  isset($_GET['emp_id'])?'?emp_id='.$_GET['emp_id']:''?>";

    table = $('#example').DataTable({

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?php echo site_url('admin/payroll/emp_attendance_list')?>" + type,

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