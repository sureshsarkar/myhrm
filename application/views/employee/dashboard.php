<style>
.eventGIF {
    position: absolute;
    z-index: 9;
    right: 79px;
    width: -webkit-fill-available !important;
    /* bottom:600px; */
}

.celebratGIF {
    position: absolute;
    z-index: 9;
    width: -webkit-fill-available !important;
    bottom: 108px;
}

.overFlowY {
    overflow-y: scroll;
}

.wishmediv {
    max-height: 427px;
    /* border: 1px solid #d3d1d1 !important; */
    margin-top: 5px;

}

.bi-hand-thumbs-up-fill {
    color: #2196f3;
}

.userAvtar {
    color: #4D5052;
    font-weight: 600;
    width: 28px;
    height: 28px;
    line-height: 2rem;
    border-radius: 50%;
    display: inline-block;
    background: #808488 no-repeat center/cover;
    position: relative;
    vertical-align: bottom;
    font-size: .875rem;
    user-select: none;
}

.Paddd {
    padding: 5px;
}

.pContent {
    font-size: 12px;
    width: 140px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.wishMee {
    cursor: pointer;
}

.commentData {
    background: #f0f2f5;
    padding: 3px 11px;
    border-radius: 16px;
    font-size: 15px;
    font-family: 'calibri';
    line-height: normal;
}

.mycomment {
    padding: 10px 14px;
    margin-bottom: 5px;
}

.medel_com {
    overflow-y: scroll;
    max-height: 300px;
}

.empNameComment {
    font-size: 20px;
}

.leaveMeDiv {
    border: 1px solid #d5d4d4;
    border-radius: 5px;
}

.btnLike {
        padding: 0px 27px 8px 27px;
    cursor: pointer;
}

.btnLike:hover {
        padding: 0px 27px 8px 27px;
    cursor: pointer;
    background: #f0f2f5;
    border-radius: 5px;
}

.btnComment {
        padding: 0px 27px 8px 27px;
    cursor: pointer;
}

.btnComment:hover {
        padding: 0px 27px 8px 27px;
    cursor: pointer;
    background: #f0f2f5;
    border-radius: 5px;
}

.bgcomme {
    border-radius: 7px;
    margin-bottom: 7px;
}

.lineHR {
    padding: 0px 0px;
    border-bottom: 1px solid #a0aba6;
    margin-bottom: 2px;
}

.OverFlowYOfComm {
    height: 440px;
    overflow-y: scroll;
}

.overflow_x_none {
    overflow-x: hidden;
}

.border_r {
    border-radius: 6px 0px 0px 6px;
}

.radius_top_right {
    border-radius: 0px 6px 0px 0px;
}

.radius_botton_right {
    border-radius: 0px 0px 6px 0px;
}
</style>


<!---------------------------------------------->
<style>
.photos-grid-con {
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
    grid-gap: 0;
    align-items: start;
}

@media (max-width: 580px) {
    .photos-grid-con {
        grid-template-columns: 1fr;
    }
}

.photos-grid-con .img-boxs {
    border: 1px solid #fff;
    position: relative;
}

.photos-grid-con .img-boxs:hover .transparent-boxs {
    background-color: rgba(0, 0, 0, 0.6);
}

.photos-grid-con .img-boxs:hover .captions {
    transform: translateY(-5px);
}

.photos-grid-con img {
    max-width: 100%;
    display: block;
    height: auto;
}

.photos-grid-con .captions {
    color: white;
    transition: transform 0.3s ease, opacity 0.3s ease;
    font-size: 1.5rem;
}

.photos-grid-con .transparent-boxs {
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    transition: background-color 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

.photos-grid-con .main-photos {
    grid-row: 1;
    grid-column: 1;
}

.photos-grid-con .subs {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-gap: 0em;
}

.photos-grid-con .subs:nth-child(0) {
    grid-column: 1;
    grid-row: 1;
}

.photos-grid-con .subs:nth-child(1) {
    grid-column: 2;
    grid-row: 1;
}

.photos-grid-con .subs:nth-child(2) {
    grid-column: 1;
    grid-row: 2;
}

.photos-grid-con .subs:nth-child(3) {
    grid-column: 2;
    grid-row: 2;
}

.hide-elements {
    border: 0;
    clip: rect(1px 1px 1px 1px);
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
</style>

<?php if(!isset($_COOKIE['celebration_image'])){?>
    <img src="<?= base_url()?>assets/images/celebration.gif" class="celebratGIF">
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $(".celebratGIF").addClass('d-none');
            }, 2000);
        })
    </script>
<?php }?>

<?php
    // Set the cookie with a 24-hour expiration time
    $cookie_name = "celebration_image";
    $cookie_value = "1";
    $expiration_time = time() + (12 * 60 * 60); // 12 hours in seconds

    setcookie($cookie_name, $cookie_value, $expiration_time, "/");
    ?>

<!-- main content start -->
<div class="section-body mt-3">
    <div class="containers-fluid p-0">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4">
                    <h4 class='text-uppercase'> <b>
                            Step into the HR & Payroll future with TCHRMS.
                        </b></h4>
                    <small class='text-muted'>Say goodbye to repetitive tasks and
                        shift towards a strategic approach to employee management. Embrace this transformation with
                        TCHRMS, opening doors to unlock your organization’s true potential.<br>
                    </small>

                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#f7fde7;">
                    <a href='<?= base_url() ?>employee/salary'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/salary.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalSalary) && !empty($totalSalary)) ? $totalSalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Salary
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href='<?= base_url() ?>employee/attendance'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/salary.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalAttandance) && !empty($totalAttandance)) ? $totalAttandance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Attendance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#fde7fc;">
                    <a href='<?= base_url() ?>employee/holiday'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/dates.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalHoliday) && !empty($totalHoliday)) ? $totalHoliday : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Holidays
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href='<?= base_url() ?>employee/leavemanagement'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/leave.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalLeave) && !empty($totalLeave)) ? $totalLeave : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Leave
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#cef3d3ab;">
                    <a href='<?= base_url()?>employee/job'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/website.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalJobs) && !empty($totalJobs)) ? $totalJobs : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Job Portal
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#f3daceb0;">
                    <a href='<?= base_url()?>employee/performance'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/report.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalPerformance) && !empty($totalPerformance)) ? $totalPerformance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Performence
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- events start  -->

<div class="section-body">
    <div class="row g-2 clearfix row-deck">
        <div class="col-xl-3 col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-header border-0 py-0">
                    <h5>Highlights </h5> <span class="badge bg-inverse-success fs_9"> Today Events
                        <?= (isset($eventEvent))?$eventEvent:''?></span>
                </div>
                <img src="<?= base_url()?>assets/images/eventcelebrate.gif" class="eventGIF">
                <div class="list-group list-group-custom list-group-flush wishmediv">
                    <ol class="list-group list-group-numbered overFlowY">
                        <?php if(isset($eventsData) && count($eventsData)>0){
                            foreach ($eventsData as $k => $v) {
                                $commentData = json_decode($v->commentData);
                               
                                ?>
                        <li class="d-flex justify-content-between align-items-start Paddd">
                            <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight">
                                <img class="userAvtar" src="<?= base_url()?>assets/images/event.png" alt=""
                                    data-toggle="tooltip" data-placement="right" title=""
                                    data-original-title="User Menu">
                            </a>
                            <div class="ms-2 me-auto">
                                <div
                                    class="fw-bold fs12_4 <?= ($v->event_date == date("Y-m-d"))?'blinking-text badge bg-inverse-success':''?>">
                                    <?= $v->event_heading?></div>
                                <p class="pContent"><?= $v->event_content?></p>
                            </div>

                            <span class="badge bg-inverse-success rounded-pill wishMee" data-toggle="modal"
                                data-target="#eventCommentModal<?= $v->id?>">Wish</span>

                            <!-- modal start  -->
                            <div class="modal show" id="eventCommentModal<?= $v->id?>"
                                data-target="#eventCommentModal<?= $v->id?>" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="leaveFormApprovalModalTitle">
                                                <?= $v->event_heading?>
                                            </h5>
                                            <button type="button" class="close text-primary " data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="post" id="myForm">
                                            <div class="modal-body">
                                                <div class="border-calendera ">
                                                    <div class="attendancesheet">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-12">
                                                                <div class="medel_com">
                                                                    <?php
                                                                if(!empty($commentData)){
                                                                foreach ($commentData as $key => $value) {?>
                                                                    <div class="d-flex flex-row mb-3">
                                                                        <div class="p-1">
                                                                            <img class="userAvtar"
                                                                                src="<?= base_url()?>assets/images/event.png">
                                                                        </div>
                                                                        <div class="commentData">
                                                                            <?php foreach ($allEmployee as $a => $b) {
                                                                                if($b->id==$value->employeeId){
                                                                                ?>
                                                                            <div class="fw-bold fs15">
                                                                                <?= $b->fname.' '.$b->lname?>
                                                                            </div>
                                                                            <?php }}?>
                                                                            <?= $value->comment?> <br>
                                                                            <span
                                                                                class="badge bg-inverse-success"><?= date("h:i A",strtotime($value->dt))?></span>
                                                                        </div>
                                                                    </div>
                                                                    <?php }}?>
                                                                    <div class="addCommentDiv"></div>

                                                                </div>
                                                                <div class="d-flex flex-row mb-3">
                                                                    <div class="p-1" style="display: contents;">
                                                                        <input type="hidden" name="event_id"
                                                                            value="<?= $v->id?>">
                                                                        <input type="text"
                                                                            class="form-control mycomment"
                                                                            name="mycomment"
                                                                            placeholder="Write a comment...">
                                                                    </div>
                                                                    <button type="submit" class="mt-0 ml-1 submitForm"
                                                                        event_id="<?= $v->id?>" comment_data=""
                                                                        style="border:none;background:none;">
                                                                        <img src="<?= base_url()?>assets/images/send.png"
                                                                            style="width:30px;">
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end  -->
                        </li>
                        <?php }}?>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card" style="padding: 0px;">
                <div class="card-header border-0">
                    <h5 class="gfgtg">Event Posts</h5>
                </div>
                <div class="pb-3">
                    <div class="card-body p-1 overflow_x_none OverFlowYOfComm">
                        <!-- --------------------------------------------->
                        <?php if(isset($eventsData) && count($eventsData)>0){
                            foreach ($eventsData as $k => $v) {
                                if(isset($v->event_attachment) && !empty($v->event_attachment)){
                                    $attachment = json_decode($v->event_attachment);
                                    $commentData = json_decode($v->commentData);
                                    $like_count = $v->like_count;
                                }
                        ?>
                        <div class="row">
                            <h6 class="text-left"><?= $v->event_heading?></h6>
                            <div id="gallery" class="photos-grid-con gallery">
                                <div class="main-photos img-boxs">
                                    <img style="width:271px;height:271px;"
                                        src="<?= (isset($attachment[0]))?base_url().$attachment[0]:"https://blog.hubspot.com/hubfs/Site%20owners%20building%20carousel%20slider%20in%20Bootstrap%20CSS.jpg";?>" />
                                </div>
                                <div>
                                    <div class="subs">
                                        <div class="img-boxs">
                                            <img style="width:135px;height:135px;"
                                                src="<?= (isset($attachment[1]))?base_url().$attachment[1]:"https://blog.hubspot.com/hubfs/Site%20owners%20building%20carousel%20slider%20in%20Bootstrap%20CSS.jpg";?>" />
                                        </div>
                                        <div class="img-boxs">
                                            <img style="width:135px;height:135px;"
                                                src="<?= (isset($attachment[2]))?base_url().$attachment[2]:"https://blog.hubspot.com/hubfs/Site%20owners%20building%20carousel%20slider%20in%20Bootstrap%20CSS.jpg";?>" />
                                        </div>
                                        <div class="img-boxs">
                                            <img style="width:135px;height:135px;"
                                                src="<?= (isset($attachment[3]))?base_url().$attachment[3]:"https://blog.hubspot.com/hubfs/Site%20owners%20building%20carousel%20slider%20in%20Bootstrap%20CSS.jpg";?>" />
                                        </div>
                                        <div id="multi-link" class="img-boxs">
                                            <img style="width:135px;height:135px;"
                                                src="<?= (isset($attachment[4]))?base_url().$attachment[4]:"https://blog.hubspot.com/hubfs/Site%20owners%20building%20carousel%20slider%20in%20Bootstrap%20CSS.jpg";?>"
                                                alt="image" />
                                            <?php if(count($attachment)>5){?>
                                            <div class="transparent-boxs">
                                                <div class="captions">
                                                    +<?= count($attachment)-5?>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    //    function to get you like or not 
                          $likeMe = getLikeOrNot($v->id);
                        ?>
                        <div class="d-flex justify-content-between">
                            <div class="px-4">
                                <img src="<?= base_url()?>assets/images/like.png" style="width:18px;"
                                    class="<?= 'likeIcon_'.$v->id?>"> <span class="<?= '_'.$v->id?>"
                                    data_like_count="<?= $like_count;?>"><?= (isset($like_count) && $like_count !=0)?$like_count:0;?></span>
                            </div>
                            <div class="px-4">
                                <?= (isset($commentData) && !empty($commentData))?count($commentData):0;?>
                                <i class="bi bi-chat"></i>
                            </div>
                        </div>
                        <div class="lineHR"></div>
                        <div class="bgcomme">
                            <div class="d-flex justify-content-between">
                                <div class="btnLike" data_id="<?= $v->id?>"
                                    data_status="<?= (isset($likeMe) && $likeMe == 1)?'0':'1'?>"><i
                                        class="bi bi-hand-thumbs-up<?= (isset($likeMe) && $likeMe == 1)?'-fill':''?> fs_25"></i>
                                    Like
                                </div>
                                <div class="btnComment" data-toggle="modal"
                                    data-target="#eventCommentModal<?= $v->id?>"><i class="bi bi-chat fs_25"></i>
                                    Comment
                                </div>
                            </div>
                        </div>
                        <?php }}?>
                        <!----------------------------------------------->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-header border-0 py-0">
                    <h5>Highlights</h5>
                </div>
                <div class="list-group-custom list-group-flush mt-1 mb-1">
                    <div class="list-group-custom list-group-flush d-flex leaveMeDiv" style="flex-direction: row;">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center me-3"> </div>
                            <div class="content">
                                <div class="textcus">Privilege Leave</div>
                                <h5 class="mb-0 vfgb counter ">18</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="icon text-center me-3"> </div>
                            <div class="content">
                                <div class="textcus">Casual Leave</div>
                                <h5 class="mb-0 vfgb counter ">
                                    <?= (isset($casualLeave) && !empty($casualLeave))?count($casualLeave):0;?></h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- events end -->

<div class="section-body">
    <footer class="footer">
        <div class="containers-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-center">
                        Copyright © 2023 <a href="#">TechCentrica HRMS.</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- main content end -->


<script>
$(document).ready(function() {
    $(".submitForm").on('click', function(e) {
        e.preventDefault();
        // Get form data
        var event_id = $(this).attr("event_id");
        var mycomment = $(this).attr("comment_data");
        var base_url = "<?php echo base_url()?>";
        var name = "<?php echo $_SESSION['name']?>";
        var time = getTime();

        if (mycomment == "") {
            alert("Enter Comments");
            return false;
        }

        var html = '';
        html += '<div class="d-flex flex-row mb-3">';
        html += '<div class="p-1">';
        html += '<img class="userAvtar" src="' + base_url + 'assets/images/event.png">';
        html += '</div>';
        html += '<div class="commentData">';
        html += '<div class="fw-bold fs15">' + name + '</div>' + mycomment + '<br>';
        html += '<span class="badge bg-inverse-success">' + time + '</span>';
        html += '</div>';
        html += '</div>';

        var URLLink = "<?= base_url()?>employee/events/addComment";
        // Fetch API to send the form data to the server
        $.ajax({
            type: "POST",
            url: URLLink,
            data: {
                event_id: event_id,
                mycomment: mycomment
            }, // serializes the form's elements.
            success: function(responce) {
                $('.addCommentDiv').append(html);

                var scrollableDiv = $(".medel_com");

                scrollableDiv.scrollTop(scrollableDiv.scrollTop() + 1000);

                return false;
            }
        });


    });

    var getTime = () => {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        // Convert hours to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // If hours is 0, set it to 12

        // Add leading zeros to minutes if needed
        minutes = minutes < 10 ? '0' + minutes : minutes;

        // Display the time in the desired format
        var formattedTime = hours + ':' + minutes + ' ' + ampm;
        return formattedTime;
    }
});
</script>

<script>
$(document).ready(function() {
    $(".mycomment").on('keyup', function(e) {
        $(".submitForm").attr("comment_data", $(this).val());
    });
});
</script>

<script>
$(document).ready(function() {
    $(".btnLike").on('click', function(e) {
        var data_status = $(this).attr("data_status");
        var data_id = $(this).attr("data_id");
        var data_like_class = "._" + data_id;
        var likeIconClass = ".likeIcon_" + data_id;
        let likeCount = $(data_like_class).attr("data_like_count");

        if (data_status == 1) {
            $(this).find("i").removeClass("bi-hand-thumbs-up");
            $(this).find("i").addClass("bi-hand-thumbs-up-fill");
            $(this).attr("data_status", 0);
            likeFun(data_id);
            likeCount = Number(likeCount) + 1;
            $(data_like_class).html(likeCount)
            $(data_like_class).attr("data_like_count", likeCount);
            zoomLikeIcon(likeIconClass);

        } else {
            $(this).find("i").removeClass("bi-hand-thumbs-up-fill");
            $(this).find("i").addClass("bi-hand-thumbs-up");
            $(this).attr("data_status", 1);
            likeFun(data_id);
            likeCount = Number(likeCount) - 1;
            $(data_like_class).html(likeCount);
            $(data_like_class).attr("data_like_count", likeCount);
            zoomLikeIcon(likeIconClass);
        }
    });
});

// zoom like icon function 
let zoomLikeIcon = (likeIconClass) => {
    $(likeIconClass).css('transform', 'scale(1.5)');
    setTimeout(function() {
        $(likeIconClass).css('transform', 'scale(1)');
    }, 300);
}

// like function 
function likeFun(id) {
    var URLLink = "<?= base_url()?>employee/events/addLike";
    $.ajax({
        type: "POST",
        url: URLLink,
        data: {
            id: id
        },
        success: function(responce) {
            console.log(responce);
        }
    });
}
</script>