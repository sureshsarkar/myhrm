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

label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 600 !important;
    color: #1a5089;
}

.select {
    height: 45px !important;
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--bs-body-color);
    background-color: var(--bs-body-bg);
    background-clip: padding-box;
    border: var(--bs-border-width) solid var(--bs-border-color);
    border-radius: var(--bs-border-radius);
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
</style>
<?php $this->load->view('header'); ?>

<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid list list-row cardBox p-4">
                    <div class="row mb-2 card-header py-1">
                        <div class="col-sm-6 col-md-6">
                            <div class=" ">
                                <h3 class="card-title font-weight-bold">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3652/3652191.png"
                                        style="width: 30px;">Leave Form
                                </h3>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="header-action " style="float:right;">
                                <a href="<?= base_url()?>admin/leavemanagement" title="Go Back">
                                    <button type="button" class="btn add_btn"><img
                                            src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                            style="width: 20px;margin-top: -6px;" alt="">
                                        Back</button>
                                </a>
                            </div>

                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="leave_date_from">Leave From*</label>
                                <input type="date" class="form-control" id="leave_date_from" name="leave_date_from"
                                    placeholder="Enter leave date" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="leave_date_to">Leave To*</label>
                                <input type="date" class="form-control" id="leave_date_to" name="leave_date_to"
                                    required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="leave_date_to">Nature Of Leave*</label>
                                <select name="nature_of_leave" class="form-control1 select" required>
                                    <option value="1"><?= $this->config->item('leave_type')[1]?></option>
                                    <option value="2"><?= $this->config->item('leave_type')[2]?></option>
                                    <option value="3"><?= $this->config->item('leave_type')[3]?></option>
                                    <option value="4"><?= $this->config->item('leave_type')[4]?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="leave_reson">Leave Reson*</label>
                                <input type="text" class="form-control" id="leave_reson" name="leave_reson"
                                    placeholder="Enter leave reson" required>
                            </div>
                            <div class="form-group col-md-2">
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