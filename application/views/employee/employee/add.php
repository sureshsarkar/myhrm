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


<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" id="Employee-tab"
                        href="<?= base_url() ?>admin/employee">All</a></li>
                <!-- <li class="nav-item"><a class="nav-link" id="Employee-tab"
                        href="<?= base_url() ?>admin/employee/view/12">View</a></li>
                <li class="nav-item"><a class="nav-link" id="Employee-tab"
                        href="<?= base_url() ?>admin/employee/leave">Leave Request</a></li> -->
            </ul>
            <div class="header-action">
                <a href="<?= base_url() ?>admin/employee">
                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid list list-row cardBox p-4">
                    <div class='text-center mb-5'>
                        <i class="fa fa-user fa-4x border bg-info p-2 rounded-lg" aria-hidden="true"></i>
                        <h4 class='font-weight-bold mt-3 border-bottom pb-2'>Add New Employee</h4>
                    </div>
                    <form action="" method="post" enctype=multipart/form-data>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">
                                    <!-- <i class="bi bi-highlighter"></i> -->
                                    First Name*
                                </label>
                                <input type="text" class="form-control" id="firstName"
                                    placeholder="Enter Your FirstName" name="firstName" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">
                                    <!-- <i class="bi bi-highlighter"></i> -->
                                    Last Name*
                                </label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Your LastName"
                                    name="lastName" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Company Email*</label>
                                <input type="email" class="form-control" id="cemail"
                                    placeholder="Enter Your Company Email" name="company_email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pemail">Personal Email*</label>
                                <input type="email" class="form-control" id="pemail"
                                    placeholder="Enter Your Personal Email" name="pemail" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Personal Mobile*</label>
                                <input type="number" class="form-control" id="personal_mobile"
                                    placeholder="Enter Your Mobile Number" name="personal_mobile" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Alternate Mobile*</label>
                                <input type="number" class="form-control" id="mobile"
                                    placeholder="Enter Your Alternate Mobile Number" name="alt_mobile">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender*</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter Your Password" required><span id="show-password"><i
                                        class="bi bi-eye-fill"></i></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="designation">Designation*</label>
                                <input type="text" class="form-control" id="designation" name="role"
                                    placeholder="Enter Your Designation">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Select Department*</label>
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
                                <label for="dob">Date of Birth*</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Upload Profile Image*</label>
                                <input type="file" class="form-control" id="image" name="profile_image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">CTC*</label>
                                <input type="text" class="form-control" id="ctc" name="ctc" placeholder="Enter CTC">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="joining_date">Joining Date*</label>
                                <input type="date" class="form-control" id="joining_date" name="joining_date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address">Permanent Address*</label>
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address" placeholder="Enter Your Permanent Address">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="address">Current Address*</label>
                                    <input type="text" class="form-control" id="current_address" name="current_address"
                                        placeholder="Enter Your Current Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="10_marksheet">Upload 10th Marksheet*</label>
                                    <input type="file" class="form-control" id="10_marksheet" name="10_marksheet">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="12_marksheet">Upload 12th Marksheet*</label>
                                    <input type="file" class="form-control" id="12_marksheet" name="12_marksheet">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="diploma">Upload Diploma Marksheet*</label>
                                    <input type="file" class="form-control" id="diploma" name="diploma">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="degree">Upload Degree Marksheet*</label>
                                    <input type="file" class="form-control" id="degree" name="degree">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="aadhar_number">Aadhar Number*</label>
                                    <input type="number" class="form-control" id="aadhar_number" name="aadhar_number"
                                        placeholder="Enter Aadhar Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="aadhar">Upload Aadhar*</label>
                                    <input type="file" class="form-control" id="aadhar" name="aadhar">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan_number">PAN Number*</label>
                                    <input type="text" class="form-control" id="pan_number" name="pan_number"
                                        placeholder="Enter PAN Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="pan">Upload PAN*</label>
                                    <input type="file" class="form-control" id="pan" name="pan">
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group mb-0">
                                    <label for="guardian_contact">Guardian Contact*</label>
                                    <input type="text" class="form-control" id="guardian_contact"
                                        name="guardian_contact" placeholder="Enter Guardian Contact">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <div class="form-group mb-0">
                                    <label for="last_comp_hr_contact">Last Company HR*</label>
                                    <input type="text" class="form-control" id="last_comp_hr_contact"
                                        name="last_comp_hr_contact" placeholder="Enter Last Company HR Contact">
                                </div>
                            </div>
                        </div>

                        <br>
                        <h5 class="mb-0">
                            <i class="bi bi-bank"></i>
                            <b class='font-weight-bold mt-1'></b> Bank Details</b>
                        </h5>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name*</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name"
                                        placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="ifsc_code">IFSC Code*</label>
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"
                                        placeholder="Bank IFSC Code">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_account_no">Bank Account No*</label>
                                    <input type="text" class="form-control" id="bank_account_no" name="bank_account_no"
                                        placeholder="Bank Account Number">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="bank_attachment">Upload Bank Attachment*</label>
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

    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>

    <script>
    $(document).ready(function() {
        $('.showFollowup').click(function() {

            var data = $(this).attr('data-val');
            // alert(data);
            if (data == 0) {
                $(".addFollow").removeClass('d-none');
                $(this).attr('data-val', '1');
                $(this).html('-');
            } else {
                $(".addFollow").addClass('d-none');
                $(this).attr('data-val', '0');
                $(this).html('+');
            }
        });


    })
    </script>

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