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
    height: 43px !important;
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


label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600 !important;
    color: #1a5089;
}
</style>
<?php $this->load->view('header'); ?>


<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script> -->

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
            </ul>
            <div class="header-action">
                <a href="<?= base_url() ?>admin/employee">
                    <button type="button" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back</button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid list list-row cardBox p-4">
                    <div class='text-center mb-5'>
                        <img src="	https://cdn-icons-png.flaticon.com/128/4205/4205906.png" style="width:40px;">
                        <h4 class='font-weight-bold mt-3 border-bottom pb-2'>Add New Employee</h4>
                    </div>
                    <form action="" method="post" enctype=multipart/form-data>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">
                                <i class="bi bi-person-check"></i> First Name*
                                </label>
                                <input type="text" class="form-control" id="firstName"
                                    placeholder="Enter Your FirstName" name="firstName" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">
                                <i class="bi bi-person-check"></i> Last Name*
                                </label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Your LastName"
                                    name="lastName" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><i class="bi bi-envelope"></i> Company Email*</label>
                                <input type="email" class="form-control" id="cemail"
                                    placeholder="Enter Your Company Email" name="company_email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pemail"><i class="bi bi-envelope"></i> Personal Email*</label>
                                <input type="email" class="form-control" id="pemail"
                                    placeholder="Enter Your Personal Email" name="pemail" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><i class="bi bi-headphones"></i> Personal Mobile*</label>
                                <input type="number" class="form-control" id="personal_mobile"
                                    placeholder="Enter Your Mobile Number" name="personal_mobile" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><i class="bi bi-headphones"></i> Alternate Mobile*</label>
                                <input type="number" class="form-control" id="mobile"
                                    placeholder="Enter Your Alternate Mobile Number" name="alt_mobile">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
</svg> Gender*</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password"><i class="bi bi-file-lock"></i> Password*</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter Your Password" required><span id="show-password"><i
                                        class="bi bi-eye-fill"></i></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="designation"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-android2" viewBox="0 0 16 16">
  <path d="m10.213 1.471.691-1.26c.046-.083.03-.147-.048-.192-.085-.038-.15-.019-.195.058l-.7 1.27A4.832 4.832 0 0 0 8.005.941c-.688 0-1.34.135-1.956.404l-.7-1.27C5.303 0 5.239-.018 5.154.02c-.078.046-.094.11-.049.193l.691 1.259a4.25 4.25 0 0 0-1.673 1.476A3.697 3.697 0 0 0 3.5 5.02h9c0-.75-.208-1.44-.623-2.072a4.266 4.266 0 0 0-1.664-1.476ZM6.22 3.303a.367.367 0 0 1-.267.11.35.35 0 0 1-.263-.11.366.366 0 0 1-.107-.264.37.37 0 0 1 .107-.265.351.351 0 0 1 .263-.11c.103 0 .193.037.267.11a.36.36 0 0 1 .112.265.36.36 0 0 1-.112.264m4.101 0a.351.351 0 0 1-.262.11.366.366 0 0 1-.268-.11.358.358 0 0 1-.112-.264c0-.103.037-.191.112-.265a.367.367 0 0 1 .268-.11c.104 0 .19.037.262.11a.367.367 0 0 1 .107.265c0 .102-.035.19-.107.264M3.5 11.77c0 .294.104.544.311.75.208.204.46.307.76.307h.758l.01 2.182c0 .276.097.51.292.703a.961.961 0 0 0 .7.288.973.973 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h1.343v2.182c0 .276.097.51.292.703a.972.972 0 0 0 .71.288.973.973 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h.76c.291 0 .54-.103.749-.308.207-.205.311-.455.311-.75V5.365h-9v6.404Zm10.495-6.587a.983.983 0 0 0-.702.278.91.91 0 0 0-.293.685v4.063c0 .271.098.501.293.69a.97.97 0 0 0 .702.284c.28 0 .517-.095.712-.284a.924.924 0 0 0 .293-.69V6.146a.91.91 0 0 0-.293-.685.995.995 0 0 0-.712-.278m-12.702.283a.985.985 0 0 1 .712-.283c.273 0 .507.094.702.283a.913.913 0 0 1 .293.68v4.063a.932.932 0 0 1-.288.69.97.97 0 0 1-.707.284.986.986 0 0 1-.712-.284.924.924 0 0 1-.293-.69V6.146c0-.264.098-.491.293-.68Z"/>
</svg> Designation*</label>
                                <input type="text" class="form-control" id="designation" name="role"
                                    placeholder="Enter Your Designation">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department"><i class="bi bi-bank"></i> Select Department*</label>
                                <select class="form-control1" id="department" name="department">
                                    <option>Select department</option>
                                    <option value="1"><?= $this->config->item('department')[1]?></option>
                                    <option value="2"><?= $this->config->item('department')[2]?></option>
                                    <option value="3"><?= $this->config->item('department')[3]?></option>
                                    <option value="4"><?= $this->config->item('department')[4]?></option>
                                    <option value="5"><?= $this->config->item('department')[5]?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob"><i class="bi bi-calendar-check"></i> Date of Birth*</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image"><i class="bi bi-cloud-arrow-up"></i> Upload Profile Image*</label>
                                <input type="file" class="form-control" id="image" name="profile_image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
  <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"/>
</svg> CTC*</label>
                                <input type="text" class="form-control" id="ctc" name="ctc" placeholder="Enter CTC">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="joining_date"><i class="bi bi-calendar-check"></i> Joining Date*</label>
                                <input type="date" class="form-control" id="joining_date" name="joining_date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address"><i class="bi bi-book"></i> Permanent Address*</label>
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address" placeholder="Enter Your Permanent Address">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address"><i class="bi bi-book"></i> Current Address*</label>
                                    <input type="text" class="form-control" id="current_address" name="current_address"
                                        placeholder="Enter Your Current Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="10_marksheet"><i class="bi bi-cloud-arrow-up"></i> Upload 10th Marksheet*</label>
                                    <input type="file" class="form-control" id="10_marksheet" name="10_marksheet">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="12_marksheet"><i class="bi bi-cloud-arrow-up"></i> Upload 12th Marksheet*</label>
                                    <input type="file" class="form-control" id="12_marksheet" name="12_marksheet">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="diploma"><i class="bi bi-cloud-arrow-up"></i> Upload Diploma Marksheet*</label>
                                    <input type="file" class="form-control" id="diploma" name="diploma">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="degree"><i class="bi bi-cloud-arrow-up"></i> Upload Degree Marksheet*</label>
                                    <input type="file" class="form-control" id="degree" name="degree">
                                </div>
                            </div>
                        </div>

                        <h4> <img src="https://cdn-icons-png.flaticon.com/128/10112/10112710.png" style="width:30px;">
                            Last Company Info</h4>
                                <div class="row mb-3">
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
                                    <div class="col-md-3">
                                        <label for="text">Experience Letter</label>
                                        <input type="file" name="experience_latter[1][]" class="form-control"
                                            placeholder="Experience Letter">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text"> Relieving Letter</label>
                                        <input type="file" name="relieving_letter[1][]" class="form-control"
                                            placeholder="Relieving Letter">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">Last 3 Month' s Salary Slip*</label>
                                        <input type="file" name="sarary_slip[1][]" class="form-control"
                                            placeholder="Relieving Letter" multiple>
                                    </div>
                                </div>
                                <div id="newRow"></div>

                        <button id="addRow" type="button" class="btn btn-success btn-small"
                            title="Click to add multiple">+</button>
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="experience_latter">Relieving/ Experience Letter*</label>
                                    <input type="file" class="form-control" id="experience_latter"
                                        name="experience_latter[]" multiple>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="sarary_slip">Upload Last 3 Month' s Salary Slip*</label>
                                    <input type="file" class="form-control" id="sarary_slip" name="sarary_slip[]"
                                        multiple>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="aadhar_number"><i class="bi bi-card-list"></i> Aadhar Number*</label>
                                    <input type="number" class="form-control" id="aadhar_number" name="aadhar_number"
                                        placeholder="Enter Aadhar Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="aadhar"><i class="bi bi-cloud-arrow-up"></i> Upload Aadhar*</label>
                                    <input type="file" class="form-control" id="aadhar" name="aadhar">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan_number"><i class="bi bi-card-list"></i> PAN Number*</label>
                                    <input type="text" class="form-control" id="pan_number" name="pan_number"
                                        placeholder="Enter PAN Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan"><i class="bi bi-cloud-arrow-up"></i> Upload PAN*</label>
                                    <input type="file" class="form-control" id="pan" name="pan">
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group mb-0">
                                    <label for="guardian_contact"><i class="bi bi-people" style="color: #1a76bb;"></i> Guardian Contact*</label>
                                    <input type="text" class="form-control" id="guardian_contact"
                                        name="guardian_contact" placeholder="Enter Guardian Contact">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group mb-0">
                                    <label for="last_comp_hr_contact"><i class="bi bi-kanban"></i> Last Company HR*</label>
                                    <input type="text" class="form-control" id="last_comp_hr_contact"
                                        name="last_comp_hr_contact" placeholder="Enter Last Company HR Contact">
                                </div>
                            </div>
                        </div>

                        <br>
                        <h5 class="mb-0">
                            <i class="bi bi-bank"></i>
                            <b class='font-weight-bold mt-1'></b> <i class="bi bi-bank"></i> Bank Details</b>
                        </h5>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_name"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
  <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
</svg> Bank Name*</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name"
                                        placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="ifsc_code"><i class="bi bi-card-list"></i> IFSC Code*</label>
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"
                                        placeholder="Bank IFSC Code">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_account_no"><i class="bi bi-card-list"></i> Bank Account No*</label>
                                    <input type="text" class="form-control" id="bank_account_no" name="bank_account_no"
                                        placeholder="Bank Account Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_attachment"><i class="bi bi-cloud-arrow-up"></i> Upload Bank Passbook*</label>
                                    <input type="file" class="form-control" id="bank_attachment" name="bank_attachment">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 d-flex ml-auto">
                            <button type="submit" class="submitBtn btn btn-primary font-weight-bold ">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>


    <?php $this->load->view('footer'); ?>

    <!-- <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script> -->

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

    var i = 1;
    $("#addRow").click(function() {
        i++;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="row pb-2" style="background:' + coloraArray[i] + ';border-radius:4px;">';
        html += '<div class="col-md-3">';
        html += '<label for="text"><span class="badge addMore">'+ i+'</span>Company Name</label>';
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
            '<input type="file" name="experience_latter['+i+'][]" class="form-control" placeholder="Experience Letter">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text"> Relieving Letter</label>';
        html +=
            '<input type="file" name="relieving_letter['+i+'][]" class="form-control" placeholder="Relieving Letter">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<label for="text">Last 3 Month Salary Slip*</label>';
        html +=
            '<input type="file" name="sarary_slip['+i+'][]" class="form-control" placeholder="Relieving Letter" multiple>';
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