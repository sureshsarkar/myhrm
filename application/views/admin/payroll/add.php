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
    border-radius: 11px !important;
    height: 61px;
}

select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 11px !important;
    height: 61px !important;
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
    width: 90px;
    padding: 5px 11px;
    font-size: 21px;
    border-radius: 8px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    background: #009688;
    color: #ffff;
}
</style>
<?php $this->load->view('header'); ?>

<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>admin/payroll">All</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>admin/payroll/view/12">View</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>admin/payroll/leave">Leave Request</a>
                </li>
            </ul>
            <div class="header-action">
                <a href="<?= base_url() ?>admin/payroll/add">
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-file-plus"></i> Add</button>
                </a>
            </div>
        </div>

        <div class="row">

            <!-- left column -->

            <div class="col-md-12">

                <!-- general form elements -->

                <div class="container-fluid list list-row cardBox p-4">

                    <h3> Add Employee </h3>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name*</label>
                                <input type="text" class="form-control" id="firstName"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name*</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter your last name"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile*</label>
                                <input type="number" class="form-control" id="mobile"
                                    placeholder="Enter your mobile number" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender*</label>
                                <select class="form-control" id="gender" required>
                                    <option value="">Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="designation">Designation*</label>
                                <input type="text" class="form-control" id="designation"
                                    placeholder="Enter your designation" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Select Department*</label>
                                <select class="form-control" id="department" required>
                                    <option>Select department</option>
                                    <option value="development">Development</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="Designing">Designing</option>
                                    <option value="finance">Finance</option>
                                    <option value="hr">HR</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" rows="3"
                                placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="education">Education</label>
                            <textarea class="form-control" id="education" rows="3"
                                placeholder="Enter your education"></textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="submitBtn">Submit</button>
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