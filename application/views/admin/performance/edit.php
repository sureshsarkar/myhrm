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

th {
    text-align: left;
    text-transform: none;
}



.textClass {
    width: 100%;
    height: 32px;
    border-radius: 6px;
}

.table td,
.table th {
    padding: 4px !important;
    vertical-align: top !important;
    border-top: 1px solid #dee2e6 !important;
    width: 30%;
}

.card-header {
    border: none;
}

.submitBtn{
    box-shadow: 0px 4px 8px -4px rgba(58, 53, 65, 0.42);
    background-image: linear-gradient(98deg, #de6057, #f7973d 94%) !important;
    border-radius: 5px 25px 25px 5px !important;
    color: #fff !important;
    font-size: 16px;
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
                                        src="https://cdn-icons-png.flaticon.com/128/1022/1022215.png"
                                        style="width: 30px;" alt="">
                                    Performance Info</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="header-action" style="float:right;">
                                    <a href="<?= base_url()?>admin/performance">
                                        <button type="button" class="btn add_btn" fdprocessedid="h2qxt6"><img
                                                src="https://cdn-icons-png.flaticon.com/128/2223/2223615.png"
                                                style="width: 20px;margin-top: -6px;" alt="">
                                            Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="media-body row p-0">
                                <div class="col-md-6 col-lg-6 p-0">
                                    <div class="table">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th><i class="bi bi-person-check-fill text-info"></i> Month
                                                </th>
                                                <td> <?= $edit_data->month?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="bi bi-person-check-fill text-info"></i> Document
                                                </th>
                                                <td> <?php if(!empty($edit_data->document)){?>
                                                    <a href="<?= base_url().$edit_data->document?>" target="_blank">
                                                        <i class="bi bi bi-eye-fill"></i>
                                                    </a>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 p-0">
                                    <div class="table">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th><i class="bi bi-person-check-fill text-info"></i> Rating
                                                </th>
                                                <td><?= '10/'.$edit_data->rating?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="bi bi-person-check-fill text-info"></i> Created
                                                </th>
                                                <td><?= $edit_data->created_at?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <!----------------------->
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <div class="card card-primary p-0">
                                        <div class="content-header px-0">
                                            <div class="col-sm-6">

                                                <h1 class=" ml-3" style="text-align:left;">
                                                <img src="https://cdn-icons-png.flaticon.com/512/12181/12181644.png" style="width:5%;"> Add Performance Rating </h1>

                                            </div>
                                        </div>
                                        <form action="" id="" class="form-horizontal " method="post">
                                            <input type="hidden" name="id" value="<?= $edit_data->id?>">
                                            <div class="card-body"
                                                style=" background: #ffff002e; border: 2px solid white;">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile" style="font-size: 17PX;"><i class="bi bi-chat-dots"></i> Enter Your Comments*</label>
                                                                            <textarea name="note" class="textClass"
                                                                                placeholder="Enter Performance Note" style="border: 1px solid #b3afaf;">
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputFile"><i class="bi bi-calendar-date-fill"></i>Rating*</label>
                                                                                    <select name="rating" class="form-control">
                                                                                        <option>Please Select</option>
                                                                                        <option value="2">10/2</option>
                                                                                        <option value="4">10/4</option>
                                                                                        <option value="6">10/6</option>
                                                                                        <option value="8">10/8</option>
                                                                                        <option value="10">10/10</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                           
                                                                            <div class="col-md-4 mt-4">
                                                                                <button type="submit" class="btn add_btn">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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