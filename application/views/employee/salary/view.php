<style>
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
<?php
$attendance_date = json_decode($attendance->attendance_date);
$in_time = json_decode($attendance->in_time);
$out_time = json_decode($attendance->out_time);
$shift = json_decode($attendance->shift);
$total_duration = json_decode($attendance->total_duration);
$attandace_status = json_decode($attendance->attandace_status);
$late_mark = json_decode($attendance->late_mark);
$salary_calculation = json_decode($attendance->salary_calculation);
$salary_conclusion = json_decode($attendance->salary_conclusion);

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
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span><b>Designation:-</b> <?= $employee->role?></span>
                </div>
            </div>
        </div>
        <div class="tab-pane" role="tabpanel">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="row m-0 card-header fvgfb">

                            <div class="col-sm-6  px-0 col-md-6">
                                <div class=" ">
                                    <h3 class="card-title font-weight-bold"><img
                                            src="https://cdn-icons-png.flaticon.com/128/3652/3652191.png"
                                            style="width: 30px;"><?= date("F",strtotime($attendance->salary_month))?>
                                        Attendance</h3>
                                </div>
                            </div>
                            <div class="col-sm-6  px-0 col-md-6">
                                <div class="header-action " style="float:right;">
                                    <a href="<?= $_SERVER['HTTP_REFERER']?>" title="Go Back">
                                        <button type="button" class="btn add_btn"><img
                                                src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                                style="width: 20px;margin-top: -6px;" alt="">
                                            Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <?php $Date = date("Y-m-00");?>
                            <div class="modal-body">
                                <div class="border-calendera">
                                    <div class="attendancesheet">
                                        <input type="hidden" name="month" value="<?= date("F")?>">

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="customth">DATE</th>
                                                    <th class="customth">INTIME</th>
                                                    <th class="customth">OUTTIME</th>
                                                    <th class="customth">SHIFT</th>
                                                    <th class="customth">TOTAL DURATION</th>
                                                    <th class="customth">STATUS</th>
                                                    <th class="customth">LATE MARKS</th>
                                                    <th class="customth">SALARY CALCULATIONS</th>
                                                    <th class="customth">AMOUNTS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($attendance_date)){
                                                        foreach ($attendance_date as $key => $value) {
                                                            if($key == 0){

                                                            }elseif($value != ""){
                                                        ?>
                                                <tr>
                                                    <td><?= $value?></td>
                                                    <td><?= $in_time[$key]?></td>
                                                    <td><?= $out_time[$key]?></td>
                                                    <td><?= $shift[$key]?></td>
                                                    <td><?= $total_duration[$key]?></td>
                                                    <td><?= $attandace_status[$key]?></td>
                                                    <td><span class="bg-inverse-danger badge"><?= $late_mark[$key]?></span></td>
                                                    <td><b><?= $salary_calculation[$key]?></b></td>
                                                    <td><?= $salary_conclusion[$key]?></td>
                                                </tr>
                                                <?php }}}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $(".addNote").click(function() {
        const addAction = $(this).attr("addAction");
        var type = $("." + addAction).attr("type");
        if (type === "hidden") {
            $("." + addAction).attr("type", "text");
            $(this).html("-");
            $(this).css('background-color', 'red');
        } else {
            $("." + addAction).attr("type", "hidden");
            $(this).html("+");
        }
    })
})
</script>