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
                                <?php $profileImg = (isset($view_data->profile_image) && !empty($view_data->profile_image))?$view_data->profile_image:'assets/images/user.png';
									$status = (isset($view_data->status) && $view_data->status ==1)?'<img src="'.base_url('assets/images/verify.png').'" style="width: 20px;">':'<img src="'.base_url('assets/images/unverify.png').'" style="width: 20px;">';
									?>
                                <img class="avatar avatar-xl mr-3" src="<?= base_url().$profileImg?>" alt="avatar">
                            </div>

                            <div class="media-body text-left">
                                <h4 class="mb-1"><?= $view_data->fname.' '.$view_data->lname. ' '.$status;?></h4>
                                <p class="mb-1"><b><i class="bi bi-building"></i> Department:
                                    </b><?= $this->config->item('department')[$view_data->department]?></p>
                                <p class="mb-1"><b><i class="bi bi-suit-club"></i> Role:</b> <?= $view_data->role;?></p>
                                <p class="mb-1"><b><i class="bi bi-braces"></i> <i class="bi bi-card-checklist"></i> EMP
                                        Code:</b> <?= $view_data->emp_code;?></p>

                                <?php $viewCode = '<a href="'.base_url().$view_data->police_code_file.'" target="_blank"><span class="badge bg-inverse-success btn" title="View Police Verification Code Screenshort">View</span></a>'?>
                                <p class="mb-1"><b>Police Verified Code:</b>
                                    <?= (!empty($view_data->police_code))?$view_data->police_code.' '.$viewCode:'N/A';?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <h4 class="">Personal Info <i class="bi bi-info-circle"></i></h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="media-body text-left p-0">
                                        <p class="mb-1"><b><i class="bi bi-telephone"></i> Mobile:</b>
                                            <?= $view_data->phone;?></p>
                                        <p class="mb-1"><b><i class="bi bi-person-circle"></i> Guardian:</b>
                                            <?= $view_data->guardian_contact;?></p>
                                        <p class="mb-1"><b><i class="bi bi-envelope"></i> Email:</b>
                                            <?= $view_data->email;?></p>
                                        <p class="mb-1"><b><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="currentColor" class="bi bi-gender-ambiguous"
                                                    viewBox="0 0 16 16" style="
    margin-left: -3px;
">
                                                    <path fill-rule="evenodd"
                                                        d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z" />
                                                </svg> Gender:</b> <?= $view_data->gender;?></p>
                                        <p class="mb-1"><b><i class="bi bi-calendar-check"></i> DOB:</b>
                                            <?= $view_data->dob;?></p>
                                        <p class="mb-1"><b><i class="bi bi-card-heading"></i> Aadhar:</b>
                                            <?= $view_data->aadhar_number;?></p>
                                        <p class="mb-1"><b><i class="bi bi-card-heading"></i> PAN:</b>
                                            <?= $view_data->pan_number;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0">
                            <h4 class="">Bank Info <i class="bi bi-info-square"></i></h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="media-body text-left p-0">
                                        <p class="mb-1"><b><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-bank"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                                                </svg> Bank Name:</b> <?= $view_data->bank_name;?></p>
                                        <p class="mb-1"><b><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-123"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                                                </svg> Account Number: </b><?= $view_data->bank_account_no;?></p>
                                        <p class="mb-1"><b><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-123"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                                                </svg> IFSC Code:</b> <?= $view_data->ifsc_code;?></p>
                                        <p class="mb-1"><b><i class="bi bi-paperclip"></i> Bank Attachment:</b> <a
                                                href="<?= base_url().$view_data->bank_attachment?>"
                                                class="btn btn-primary text-light px-2 py-0" title="View Passbook"
                                                target="_blank"> <i class="bi bi-eye"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="row mb-2 card-header fvgfb">
                            <div class="col-sm-6 col-md-6">
                                <h4 class="">Other Info <i class="bi bi-info-circle"></i></h4>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="header-action " style="float:right;">
                                    <a href="<?= base_url()?>admin/employee" title="Go Back">
                                        <button type="button" class="btn add_btn"><img
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
                                        <label type="text"><i class="bi bi-telephone-inbound"></i> Alternative
                                            mobile:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->alt_mobile?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-envelope"></i> Company Email:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->company_email?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-calendar-check"></i> Joining
                                            Date:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->joining_date?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-currency-rupee"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />
                                            </svg> CTC:</label><br>
                                        <input type="text" class="form-control classified" value="<?= $view_data->ctc?>"
                                            disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Permanent
                                            Address:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->permanent_address?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-bookmark-plus"></i> Current
                                            Address:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->current_address?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-people"></i> Last Company HR
                                            Contact:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->last_comp_hr_contact?>" disabled=""
                                            fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-file-earmark-spreadsheet"></i> 10th
                                            Marksheet:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->ten_marksheet))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->ten_marksheet?>" class="text-light"
                                                title="View 10th Marksheet">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>


                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-file-earmark-spreadsheet"></i> 12th
                                            Marksheet:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->twelth_marksheet))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->twelth_marksheet?>" class="text-light"
                                                title="View 12th Marksheet">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-mortarboard-fill"></i> Diploma:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->diploma))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->diploma?>" class="text-light"
                                                title="View Diploma Marksheet">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-mortarboard-fill"></i> Degree:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->degree))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->degree?>" class="text-light"
                                                title="View Degree">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-card-heading"></i> Aadhar:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->aadhar))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->aadhar?>" class="text-light"
                                                title="View Aadhar">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-card-heading"></i> PAN:</label><br>
                                        <button class="btn btn-primary px-2 py-0"
                                            <?= (empty($view_data->pan))?'disabled':''?>>
                                            <a href="<?= base_url().$view_data->pan?>" class="text-light"
                                                title="View PAN">
                                                View
                                            </a>
                                        </button>
                                    </div>
                                </div>
                                <?php
$company_data = json_decode($view_data->company_data,true);
$experience_latter = json_decode($view_data->experience_latter,true);
$relieving_letter = json_decode($view_data->relieving_letter,true);
$sarary_slip = json_decode($view_data->sarary_slip,true);


?>

                                <h5 class="text-left">Last Compamy Info</h5>
                                <?php if(isset($company_data['company_name']) && count($company_data['company_name'])>0){
                                for ($i=0; $i < count($company_data['company_name']) ; $i++) { 
                                ?>
                                <div class="row">

                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"> <span class="bg-primary badge"><?= $i+1?></span> <i
                                                    class="bi bi-people"></i> Company:</label><br>
                                            <input type="text" class="form-control classified"
                                                value="<?= $company_data['company_name'][$i]?>" disabled=""
                                                fdprocessedid="pzphkl">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i> Address:</label><br>
                                            <input type="text" class="form-control classified"
                                                value="<?= $company_data['company_address'][$i]?>" disabled=""
                                                fdprocessedid="pzphkl">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i>Contact Name:</label><br>
                                            <input type="text" class="form-control classified"
                                                value="<?= $company_data['contact_person_name'][$i]?>" disabled=""
                                                fdprocessedid="pzphkl">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i>Number:</label><br>
                                            <input type="text" class="form-control classified"
                                                value="<?= $company_data['contact_number'][$i]?>" disabled=""
                                                fdprocessedid="pzphkl">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i>Experience:</label><br>
                                            <?php
                                if(isset($experience_latter[$i+1][0]) && !empty($experience_latter[$i+1][0])){
                                 $experience_latter_url = $experience_latter[$i+1][0];?>
                                            <a href="<?= base_url() . $experience_latter_url ?>" target="_blank"
                                                class="p-2 bd-highlight boxBorder">
                                                <img src="<?= base_url().$experience_latter_url?>" alt=""
                                                    style="width:40px;">
                                            </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i>Relieving:</label><br>
                                            <?php
                                if(isset($relieving_letter[$i+1]) && !empty($relieving_letter[$i+1])){
                                 $relieving_letter_url = $relieving_letter[$i+1][0];?>
                                            <a href="<?= base_url() . $relieving_letter_url ?>" target="_blank"
                                                class="p-2 bd-highlight boxBorder">
                                                <img src="<?= base_url().$relieving_letter_url?>" alt=""
                                                    style="width:40px;">
                                            </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="form-group">
                                            <label type="text"><i class="bi bi-people"></i>Last 3 Month's Salary
                                                Slip:</label><br>
                                            <?php
										if (isset($sarary_slip[$i+1])) {
											if (isset($sarary_slip[$i+1][0])) {
												foreach ($sarary_slip[$i+1] as $k => $v) {
													?>
                                            <a href="<?= base_url() . $v ?>" target="_blank"
                                                class="p-2 bd-highlight boxBorder">
                                                <img src="<?= base_url().$v?>" alt="" style="width:40px;">
                                            </a>
                                            <?php }
											}
										}
									?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('footer'); ?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script> -->