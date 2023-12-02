
<?php $coloraArray = ['#C4DFDF', '#d7c3ff', '#F5FFC9', '#6560f026', '#F9F3CC', '#C4DFDF', '#06b48a26', '#F5FFC9',
        '#6560f026', '#F9F3CC', '#C4DFDF', '#F5FFC9', '#6560f026', '#F9F3CC', '#C4DFDF'
    ];?>
<style>
hr {
    border: 1px solid #11b798 !important;
    width: 100%;
}

.card-form {
    padding: 20px;
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
input[type="number"],
input[type="date"],
input[type="file"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px !important;
    /* height: 61px; */
}

select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 11px !important;
    /* height: 61px !important; */
    height: 45px !important;

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

body {
    background: #ecf0f4 !important;
}

.content-wrapper {
    background-color: #f4f6f900 !important;
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

.submitBtn {
    width: 100px;
    padding: 5px 11px;
    font-size: 21px;
    border-radius: 8px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    background: #009688;
    color: #ffff;
}

.inputWid {
    display: flex;
}

.inputWid input {
    width: 87%;
}

#show-password {
    float: right;
    z-index: 99999;
    margin-top: -37px;
    margin-right: 10px;
    color: gray;
    cursor: pointer;
    font-size: 1rem;
    margin-top: -28px;
}

label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600 !important;
    color: #1a5089;
}
</style>
<?php $this->load->view('header'); ?>

<?php
$company_data = json_decode($edit_data->company_data,true);
$experience_latter = json_decode($edit_data->experience_latter,true);
$relieving_letter = json_decode($edit_data->relieving_letter,true);
$sarary_slip = json_decode($edit_data->sarary_slip,true);


?>
<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script> -->

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
                <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>admin/employee">All</a></li> -->
            </ul>
            <br>
            <br>
            <div class="header-action">
                <a href="<?= base_url() ?>admin/employee">
                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</button>
                </a>
            </div>
        </div>

        <div class="row">

            <!-- left column -->

            <div class="col-md-12">

                <!-- general form elements -->

                <div class="container-fluid list list-row cardBox p-4">
                    <div class='text-center mb-2'>
                        <img class="avatar " src="http://localhost/ci/hrm/assets/images/user.png" alt=""
                            data-toggle="tooltip" data-placement="right" title="" aria-describedby="ui-tooltip-0">
                    </div>
                    <h4 class='text-center mb-5 border-bottom-dot-info pb-2 font-weight-bold'><i
                            class="bi bi-pencil-square bg-none"></i>Edit Employee </h4>

                    <form action="" method="post" enctype=multipart/form-data>
                        <input type="hidden" value="<?= $edit_data->id ?>" name="id" required>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name*</label>
                                <input type="text" class="form-control" id="firstName"
                                    placeholder="Enter Your FirstName" value="<?= $edit_data->fname ?>" name="firstName"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name*</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Your Last Name"
                                    value="<?= $edit_data->lname ?>" name="lastName" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Company Email*</label>
                                <input type="email" class="form-control" id="cemail"
                                    placeholder="Enter Your Company Email" name="company_email"
                                    value="<?= $edit_data->company_email ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pemail">Personal Email*</label>
                                <input type="email" class="form-control" id="pemail"
                                    placeholder="Enter Your Personal Email" name="pemail"
                                    value="<?= $edit_data->email ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mobile">Personal Mobile*</label>
                                <input type="number" class="form-control" id="personal_mobile"
                                    placeholder="Enter Your Personal Mobile Number" value="<?= $edit_data->phone ?>"
                                    name="personal_mobile" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Alternate Mobile*</label>
                                <input type="number" class="form-control" id="mobile" placeholder="Enter Your Alternate
                                     Mobile Number" value="<?= $edit_data->alt_mobile ?>" name="alt_mobile">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender*</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option>Select your gender</option>
                                    <option value="male" <?= ($edit_data->gender == "male") ? "selected" : "" ?>>
                                        Male
                                    </option>
                                    <option value="female" <?= ($edit_data->gender == "female") ? "selected" : "" ?>>
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password (if you want to change)*</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password"><span id="show-password"><i
                                        class="bi bi-eye-fill p-0 bg-none text-dark"></i></span>
                                <input type="hidden" value="<?= $edit_data->password ?>" name="old_password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="designation">Designation*</label>
                                <input type="text" class="form-control" id="designation" value="<?= $edit_data->role ?>"
                                    name="role" placeholder="Enter your designation">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Select Department*</label>
                                <select class="form-control" id="department" name="department">
                                    <option>Select department</option>
                                    <option value="1" <?= ($edit_data->department == 1) ? "selected" : "" ?>>
                                        <?= $this->config->item('department')[1]?></option>
                                    <option value="2" <?= ($edit_data->department == 2) ? "selected" : "" ?>>
                                        <?= $this->config->item('department')[2]?></option>
                                    <option value="3" <?= ($edit_data->department == 3) ? "selected" : "" ?>>
                                        <?= $this->config->item('department')[3]?></option>
                                    <option value="4" <?= ($edit_data->department == 4) ? "selected" : "" ?>>
                                        <?= $this->config->item('department')[4]?></option>
                                    <option value="5" <?= ($edit_data->department == 5) ? "selected" : "" ?>>
                                        <?= $this->config->item('department')[5]?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth*</label>
                                <input type="date" class="form-control" id="dob" value="<?= $edit_data->dob ?>"
                                    name="dob">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Upload Profile Image*</label>
                                <input type="file" class="form-control" id="image" name="profile_image">
                                <input type="hidden" value="<?= $edit_data->profile_image ?>" name="old_profile_image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">CTC*</label>
                                <input type="text" class="form-control" value="<?= $edit_data->ctc ?>" id="ctc"
                                    name="ctc" placeholder="Enter CTC">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="joining_date">Joining Date*</label>
                                <input type="date" class="form-control" id="joining_date"
                                    value="<?= $edit_data->joining_date ?>" name="joining_date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address">Permanent Address*</label>
                                    <input type="text" class="form-control" id="permanent_address"
                                        value="<?= $edit_data->permanent_address ?>" name="permanent_address">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address">Current Address*</label>
                                    <input type="text" class="form-control" id="current_address"
                                        value="<?= $edit_data->current_address ?>" name="current_address">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="guardian_contact">Guardian Contact*</label>
                                    <input type="text" class="form-control" id="guardian_contact"
                                        value="<?= $edit_data->guardian_contact ?>" name="guardian_contact">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="last_comp_hr_contact">Last Company HR*</label>
                                    <input type="text" class="form-control" id="last_comp_hr_contact"
                                        value="<?= $edit_data->last_comp_hr_contact ?>" name="last_comp_hr_contact">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="10_marksheet">Upload 10th Marksheet*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="10_marksheet" name="10_marksheet">
                                        <input type="hidden" value="<?= $edit_data->ten_marksheet ?>"
                                            name="old_10_marksheet">
                                        <?php if(!empty($edit_data->ten_marksheet)){ ?>
                                        <a href="<?= base_url() . $edit_data->ten_marksheet ?>" class="m-auto"
                                            target="_blank">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View 10th Marksheet">View</span> -->
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="12_marksheet">Upload 12th Marksheet*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="12_marksheet" name="12_marksheet">
                                        <input type="hidden" value="<?= $edit_data->twelth_marksheet ?>"
                                            name="old_12_marksheet">
                                        <?php if(!empty($edit_data->twelth_marksheet)){ ?>
                                        <a href="<?= base_url() . $edit_data->twelth_marksheet ?>" class="m-auto"
                                            target="_blank">
                                            <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View 12th Marksheet">View</span> -->
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="diploma">Upload Diploma Marksheet*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="diploma" name="diploma">
                                        <input type="hidden" value="<?= $edit_data->diploma ?>" name="old_diploma">
                                        <?php if(!empty($edit_data->diploma)){ ?>
                                        <a href="<?= base_url() . $edit_data->diploma ?>" class="m-auto"
                                            target="_blank">
                                            <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View Diploma Marksheet">View</span> -->
                                        </a>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="degree">Upload Degree Marksheet*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="degree" name="degree">
                                        <input type="hidden" value="<?= $edit_data->degree ?>" name="old_degree">
                                        <?php if(!empty($edit_data->degree)){ ?>

                                        <a href="<?= base_url() . $edit_data->degree ?>" class="m-auto" target="_blank">
                                            <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View Degree Marksheet">View</span> -->
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan">Aadhar Number*</label>
                                    <input type="text" class="form-control" value="<?= $edit_data->aadhar_number ?>"
                                        name="aadhar_number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="aadhar">Upload Aadhar*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="aadhar" name="aadhar">
                                        <input type="hidden" value="<?= $edit_data->aadhar ?>" name="old_aadhar">
                                        <?php if(!empty($edit_data->aadhar)){ ?>

                                        <a href="<?= base_url() . $edit_data->aadhar ?>" class="m-auto" target="_blank">
                                            <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View Aadhar Card">View</span> -->
                                        </a>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan">PAN Number*</label>
                                    <input type="text" class="form-control" value="<?= $edit_data->pan_number ?>"
                                        name="pan_number">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan">Upload PAN*</label>
                                    <div class="inputWid">
                                        <input type="file" class="form-control" id="pan" name="pan">
                                        <input type="hidden" value="<?= $edit_data->pan ?>" name="old_pan">
                                        <?php if(!empty($edit_data->pan)){ ?>

                                        <a href="<?= base_url() . $edit_data->pan ?>" class="m-auto" target="_blank">
                                            <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                            <!-- <span class="btn btn-success" title="View PAN Card">View</span> -->
                                        </a>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4> <img src="https://cdn-icons-png.flaticon.com/128/10112/10112710.png" style="width:30px;">
                            Last Company Info</h4>

                            <?php if(isset($company_data['company_name']) && count($company_data['company_name'])>0){
                                for ($i=0; $i < count($company_data['company_name']) ; $i++) { 
                                ?>
                        <div id="inputFormRow">
                            <div class="row pb-2" style="background:<?= $coloraArray[$i]?>;border-radius:4px;">
                                <div class="col-md-3">
                                    <label for="text"><span class="badge addMore"><?= $i+1?></span> Company Name</label>
                                    <input type="text" name="companyData[company_name][]" value="<?= $company_data['company_name'][$i]?>" class="form-control"
                                        placeholder="Company Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Company Address</label>
                                    <input type="text" name="companyData[company_address][]" value="<?= $company_data['company_address'][$i]?>" class="form-control"
                                        placeholder="Company Address">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Contact Person Name</label>
                                    <input type="text" name="companyData[contact_person_name][]" value="<?= $company_data['contact_person_name'][$i]?>" class="form-control"
                                        placeholder="Contact person Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Contact Number </label>
                                    <input type="text" name="companyData[contact_number][]" value="<?= $company_data['contact_number'][$i]?>" class="form-control"
                                        placeholder="Contact Number">
                                </div>
                                <div class="col-md-2">
                                    <label for="text">Experience Letter</label>
                                    <input type="file" name="experience_latter[<?=$i+1?>][]" class="form-control"
                                        placeholder="Experience Letter">
                                </div>
                                <?php
                                if(isset($experience_latter[$i+1]) && !empty($experience_latter[$i+1])){
                                 $experience_latter_url =$experience_latter[$i+1][0] ;?>
                                <div class="col-md-1 mt-5">
                                <a href="<?= base_url().$experience_latter_url ?>" target="_blank" class="p-2 bd-highlight boxBorder">
                                    <img src="https://cdn-icons-png.flaticon.com/128/5530/5530864.png" alt="" style="width:30px;">
                                    <input type="hidden" name="old_experience_latter[<?=$i+1?>][]" value="<?= $experience_latter_url ?>">
                                </a>
                                </div>
                                <?php }?>
                                <div class="col-md-2">
                                    <label for="text"> Relieving Letter</label>
                                    <input type="file" name="relieving_letter[<?=$i+1?>][]" class="form-control">
                                </div>
                                <?php
                                if(isset($relieving_letter[$i+1]) && !empty($relieving_letter[$i+1])){
                                 $relieving_letter_url = $relieving_letter[$i+1][0];?>
                                <div class="col-md-1 mt-5">
                                <a href="<?= base_url().$relieving_letter_url ?>" target="_blank" title="Click To View" class="p-2 bd-highlight boxBorder">
                                    <img src="https://cdn-icons-png.flaticon.com/128/5530/5530864.png" alt="" style="width:30px;">
                                    <input type="hidden" name="old_relieving_letter[<?=$i+1?>][]" value="<?= $relieving_letter_url ?>">
                                </a>
                                </div>
                                <?php }?>

                                <div class="col-md-3">
                                    <label for="text">Last 3 Month' s Salary Slip*</label>
                                    <input type="file" name="sarary_slip[<?=$i+1?>][]" class="form-control"
                                        placeholder="Relieving Letter" multiple>
                                </div>
                                <div class="col-md-3 mt-4">
                                <?php
                                    if (isset($sarary_slip) && !empty($sarary_slip)) {
                                        if (isset($sarary_slip[$i+1]) && !empty($sarary_slip[$i+1])) {
                                            foreach ($sarary_slip[$i+1] as $k => $v) {
                                                ?>
                                        <a href="<?= base_url() . $v ?>" target="_blank" title="Click To View" class="p-2 bd-highlight boxBorder">
                                            <img src="https://cdn-icons-png.flaticon.com/128/5530/5530864.png" alt="" style="width:30px;">
                                            <input type="hidden" name="old_sarary_slip[<?= $i+1?>][]" value="<?= $v ?>">
                                        </a>
                                    <?php }}} ?>
                                </div>
                            </div>
                        </div>
                        <?php }}else{?>
                            <div id="inputFormRow">
                            <div class="row pb-2" style="background:<?= $coloraArray[1]?>;border-radius:4px;">
                                <div class="col-md-3">
                                    <label for="text"><span class="badge addMore">1</span> Company Name</label>
                                    <input type="text" name="companyData[company_name][]" class="form-control"
                                        placeholder="Company Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Company Address</label>
                                    <input type="text" name="companyData[company_address][]" class="form-control"
                                        placeholder="Company Address">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Contact Person Name</label>
                                    <input type="text" name="companyData[contact_person_name][]" class="form-control"
                                        placeholder="Contact person Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="text">Contact Number </label>
                                    <input type="text" name="companyData[contact_number][]" class="form-control"
                                        placeholder="Contact Number">
                                </div>
                                <div class="col-md-2">
                                    <label for="text">Experience Letter</label>
                                    <input type="file" name="experience_latter[1][]" class="form-control"
                                        placeholder="Experience Letter">
                                </div>
                               
                                <div class="col-md-2">
                                    <label for="text"> Relieving Letter</label>
                                    <input type="file" name="relieving_letter[1][]" class="form-control">
                                </div>
                                

                                <div class="col-md-3">
                                    <label for="text">Last 3 Month' s Salary Slip*</label>
                                    <input type="file" name="sarary_slip[1][]" class="form-control"
                                        placeholder="Relieving Letter" multiple>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <div id="newRow"></div>

                        <button id="addRow" type="button" class="btn btn-success btn-small"
                            title="Click to add multiple">+</button>

                        <br>
                        <h5 class="mb-0"><i class="bi bi-bank"></i><b> Bank Details <i
                                    class="bi bi-info-square"></i></b></h5>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name*</label>
                                    <input type="text" class="form-control" id="bank_name"
                                        value="<?= $edit_data->bank_name ?>" name="bank_name"
                                        placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="form-group col-md-6  mb-0">
                                <div class="form-group">
                                    <label for="ifsc_code">IFSC Code*</label>
                                    <input type="text" class="form-control" id="ifsc_code"
                                        value="<?= $edit_data->ifsc_code ?>" name="ifsc_code"
                                        placeholder="Bank IFSC Code">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_account_no">Bank Account No*</label>
                                    <input type="text" class="form-control" id="bank_account_no"
                                        value="<?= $edit_data->bank_account_no ?>" name="bank_account_no"
                                        placeholder="Bank Account Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_attachment">Upload Bank Attachment*</label>
                                <div class="inputWid">
                                    <input type="file" class="form-control" id="bank_attachment" name="bank_attachment">
                                    <input type="hidden" value="<?= $edit_data->bank_attachment ?>"
                                        name="old_bank_attachment">
                                    <?php if(!empty($edit_data->bank_attachment)){ ?>
                                    <a href="<?= base_url() . $edit_data->bank_attachment ?>" class="m-auto"
                                        target="_blank">
                                        <i class="fa fa-eye text-muted" aria-hidden="true"></i>
                                        <!-- <span class="btn btn-success" title="View Bank Attachment">View</span> -->
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 d-flex ml-auto">
                            <button type="submit" class="submitBtn btn btn-primary font-weight-bold">Submit</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>


    <?php $this->load->view('footer'); ?>


    <script>
    const passwordInput = document.getElementById("password");
    const showPasswordButton = document.getElementById("show-password");

    showPasswordButton.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            $(".bi-eye-fill").addClass('bi-eye-slash');
            $(".bi-eye-fill").removeClass('bi-eye-fill');
        } else {
            passwordInput.type = "password";
            $(".bi-eye-slash").addClass('bi-eye-fill');
            $(".bi-eye-slash").removeClass('bi-eye-slash');
        }
    });
    </script>

    <script>
    // add row
    let coloraArray = ['#d7c3ff', '#d7c3ff', '#F5FFC9', '#6560f026', '#F9F3CC', '#C4DFDF', '#06b48a26', '#F5FFC9',
        '#6560f026', '#F9F3CC', '#C4DFDF', '#F5FFC9', '#6560f026', '#F9F3CC', '#C4DFDF'
    ];

    var i = <?= (isset($company_data['company_name']))?count($company_data['company_name']):'2'?>;
    $("#addRow").click(function() {
        i++;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="row pb-2" style="background:' + coloraArray[i] + ';border-radius:4px;">';
        html += '<div class="col-md-3">';
        html += '<label for="text"><span class="badge addMore">' + i + '</span>Company Name</label>';
        html +=
            '<input type="text" name="companyData[company_name][]" class="form-control" placeholder="Company Name">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Company Address</label>';
        html +=
            '<input type="text" name="companyData[company_address][]" class="form-control" placeholder="Company Address">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Contact Person Name</label>';
        html +=
            '<input type="text" name="companyData[contact_person_name][]" class="form-control" placeholder="Contact person Name">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Contact Number </label>';
        html +=
            '<input type="text" name="companyData[contact_number][]" class="form-control" placeholder="Contact Number">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Experience Letter</label>';
        html +=
            '<input type="file" name="experience_latter[<?=$i+1?>][]" class="form-control" placeholder="Experience Letter">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text"> Relieving Letter</label>';
        html +=
            '<input type="file" name="relieving_letter[<?=$i+1?>][]" class="form-control" placeholder="Relieving Letter">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Last 3 Month Salary Slip*</label>';
        html +=
            '<input type="file" name="sarary_slip[' + i +
            '][]" class="form-control" placeholder="Relieving Letter" multiple>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });
    </script>