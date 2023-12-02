<?php $this->load->view('header'); ?>

<style>
.form-group {
    -webkit-box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
    box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
    padding: 1rem;
}

.form-group {
    text-align: left;
}
</style>
<div class="section-body">
    <div class="container-fluid">
        <div class="tab-pane" role="tabpanel">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <?php $profileImg = (isset($employeeData->profile_image) && !empty($employeeData->profile_image))?$employeeData->profile_image:'assets/images/user.png';
									$status = (isset($employeeData->status) && $employeeData->status ==1)?'<img src="'.base_url('assets/images/verify.png').'" style="width: 20px;">':'<img src="'.base_url('assets/images/unverify.png').'" style="width: 20px;">';
									?>
                                <img class="avatar avatar-xl mr-3" src="<?= base_url().$profileImg?>" alt="avatar">
                            </div>

                            <div class="media-body text-left">
                                <h4 class="mb-1"><?= $employeeData->fname.' '.$employeeData->lname. ' '.$status;?></h4>
                                <p class="mb-1"><b><i class="bi bi-building"></i> Department:
                                    </b><?= $this->config->item('department')[$employeeData->department]?></p>
                                <p class="mb-1"><b><i class="bi bi-suit-club"></i> Role:</b> <?= $employeeData->role;?>
                                </p>
                                <p class="mb-1"><b><i class="bi bi-braces"></i> <i class="bi bi-card-checklist"></i> EMP
                                        Code:</b> <?= $employeeData->emp_code;?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                            <div class="row mb-2 card-header py-1">
                                <div class="col-sm-6 col-md-6">
                                    <div>
                                        <h3 class="card-title font-weight-bold">
                                            <img src="https://cdn-icons-png.flaticon.com/128/1022/1022215.png"
                                                style="width: 30px;">Leave Form Info
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div style="float:right;">
                                        <a href="<?= base_url()?>admin/leavemanagement" title="Go Back">
                                            <button type="button" class="btn add_btn" fdprocessedid="h2qxt6"><img
                                                    src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                                    style="width: 20px;margin-top: -6px;" alt="">
                                                Back</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <div class="card-body pt-0 pb-0">
                            <div class="media-body row p-0">

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-telephone-inbound"></i> Leave
                                            From:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $leaveData->leave_date_from?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-envelope"></i> Leave To:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $leaveData->leave_date_to?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-calendar-check"></i> Nature Of
                                            Leave:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $this->config->item('leave_type')[$leaveData->nature_of_leave]?>"
                                            disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-calendar-check"></i> Leave
                                            Status:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= ($leaveData->status==1)?'Approved':'Not Approved'?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Leave Added:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= date("Y-m-d",strtotime($leaveData->created_at))?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Leave
                                            Updated:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $leaveData->updated_at?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Leave Reason:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $leaveData->leave_reson?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Leave Approval
                                            Comments:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $leaveData->comments?>" disabled="" fdprocessedid="pzphkl">
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



<?php $this->load->view('footer'); ?>