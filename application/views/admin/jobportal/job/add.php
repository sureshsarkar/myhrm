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
.form-control{
    height: 67%!important;
    border: 1px solid #1a508952!important;
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

.textColor{
    color: #1a5089;
}
</style>
<?php $this->load->view('header'); ?>

<!-- <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script> -->

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
                <!-- <li class="nav-item"><a class="nav-link active" id="Employee-tab"
                        href="<?= base_url() ?>admin/jobportal/applicant">All</a></li> -->
            </ul>
            <br>
            <br>
            <div class="header-action">
                <a href="<?= base_url() ?>admin/jobportal/job" title="Back to Job Portal">
                    <button type="button" class="btn add_btn"><i class="bi bi-arrow-left"></i>Back </button>
                </a>
            </div>
        </div>

        <div class="row">

            <!-- left column -->

            <div class="col-md-12">

                <!-- general form elements -->

                <div class="container-fluid list list-row cardBox p-4">
                    <h3 class='border-bottom pb-2 textColor'>
                      <i class="bi bi-plus-square-fill"></i> Add Job
                    </h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="designation">Designation*</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder="Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Experience">Require Experience*</label>
                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date limit">Date Limit*</label>
                                <input type="date" class="form-control" id="date_limit" name="date_limit"
                                    placeholder="Date Limit" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cv">Attachment*</label>
                                <input type="file" class="form-control" name="attachment" required>
                            </div>
                            <div class="form-group col-md-2 mt-4">
                                <button type="submit"
                                    class="submitBtn btn btn-primary font-weight-bold mt-2 py-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer'); ?>

    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>