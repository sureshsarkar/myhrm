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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item">
                    <!-- <a class="nav-link active" id="Employee-tab" href="<?= base_url() ?>admin/jobportal/applicant">All</a> -->
                </li>
            </ul>
            <br>
            <br>
            <a href="<?= base_url()?>admin/jobportal/job" style="display: inline-block;float: inline-end;">
                <button class="btn btn-primary "><i class="bi bi-arrow-left"></i> Back</button>
            </a>
        </div>

        <div class="row">

            <!-- left column -->

            <div class="col-md-12">

                <!-- general form elements -->

                <div class="container-fluid list list-row cardBox p-4">
                    <h3 class='border-bottom pb-2 textColor'>
                        <i class="bi bi-pencil-square bg-none text-blue"></i> Edit Job
                    </h3>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $edit_data->id?>">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="designation">Designation*</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder="Name" value="<?= $edit_data->designation?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Experience">Require Experience*</label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    value="<?= $edit_data->experience?>" placeholder="Experience" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date limit">Date Limit*</label>
                                <input type="date" class="form-control" id="date_limit"
                                    value="<?= $edit_data->date_limit?>" name="date_limit" placeholder="Date Limit"
                                    required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cv">Attachment*</label>
                                <input type="file" class="form-control" name="attachment" required>
                                <input type="hidden" name="old_attachment" value="<?= $edit_data->attachment?>">
                            </div>
                            <div class="form-group col-md-1 mt-4">
                                <a href="<?= base_url().$edit_data->attachment?>" title="View Attachment"
                                    target="_blank">
                                    <div type="text" class="submitBtn btn btn-primary font-weight-bold mt-2 py-2">View
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="form-group col-md-2 mt-4">
                            <button type="submit"
                                class="submitBtn btn btn-primary font-weight-bold mt-2 py-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer'); ?>

    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>