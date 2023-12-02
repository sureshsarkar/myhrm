<style>
.boxData{
    border: 1px solid gray;
    border-radius: 5px;
    padding: 5px;
    cursor: pointer;
}
.boxData:hover{
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.dateForntData{
    font-weight: 500;
    font-size: 14px;

}
.dateForntTime{
    text-align: center;
}
.boxData{
    margin-bottom:4px;
}
.pTitle{
    font-weight: 500;
    white-space: nowrap !important;
   overflow: hidden !important;
   text-overflow: ellipsis !important;
}
.dayActive{
    background: #f0ffb4;
}
</style>

<div class="section-body">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="container-fluid px-0 list list-row p-0">
                    <div class="row mx-0 card-header py-1">
                        <div class="col-sm-6 col-md-6">
                            <div class=" ">
                                <h3 class="card-title font-weight-bold">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3656/3656845.png"
                                        style="width: 30px;"> Events 
                                </h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 p-0">
                        <div class="card">
                            <div class="row">
                                <?php foreach ($eventData as $k => $v) {?>
                                    <div class="col-md-2 col-sm-6 col-lg-2 col-lx-2">
                                        <div class="boxData <?php echo ($v->event_date == date("Y-m-d"))?'dayActive':''?>">
                                            <div class="dateForntData"><?= date("l Y-m-d",strtotime($v->event_date))?></div>
                                            <div class="dateForntTime"><?= date("h:i A",strtotime($v->event_time))?></div>
                                            <p class="pTitle"><?= $v->event_heading?></p>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>