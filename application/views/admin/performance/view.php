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
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                    <div class="row mb-2 card-header fvgfb">
                                <div class="col-sm-6 col-md-6">
                                    <h3 class="card-title font-weight-bold"><img
                                            src="<?= base_url()?>assets/images/users-icons.png" style="width: 30px;"
                                            alt="">
                                            Performance Info</h3>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="header-action" style="float:right;">
                                        <a href="<?= base_url()?>admin/performance">
                                            <button type="button" class="btn add_btn" fdprocessedid="h2qxt6"><img src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png" style="width: 20px;margin-top: -6px;" alt="">
                                        Back</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                
                        <div class="card-body pt-0 pb-0">
                            <div class="media-body row p-0">

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-telephone-inbound"></i>Month:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->month?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-envelope"></i>Rating:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= '10/'.$view_data->rating?>" disabled="" fdprocessedid="pzphkl">
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"> <img src="https://cdn-icons-png.flaticon.com/128/3073/3073412.png" style="width:30px;"> document:</label><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if(!empty($view_data->document)){?>
                                        <a href="<?= base_url().$view_data->document?>" target="_blank">
                                         <i class="bi bi bi-eye-fill"></i>
                                        </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="form-group">
                                        <label type="text"><i class="bi bi-calendar-check"></i> Created
                                            Date:</label><br>
                                        <input type="text" class="form-control classified"
                                            value="<?= $view_data->created_at?>" disabled="" fdprocessedid="pzphkl">
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
