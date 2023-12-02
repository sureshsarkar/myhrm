<style>
  .active{
    background-color: #24446b !important;
    color:#fff;
  font-weight: 600!important;
}
</style>
<?php
 $active = "";
if(isset($page)){
  if($page == "Home"){
    $active = "active";
  }

}
?>


<!--page start-->
<div class="page">
<!--header start-->
<header id="masthead" class="header ttm-header-style-02">
    <!-- ttm-header-wrap -->
    <div class="ttm-header-wrap">
        <!-- ttm-stickable-header-w -->
        <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
             <!-- top header start -->
            <div class="ttm-topbar-wrapper clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ttm-topbar-content">
                                <ul class="top-contact text-left">
                                    <div class="item d-flex  ">
                                        <div class="social-medias">
                                            <a href="<?= (isset($topFooter->linkedin) && !empty($topFooter->linkedin) !="")?$topFooter->linkedin:"https://www.linkedin.com/company/tech-centrica/?originalSubdomain=in"?>" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="https://www.w3.org/2000/svg" width="13.037" height="13" viewBox="0 0 16.037 16">
                                                    <path id="linkedin" d="M11.981,8.456a1.346,1.346,0,0,0-1.127-.394,1.608,1.608,0,0,0-1.427.6,2.957,2.957,0,0,0-.413,1.69v5.484a.388.388,0,0,1-.413.413H5.746a.426.426,0,0,1-.282-.113.376.376,0,0,1-.132-.3V5.7a.455.455,0,0,1,.413-.413H8.526a.379.379,0,0,1,.244.075.4.4,0,0,1,.132.225v.188a.647.647,0,0,1,.037.263A3.939,3.939,0,0,1,11.793,5.02a4.493,4.493,0,0,1,3.118,1.014A3.787,3.787,0,0,1,16.037,9v6.836a.376.376,0,0,1-.132.3.426.426,0,0,1-.282.113h-2.93a.426.426,0,0,1-.282-.113.376.376,0,0,1-.132-.3V9.677a2.012,2.012,0,0,0-.3-1.221ZM3.305,3.574a1.835,1.835,0,0,1-1.371.582A1.837,1.837,0,0,1,.563,3.574,1.926,1.926,0,0,1,0,2.184,1.869,1.869,0,0,1,.563.813,1.863,1.863,0,0,1,1.934.25,1.866,1.866,0,0,1,3.305.813a1.87,1.87,0,0,1,.563,1.371A1.922,1.922,0,0,1,3.305,3.574ZM3.793,5.7V15.837a.376.376,0,0,1-.132.3.426.426,0,0,1-.282.113H.526a.406.406,0,0,1-.3-.113.406.406,0,0,1-.113-.3V5.7a.426.426,0,0,1,.113-.282.376.376,0,0,1,.3-.132H3.38a.455.455,0,0,1,.413.413Z" transform="translate(0 -0.25)" fill="currentcolor"/>
                                                </svg>
                                            </a>
                                            <a href="<?= (isset($topFooter->facebook) && !empty($topFooter->facebook) !="")?$topFooter->facebook:"https://www.facebook.com/TechCentrica"?>" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="https://www.w3.org/2000/svg" width="13.037" height="13" viewBox="0 0 11 20">
                                                    <path id="Path_4383" data-name="Path 4383" d="M12.738,23.75h4.232V15.318h3.813l.419-4.189H16.971V9.013a1.055,1.055,0,0,1,1.058-1.053H21.2V3.75H18.029a5.277,5.277,0,0,0-5.29,5.263v2.116H10.622L10.2,15.318h2.535V23.75Z" transform="translate(-10.203 -3.75)" fill="currentcolor"/>
                                                </svg>
                                            </a>
                                            <a href="<?= (isset($topFooter->twitter) && !empty($topFooter->twitter) !="")?$topFooter->twitter:"https://twitter.com/Tech_Centrica"?>" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="https://www.w3.org/2000/svg"  width="13.037" height="13" viewBox="0 0 20 16">
                                                    <path id="twitter" d="M20.269,1.9a8.509,8.509,0,0,1-2.056,2.087q.012.175.012.525a11.312,11.312,0,0,1-.482,3.244,11.645,11.645,0,0,1-1.465,3.106,12.266,12.266,0,0,1-2.342,2.632,10.461,10.461,0,0,1-3.274,1.825,12.163,12.163,0,0,1-4.1.681A11.509,11.509,0,0,1,.269,14.188a8.9,8.9,0,0,0,.99.05,8.1,8.1,0,0,0,5.088-1.725,4.037,4.037,0,0,1-2.386-.806A3.945,3.945,0,0,1,2.515,9.712a5.291,5.291,0,0,0,.774.062,4.308,4.308,0,0,0,1.078-.137A4.042,4.042,0,0,1,2.014,8.243a3.863,3.863,0,0,1-.932-2.568v-.05a4.111,4.111,0,0,0,1.853.512A4.054,4.054,0,0,1,1.6,4.7a3.893,3.893,0,0,1-.5-1.925A3.909,3.909,0,0,1,1.665.738,11.577,11.577,0,0,0,5.4,3.719a11.561,11.561,0,0,0,4.714,1.243,4.42,4.42,0,0,1-.1-.925,3.862,3.862,0,0,1,1.2-2.856A3.98,3.98,0,0,1,14.114,0a3.98,3.98,0,0,1,2.995,1.275A8.1,8.1,0,0,0,19.71.3a3.934,3.934,0,0,1-1.8,2.225,8.268,8.268,0,0,0,2.36-.625Z" transform="translate(-0.269)" fill="currentcolor"/>
                                                </svg>
                    
                                            </a>
                                            <a href="<?= (isset($topFooter->instagram) && !empty($topFooter->instagram) !="")?$topFooter->instagram:"https://www.instagram.com/techcentrica"?>" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"  width="13.037" height="13" viewBox="0 0 19.869 19.869">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <rect id="Rectangle_327" data-name="Rectangle 327" width="19.869" height="19.869" fill="currentcolor"/>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Group_1421" data-name="Group 1421" transform="translate(0 0)">
                                                        <g id="Group_1421-2" data-name="Group 1421" transform="translate(0 0)" clip-path="url(#clip-path)">
                                                            <path id="Path_8366" data-name="Path 8366" d="M9.934,1.79c2.653,0,2.967.01,4.014.058a5.483,5.483,0,0,1,1.844.342,3.072,3.072,0,0,1,1.143.743,3.08,3.08,0,0,1,.743,1.142,5.53,5.53,0,0,1,.342,1.845c.047,1.047.057,1.362.057,4.014s-.01,2.967-.057,4.014a5.518,5.518,0,0,1-.342,1.844,3.29,3.29,0,0,1-1.886,1.886,5.483,5.483,0,0,1-1.844.342c-1.048.047-1.362.058-4.014.058s-2.967-.011-4.014-.058a5.483,5.483,0,0,1-1.844-.342,3.083,3.083,0,0,1-1.143-.743,3.076,3.076,0,0,1-.743-1.143,5.518,5.518,0,0,1-.342-1.844C1.8,12.9,1.79,12.587,1.79,9.934s.01-2.967.057-4.014a5.53,5.53,0,0,1,.342-1.845,3.08,3.08,0,0,1,.743-1.142A3.072,3.072,0,0,1,4.075,2.19,5.483,5.483,0,0,1,5.92,1.848C6.967,1.8,7.281,1.79,9.934,1.79m0-1.79c-2.7,0-3.036.011-4.1.06A7.3,7.3,0,0,0,3.427.522a4.874,4.874,0,0,0-1.76,1.146A4.864,4.864,0,0,0,.522,3.427,7.26,7.26,0,0,0,.06,5.839C.011,6.9,0,7.236,0,9.934s.011,3.036.06,4.1a7.26,7.26,0,0,0,.462,2.412A4.864,4.864,0,0,0,1.667,18.2a4.874,4.874,0,0,0,1.76,1.146,7.3,7.3,0,0,0,2.411.462c1.06.048,1.4.06,4.1.06s3.036-.011,4.1-.06a7.3,7.3,0,0,0,2.411-.462,5.078,5.078,0,0,0,2.905-2.905,7.26,7.26,0,0,0,.462-2.412c.048-1.06.06-1.4.06-4.1s-.011-3.035-.06-4.1a7.26,7.26,0,0,0-.462-2.412A4.864,4.864,0,0,0,18.2,1.668,4.874,4.874,0,0,0,16.441.522,7.3,7.3,0,0,0,14.03.06C12.97.011,12.632,0,9.934,0" transform="translate(0 0)" fill="currentcolor"/>
                                                            <path id="Path_8367" data-name="Path 8367" d="M10.6,5.494a5.1,5.1,0,1,0,5.1,5.1,5.1,5.1,0,0,0-5.1-5.1m0,8.413A3.312,3.312,0,1,1,13.907,10.6,3.312,3.312,0,0,1,10.6,13.907" transform="translate(-0.662 -0.661)" fill="currentcolor"/>
                                                            <path id="Path_8368" data-name="Path 8368" d="M18.353,5.1A1.192,1.192,0,1,1,17.161,3.91,1.192,1.192,0,0,1,18.353,5.1" transform="translate(-1.923 -0.471)" fill="currentcolor"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                    
                                        <div class="date-time">
                                            <div class="date date-holder"><?= date("D M d Y")?></div>
                                            <!-- Thu Sep 07 2023 -->
                                            <div class="time digital-clock"><?= date("h:i A")?></div>
                                        </div>
                                    </div>
                                </ul>

                                <div class="topbar-right text-right">
                                    <div class="item contact-info">
                                         <a href="tel: <?= (isset($topFooter->sales_num) && !empty($topFooter->sales_num) !="")?$topFooter->sales_num:"+91 9654 221 960, +91 9599 200 280"?>" class="phone">
                                            <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="20.107" height="20.107" viewBox="0 0 20.107 20.107">
                                                <defs>
                                                    <clipPath id="clip-path">
                                                        <rect id="Rectangle_662" data-name="Rectangle 662" width="31.107" height="31.107" fill="none"/>
                                                    </clipPath>
                                                </defs>
                                                <g id="Group_2178" data-name="Group 2178" transform="translate(0 0)">
                                                    <g id="Group_2177" data-name="Group 2177" transform="translate(0 0)" clip-path="url(#clip-path)">
                                                        <path id="Path_8704" data-name="Path 8704" d="M27.627,22.993l-2.434-2.434a1.723,1.723,0,0,0-2.434,0l-1.106,1.106a1.305,1.305,0,0,1-1.844,0l-4.8-4.8a1.3,1.3,0,0,1,0-1.844l1.106-1.107a1.719,1.719,0,0,0,0-2.434L13.687,9.056a1.723,1.723,0,0,0-2.432,0l-.887.879a6.214,6.214,0,0,0,0,8.777l7.6,7.6a6.2,6.2,0,0,0,8.777,0l.885-.885a1.722,1.722,0,0,0,0-2.433M24.382,21.37,26.816,23.8a.574.574,0,0,1,0,.812l-.405.406-3.246-3.246.406-.406a.575.575,0,0,1,.811,0M12.876,9.868l2.433,2.425a.573.573,0,0,1,0,.812l-.405.406L11.66,10.267l.4-.4a.575.575,0,0,1,.812,0m5.9,15.633-7.6-7.6a5.043,5.043,0,0,1-.316-6.807L14.1,14.325a2.449,2.449,0,0,0,.106,3.352l4.8,4.8h0a2.449,2.449,0,0,0,3.352.107l3.233,3.234a5.034,5.034,0,0,1-6.807-.317" transform="translate(-8.788 -8.788)" fill="currentcolor"/>
                                                    </g>
                                                </g>
                                            </svg>Sales Enquiry :<?= (isset($topFooter->sales_num) && !empty($topFooter->sales_num) !="")?$topFooter->sales_num:"+91 9654 221 960, +91 9599 200 280"?> | </a> 
                                        <a href="tel: <?= (isset($topFooter->job_num) && !empty($topFooter->job_num) !="")?$topFooter->job_num:"+91 9654 221 960, +91 9599 200 280"?>" class="phone">
                                        <img src="<?= base_url()?>assets/images/businessman.png" class="job">
                                            Job Enquiry : <?= (isset($topFooter->job_num) && !empty($topFooter->job_num) !="")?$topFooter->job_num:"+91 9599 200 281"?>
                                        </a>
                                    </div> 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>  
            </div>

           <!-- top header end -->


            
            <!-- main menu start -->
            <div class="container">
                <a class="logo" href="<?= base_url()?>" title="Website Designing & Web Development Company in Noida, NCR">
                   <img class="logonew"  src="<?= base_url()?>assets/images/logo.png" alt="Website Designing & Web Development Company in Noida, NCR" title="Website Designing & Web Development Company in Noida, NCR" style="height: auto;width: auto; ">
                </a>
                <nav>
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                    <?php 
                                            if(!empty($categoryMenu)){
                                            foreach ($categoryMenu['category'] as $key => $value){?>
                    <li class="dropdown">
                    <?php if($value->cat_name =="Home"){?>
                                                <a href="<?= base_url();?>" class="<?= (isset($page) && $page==$value->cat_name)?"active":""?>"><?= $value->cat_name?></a>
                                                <?php }else{?>
                                                    <a href="<?= base_url().$value->slug?>" class="dropdown-toggle <?= (isset($page) && $page==$value->cat_name)?"active":""?>"><?= $value->cat_name?></a>

                        <ul class="dropdown-menu">
                        <?php foreach ($categoryMenu['subCategory'] as $k => $v) {
                                                            if($key==$v->category_id){
                                                            $catName = strtolower($value->cat_name);
                                                            $catName = str_replace(' ', '-', $catName);
                                                            ?>
                                                            <li><a href="<?= base_url().$v->slug;?>" title="<?= $v->sub_category_name;?>" class="<?= (isset($pageName) && $pageName==$v->slug)?"active":""?>"><?= $v->sub_category_name;?></a></li>
                                                            <?php }}?>
                        </ul>
                        <?php }?>
                    </li>
                    <?php }}?>
                    <a href="contact-us.html">
                        <button class="get_btn">REQUEST A CALL<img  src="<?= base_url()?>assets/images/cloud-patteren.png" alt="cloud-patteren" style="  position: absolute;top: 34px; right: 16px; width: 100px;">
                           <img class="rocket" src="<?= base_url()?>assets/images/rocket-icon.png" alt="rocket-icon">
                        </button>
                    </a>
                </ul>
                </nav>
            </div><!-- main menu end -->
        </div>
    </div>
</header>
<!-- ========== HEADER End========== -->

