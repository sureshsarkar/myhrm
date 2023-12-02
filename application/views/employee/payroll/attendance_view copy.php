<?php $this->load->view('header'); ?>
<style>
    .btn-outline-primary:hover {
    background-color:#1a508900 !important;
    border-color: #1A5089;
    color: #1A5089;
}
.btn-outline-primary{
	min-width: 150px !important;
}
.attendancesheet{
	text-align:center;
}
</style>
<?php
$attendance_note = json_decode($attendance->attendance_note);
$attendance_date = json_decode($attendance->attendance_date);
$attendanceCount = json_decode($attendance->attendance);
// pre($attendanceCount);

?>
<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4">
                    <h4 class="mb-0">
                        <img src="<?= base_url().$employee->profile_image?>" alt="" class="profile_image">
                        <?= $employee->fname.' '.$employee->lname?> </b>
                    </h4>
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span><b>Degignation:-</b> <?= $employee->role?></span>
                </div>
            </div>
        </div>
        <div class="tab-pane" role="tabpanel">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <h5 class="mb-0"><i class="bi bi-calendar-plus"></i> <?= $attendance->month?> Attendance</h5>
                        <div class="card-body">
                            <form action="<?= base_url()?>admin/payroll/addattendance/<?= $employee->id;?>"
                                method="post">
			                <input type="hidden" name="employeeId" value="<?= $employee->id;?>">
			                <input type="hidden" name="id" value="<?= $attendance->id;?>">
                                <?php $Date = date("Y-m-00");?>
                                <div class="modal-body">
                                    <div class="border-calendera">
                                        <div class="d-flex flex-row flex-wrap">
                                           
                                            <div class="attendancesheet">
                                                <input type="hidden" name="month" value="<?= date("F")?>">
                                                <?php 
                                                    $a = count($attendance_date);
                                                    $b = -1;
                                                    for ($i=1; $i <= $a ; $i++) { 
                                                        $b++;
                                                    ?>
                                                <label class="btn my-1 btn-outline-primary bowwidth" data-id="0">
                                                    <input type="checkbox" title="For Full Day" name="attendance_date[]" class="" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_2" <?= (isset($attendance_date[$b]) && $attendance_date[$b] == date("Y-m-d",strtotime($Date. ' + '.$i.' days')) && $attendanceCount[$b] == 2)?'checked':''?>>
                                                    <input type="checkbox" title="For Half Day" name="attendance_date[]" class="" value="<?= date("Y-m-d",strtotime($Date. ' + '.$i.' days'))?>_1" <?= (isset($attendance_date[$b]) && $attendance_date[$b] == date("Y-m-d",strtotime($Date. ' + '.$i.' days')) && $attendanceCount[$b] == 1)?'checked':''?>>
                                                    <?= date("d D",strtotime($Date. ' + '.$i.' days'))?>
                                                    <div class="btn box-bg-primary addNote" addAction="addNote<?= $i?>">+</div>
                                                    <input type="hidden" name="attendance_note[]" class="addNote<?= $i?>" value="<?= $attendance_note[$b]?>">
                                                </label>
                                                <?php }?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer d-block text-center">
                                   <a href="<?= $_SERVER['HTTP_REFERER']?>">
                                       <button type="button" class="btn btn-warning text-light" data-dismiss="modal"> <i class="bi bi-arrow-left"></i> Back</button>
                                   </a>
                                    &nbsp;
                                    <button type="submit" class="btn box-bg-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>

<script>
	$(document).ready(function(){
		$(".addNote").click(function(){
			const addAction = $(this).attr("addAction");
			var type = $("."+addAction).attr("type");
			if (type === "hidden") {
				$("."+addAction).attr("type","text");
				$(this).html("-");
                $(this).css('background-color','red');
			} else {
				$("."+addAction).attr("type","hidden");
				$(this).html("+");
			}
		})
	})
</script>