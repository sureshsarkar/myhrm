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
    border-radius: 4px ! important;
    /* height: 61px; */
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
                                    <img src="https://cdn-icons-png.flaticon.com/128/1022/1022215.png"
                                        style="width: 30px;">Edit Holiday Form
                                </h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="header-action " style="float:right;">
                                <a href="<?= base_url()?>admin/holiday" title="Go Back">
                                    <button type="button" class="btn add_btn"><img
                                            src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                            style="width: 20px;margin-top: -6px;" alt="">
                                        Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $edit_data->id ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date_from"> Holiday From*</label>
                                <input type="date" class="form-control" id="date_from" name="date_from"
                                    placeholder="Enter Holiday date" value="<?= $edit_data->date_from ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_to">Holiday To*</label>
                                <input type="date" class="form-control" id="date_to" value="<?= $edit_data->date_to ?>"
                                    name="date_to" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="holiday_reason">Holiday Reson*</label>
                                <input type="text" class="form-control" id="holiday_reason"
                                    value="<?= $edit_data->holiday_reason ?>" name="holiday_reason"
                                    placeholder="Enter Holiday Reason" required>
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