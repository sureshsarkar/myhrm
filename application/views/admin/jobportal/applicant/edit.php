<style>
label {
    font-weight: bold;
}

.custom-file-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 11px !important;
    height: 61px;
}

.btn-primary {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: red;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0069d9;
}

.breadcrumb-item a {
    color: #444;
    font-size: 20px;
    font-weight: 500;
}

.DashboardCls a {
    color: #444;
    font-size: 20px;
    font-weight: 500;
}

.breadcrumb-item::before {
    content: "\f105" !important;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    padding: 0px 5px;
}

.housecss {
    font-weight: 600;
    color: black;
    font-size: 25px;
}

.form-control {
    height: 67% !important;
    border: 1px solid #1a508952 !important;
    /* cursor: pointer; */
}

.cardBox {
    background: #fff;
    min-height: 50px;
    position: relative;
    margin-bottom: 24px;
    border: 1px solid #f2f4f9;
    border-radius: 10px;
    box-shadow: 0 0 10px #b7c0ce33;
    -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, .2);
}

.textColor {
    color: #1a5089;
}
</style>
<?php $this->load->view('header'); ?>

<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script> -->

<div class="section-body">
    <div class="container-fluid">
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid list list-row cardBox p-4">
                    <div class="row m-0 card-header fvgfb">
                        <div class="col-sm-6 col-md-6">
                            <div class=" ">
                                <h3 class="card-title">
                                    <img src="<?= base_url()?>assets/images/profile.png" style="width: 30px;" alt=""> Edit
                                    Applicant
                                </h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="header-action " style="float:right;">
                                <a href="<?= base_url()?>admin/jobportal/applicant" title="Add Leave Form">
                                    <button type="button" class="btn add_btn"><img
                                            src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                            style="width: 20px;margin-top: -6px;" alt="">Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $edit_data->id?>">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="<?= $edit_data->name?>" required disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">Email*</label>
                                <input type="" class="form-control" id="email" name="email" placeholder="Email"
                                    value="<?= $edit_data->email?>" required disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="experience">Experience*</label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    value="<?= $edit_data->experience?>" placeholder="Experience" required disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="role">Role*</label>
                                <input type="text" class="form-control" id="role" name="role"
                                    value="<?= $edit_data->role?>" placeholder="Role" required disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status">Status*</label>
                                <select name="status" class="form-control" required autofocus>
                                    <option value="0">Please Select</option>
                                    <option value="1"
                                        <?= (isset($edit_data->status) && $edit_data->status == 1)?'selected':''?>>
                                        <?= $this->config->item('appl_status')[1]?>
                                    </option>
                                    <option value="2"
                                        <?= (isset($edit_data->status) && $edit_data->status == 2)?'selected':''?>>
                                        <?= $this->config->item('appl_status')[2]?>
                                    </option>
                                    <option value="3"
                                        <?= (isset($edit_data->status) && $edit_data->status == 3)?'selected':''?>>
                                        <?= $this->config->item('appl_status')[3]?>
                                    </option>
                                    <option value="4"
                                        <?= (isset($edit_data->status) && $edit_data->status == 4)?'selected':''?>>
                                        <?= $this->config->item('appl_status')[4]?>
                                    </option>
                                    <option value="5"
                                        <?= (isset($edit_data->status) && $edit_data->status == 5)?'selected':''?>>
                                        <?= $this->config->item('appl_status')[5]?>
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="followup_date">FollowUp Date*</label>
                                <input type="date" class="form-control" id="followup_date" name="followup_date"
                                    placeholder="followup_date">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="followup_time">FollowUp Time*</label>
                                <input type="time" class="form-control" id="followup_time" name="followup_time"
                                    placeholder="followup_time">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="cv">CV*</label>
                                <input type="file" class="form-control" name="cv">
                                <input type="hidden" name="old_cv" value="<?= $edit_data->cv?>">
                            </div>
                            <div class="form-group col-md-1 mt-4">
                                <a href="<?= base_url().$edit_data->cv?>" title="View CV" target="_blank">
                                    <div type="text" class="submitBtn btn btn-primary mt-2 py-2">View
                                    </div>
                                </a>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="followup_note">Followup Note</label>
                                <input type="text" class="form-control" id="followup_note" name="followup_note"
                                    placeholder="Followup Note">
                            </div>
                            <div class="form-group col-md-2 mt-4">
                                <button type="submit"
                                    class="submitBtn btn btn-primary mt-2 py-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">

                <!-- general form elements -->
                <div class="container-fluid list list-row cardBox p-4">

                    <form action="" id="" class="form-horizontal " method="post">
                        <input type="hidden" name="id" value="<?= $edit_data->id?>">
                        <div class="card-body" style="padding-top: 14px;">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <label for="exampleInputFile"><i class="bi bi-pencil-square"></i> FollowUp
                                                Note:</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputFile"><i class="bi bi-journal-album"></i>
                                                Status:</label>
                                        </div>

                                        <div class="col-md-3" style="text-align: center;">
                                            <label for="exampleInputFile" style=" margin-left: 16px;"><i
                                                    class="bi bi-calendar-date-fill"></i> Next FollowUp Date:</label>
                                        </div>

                                        <?php
                            $followData = json_decode($edit_data->followupdata);
// pre($followData);
                            if(isset($followData) && count($followData)>0 ){
                            foreach ($followData as $key => $value) {
                                ?>
                                        <!-- show followup_note start -->
                                        <div class="col-md-12 py-2" style="background:#f7973d2e;border-radius: 10px;">
                                            <div class="row">

                                                <div class="col-md-6 pt-2">
                                                    <i class="bi bi-alarm-fill"></i> <span
                                                        class="badge bg-inverse-success p-2"><?= (isset($value->created_at))? date("d F Y h:i A", strtotime($value->created_at)):'N/A'?></span>

                                                    <div class="form-group">

                                                        <p class="ml-3"><?= $value->followup_note?></p>


                                                    </div>

                                                </div>
                                                <div class="col-md-3 pt-2">
                                                    <div class="form-group">
                                                        <span
                                                            class="badge bg-inverse-success"><?= (isset($value->status))? $this->config->item('appl_status')[$value->status]:"N/A"?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pt-2" style="text-align: right;">

                                                    <!-- <div class="form-group"> -->

                                                    <span
                                                        class="badge bg-inverse-warning p-2"><?= date("d F Y h:i A", strtotime($value->followup_time))?></span>

                                                    <!-- </div> -->

                                                </div>

                                            </div>

                                        </div>
                                        <hr>
                                        <!-- show followup_note end  -->
                                        <?php }?>

                                        <?php }?>
                                    </div>
                                    <!-- /.card-body -->
                    </form>

                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer'); ?>

    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>