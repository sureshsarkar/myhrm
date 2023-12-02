<style>
    .featured-desc{
        color:#606060;
    }
</style>

	<!-- services-section -->
    <section id="services" style="margin-bottom:50px;" >
                <div class="container">
                    <div class="row"><!-- row -->
                        <div class="col-lg-7 col-md-7 col-sm-10 m-auto">
                            <!-- section title -->
                            <div class="section-title with-desc text-center clearfix">
                                <div class="title-header">
                                    <h2 class="title"><?= (isset($topFooter->work_heading) && !empty($topFooter->work_heading) !="")?$topFooter->work_heading:"How Do We Work Process?"?></h2>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    <!-- row end -->
                    <div class="ttm-boxes-quickservicebox position-relative mt-10">
                        <div class="history-slide owl-carousel" data-item="3" data-nav="false" data-dots="false" data-auto="true">
                            <?php if(isset($topFooter->card_data)){
                                $card_data = json_decode($topFooter->card_data);
                                // pre($card_data);
                                foreach ($card_data as $k => $v) { ?>
                            <!-- featured-icon-box --> 
                            <div class="featured-icon-box style9">
                                <div class="featured-icon"><!--  featured-icon -->
                                    <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                        <img src="<?= base_url().$v->card_image?>" alt="<?= $v->card_image_alt;?>">
                                        <!-- <i class="flaticon flaticon-computer"></i> -->
                                        <!--  ttm-icon --> 
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title"><h6><?= $v->card_step;?> <br><br><?= $v->card_heading;?></h6></div>
                                    <div class="featured-desc"> 
                                    <?= $v->card_para;?>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box END-->
							<?php }}?>
                        </div>
                    </div><!-- row end-->
                   
                </div>
            </section>
<!-- services-section end -->


<!-- client-section -->
<div class="ttm-row client-section ttm-bgcolor-skincolor clearfix" style="margin-top:70px;">
    <div class="container">
        <div class="row">
        
            <div class="col-md-12">
            <!-- section title -->
                <div class="section-title with-desc text-center clearfix">
                    <div class="title-header"><br>
                        <h2 class="title"> <?= (isset($topFooter->work_heading) && !empty($topFooter->title) !="")?$topFooter->title:"Satisfied & Thrilled <span>Clientsee</span>"?></h2><br>
                        <h5><?= (isset($topFooter->work_heading) && !empty($topFooter->subtitle) !="")?$topFooter->subtitle:"These are our happy, satisfied & thrilled clients. Wanna be happy? Choose Us!"?></h5>
                    </div>
                </div>
           <!-- section title end -->
           <?php if(isset($topFooter->company_logo)){
                $company_logo = json_decode($topFooter->company_logo);?>
                <div class="row multi-columns-row ttm-boxes-spacing-15px">
                    <?php foreach ($company_logo as $k => $v) { ?>
                    <div class="col-lg-2 col-md-6 ttm-box-col-wrapper">
                        <!-- featured-imagebox-portfolio -->
                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="<?= base_url().$v?>" alt="image">
                            </div>
                            <!-- featured-thumbnail end-->
                    </div>
                    <?php if($k ===5 || $k==11 || $k==17 || $k==23 || $k==29 || $k==35 || $k==41 || $k==47){?>
                        <br><br><br><br>
                    <?php }}?>
                </div>
            <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- client-section END-->

    <!-- blog-section end -->
<section class="ttm-row blog-section clearfix" style="background:#fafbfb;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- section title -->
                <div class="section-title text-center with-desc clearfix">
                    <div class="title-header">
                        <h5>Article / Blogs</h5>
                        <h2 class="title"><?= (isset($topFooter->heading) && !empty($topFooter->heading))?$topFooter->heading:"You won’t get bored.  <span>Check our blogs</span>"?></h2>
                    </div>
                </div><!-- section title end -->
            </div>
        </div>
        <!-- row -->
        <div class="row ttm-boxes-quickservicebox position-relative mt-10">
            <!-- blog-slide -->
            <div class="blog-slide owl-carousel owl-theme owl-loaded  " data-item="3" data-nav="false" data-dots="false" data-auto="false">

            <?php if(isset($topFooter->blogdata)){
                $blogdata = json_decode($topFooter->blogdata);
                // pre($blogdata);
                 foreach ($blogdata as $k => $v) { ?>

                <!-- featured-imagebox-blog -->
                <div class="featured-imagebox featured-imagebox-blog">
                    
                    <div class="featured-content">
                        <!-- featured-content -->
                        <div class="featured-title">
                         <!-- featured-title -->
                            <h5><?= $v->blogtitle?></h5>
                        </div>
                        <div class="post-meta"><!-- post-meta -->
                            <span class="ttm-meta-line"><i class="fa fa-user"></i>TechCentrica / Search Engine Marketing</span>
                            
                        </div>
                        <div class="featured-desc"><!-- featured-description -->
                            <p><?= $v->blogcontent?></p>
                        </div>
                        <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-20" href="<?= $v->blog_url?>">Read More <i class="ti ti-angle-double-right"></i></a>
                    </div>
                </div><!-- featured-imagebox-blog end -->
                <?php }}?>
                
            </div>
        </div><!-- row end -->
    </div>
</section>
<!-- process-section end -->



<!--footer start-->
<footer class="footer widget-footer clearfix">
    <div class="second-footer ttm-textcolor-white bg-img2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                <div class="widget widget_text  clearfix">
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px;">Ready to grow your online business?</h3>
                    <div class="textwidget widget-text">
                        Find out how we can help you make more money online with our tailored, expert-led digital services by booking a free consultation with one of our experts. Call us on:</div><br>
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px; line-height:0px;">Sales Enquiry: </h3>
                    <div class="textwidget widget-text">
                    <?= (isset($topFooter->sales_num) && !empty($topFooter->sales_num) !="")?$topFooter->sales_num:"+91 9654 221 960, +91 9599 200 280"?></div>
                        <br>
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px; line-height:0px;">Job Enquiry:</h3>
                    <div class="textwidget widget-text">
                        <?= (isset($topFooter->job_num) && !empty($topFooter->job_num) !="")?$topFooter->job_num:"+91 9599 200 281"?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                <div class="widget link-widget clearfix">
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px;">Services</h3>
                    <ul id="menu-footer-services">
                        <li><a href="<?= base_url('digital-solutions/digital-marketing')?>">Digtial Consultancy</a></li>
                        <li><a href="<?= base_url('digital-solutions/search-engine-optimization')?>">Social Media Advertisement</a></li>
                        <li><a href="<?= base_url('digital-solutions/content-creation')?>">Content Marketing</a></li>
                        <li><a href="#">Video Making</a></li>
                        <li><a href="#">Graphic Designing</a></li>
                        <li><a href="<?= base_url('digital-solutions/search-engine-optimization')?>">Search Engine Marketing</a></li>
                        <li><a href="<?= base_url('design-and-development/website-development')?>">Website Development</a></li>
                        <li><a href="<?= base_url('our-solutions/e-commerce-website')?>">E-Commerce Website</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                <div class="widget link-widget clearfix" style="margin-bottom:30px;">
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px;">Quick Links</h3>
                    <ul id="menu-footer-services">
                        <li><a href="<?= base_url('company/about-techcentrica')?>">About TechCentrica</a></li>
                        <li><a href="<?= base_url('company/our-brand-story')?>">Brand Promise</a></li>
                        <li><a href="<?= base_url('company/our-superheroes')?>">Our Superheroes</a></li>
                        <li><a href="<?= base_url('contact-us/join-us')?>">Careers</a></li>
                    </ul>
                </div>
                <div class="widget link-widget clearfix" style="margin-top:0px;">
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px;">Partners & Certificates
                    </h3>
                        <p><img src="<?= base_url()?>assets/images/google.png" title="TechCentrica - Google Adword Certified" alt="TechCentrica - Google Adword Certified"></p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                <div class="widget flicker_widget clearfix">
                    <h3 class="widget-title" style="font-weight:normal; font-size:17px;">Become an expert with our newsletter</h3>
                    <div class="textwidget widget-text">
                        Receive expert advice on how to improve your digital marketing strategy, to help you increase traffic, revenue and conversions for your website.
                        <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                            <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                <i class="fa fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email Address.." required="">
                                <input type="submit" value="">
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>
                        <h5 class="mb-20">Follow Us On</h5>
                        <div class="social-icons circle social-hover">
                            <ul class="list-inline">
                                <li><a href="<?= (isset($topFooter->facebook) && !empty($topFooter->facebook) !="")?$topFooter->facebook:"https://www.facebook.com/TechCentrica"?>" class=" tooltip-bottom" target="_blank" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= (isset($topFooter->instagram) && !empty($topFooter->instagram) !="")?$topFooter->instagram:"https://www.instagram.com/techcentrica"?>" target="_blank" class=" tooltip-bottom" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?= (isset($topFooter->twitter) && !empty($topFooter->twitter) !="")?$topFooter->twitter:"https://twitter.com/Tech_Centrica"?>" class=" tooltip-bottom" target="_blank" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= (isset($topFooter->linkedin) && !empty($topFooter->linkedin) !="")?$topFooter->linkedin:"https://www.linkedin.com/company/tech-centrica/?originalSubdomain=in"?>" class=" tooltip-bottom" target="_blank" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="bottom-footer-text ttm-bgcolor-darkgrey ttm-textcolor-white">
    <div class="container">
        <div class="row copyright">
            <div class="col-md-8">
                <div class="">
                    <span>Copyright © 2012 -  2023, All Rights Reserved By  <a href="https://www.techcentrica.com">HPR TECHCENTRICA PVT. LTD. </a> CIN - U73100DL2014PTC267126</a>  </span><br>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-md-right res-767-mt-10">
                    <div class="d-lg-inline-flex">
                        <ul id="menu-footer-menu" class="footer-nav-menu">
                            <li><a href="<?= base_url('disclaimer')?>">Disclaimer</a></li>
                            <li><a href="<?= base_url('privacy')?>">Privacy Policy</a></li>
                            <li><a href="<?= base_url('terms-and-conditions')?>">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin:0px auto; margin-top: 20px;" >
                <div itemscope itemtype="https://schema.org/service">
                    <div itemprop="name" class="belowfoot" style="text-align: center;">  TechCentrica -  is rated 4.9 stars by <a href="https://www.facebook.com/TechCentrica/" target="_blank">www.facebook.com/TechCentrica</a> based on 19 reviews</div>
                        <div itemprop="aggregateRating" class="googlere" itemscope itemtype="https://schema.org/AggregateRating" style="text-align: center; color:#db2848;">Rated 
                        <span itemprop="ratingValue">4.4</span>/
                        <meta itemprop="bestRating" content="5"/>5
                        <meta itemprop="worstRating" content="1"/>based on
                        <span itemprop="reviewCount">128</span> reviews at 
                            <a href="https://www.google.co.in/search?hl=en&ei=eWdtW7qJNMy3rQGJ5LbQAw&q=techcentrica&oq=techcentrica&gs_l=psy-ab.3..0l3j0i30k1j0i10i30k1l5j38.10464.12249.0.12551.12.8.0.0.0.0.396.832.0j1j1j1.3.0....0...1c.1.64.psy-ab..9.3.830....0.Xd0b_jEkfDM#lrd=0x390ce4ff90285d8b:0x285ba7a9c78ab5a1,1,,," target="_blank" style="color: #FFF;">Google</a>      	
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</footer>
<!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

</div><!-- page end -->

<div class="container-fluid media-bar">
<div class="row">
    <div class="col-sm-4">
        <a href="https://api.whatsapp.com/send?phone=919654221960" class="float1" target="_blank">
            <i class="fa fa-whatsapp my-float"></i> Say Hello
        </a>
    </div>

    <div class="col-sm-4">
        <a  href="tel:919654221960" class="float2" target="_blank">
            <i class="fa fa-phone my-float2" style="margin-top:10px;"></i> Let's Talk 
        </a>
    </div>

    <div class="col-sm-4">
        <a href = "mailto:sales@techcentrica.com" class="float3" target="_blank">
            <i class="fa fa-envelope my-float3"></i> e-Mail Us
        </a>
    </div>
</div>
</div> 

<!-- icon cnd  -->
<script src="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/ie7/ie7.min.js"></script>
<!-- Libs -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="vendor/jquery.js"><\/script>')</script>
<script src="<?php echo base_url()?>assets/newjs/vendor/jquery.easing.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/jquery.cookie.js"></script>
<!-- <script src="master/style-switcher/style.switcher.js"></script> -->
<script src="<?php echo base_url()?>assets/newjs/vendor/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/selectnav.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/twitterjs/twitter.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/revolution-slider/js/jquery.themepunch.plugins.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/revolution-slider/js/jquery.themepunch.revolution.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/flexslider/jquery.flexslider.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/fancybox/jquery.fancybox.js"></script>
<script src="<?php echo base_url()?>assets/newjs/vendor/jquery.validate.js"></script>

<!-- <script src="js2/lottie.js"></script> -->
<script src="<?php echo base_url()?>assets/js2/lottie.js"></script>


<!-- <script src="js2/plugins.js"></script> -->
<script src="<?php echo base_url()?>assets/js2/plugins.js"></script>


<!-- Current Page Scripts -->
<!-- <script src="js2/views/view.home.js"></script> -->
<script src="<?php echo base_url()?>assets/js2/views/view.home.js"></script>

<!-- Theme Initializer -->
<!-- <script src="js2/theme.js"></script> -->
<script src="<?php echo base_url()?>assets/js2/theme.js"></script>


<!-- Start of REVE Chat Script-->

<!-- End of REVE Chat Script -->

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- <script src="js2/jquery.js"></script> -->

<!-- <script src="js2/webcustom.js"></script> -->
<!-- Custom JS -->
<!-- <script src="js2/custom.js"></script> -->
<!-- <script src="js2/stats.js"></script> -->
<!-- Javascript -->
<!-- <script src="js2/webcustom.js"></script> -->

<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="js/tether.min.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<!-- <script src="js/jquery.easing.js"></script>     -->
<!-- <script src="js/jquery-waypoints.js"></script>     -->
<!-- <script src="js/jquery-validate.js"></script>  -->
<!-- <script src="js/owl.carousel.js"></script> -->
<!-- <script src="js/jquery.prettyPhoto.js"></script> -->
<!-- <script src="js/numinate.min.js?ver=4.9.3"></script> -->
<!-- <script src="js/main.js"></script> -->

<!-- ----------------------------------------------------->


<!-- <script src="<?php echo base_url()?>assets/js2/jquery.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/js2/webcustom.js"></script> -->
<script src="<?php echo base_url()?>assets/js2/custom.js"></script>
<!-- <script src="<?php echo base_url()?>assets/js2/stats.js"></script> -->
<script src="<?php echo base_url()?>assets/js/numinate.min.js?ver=4.9.3"></script>
<script src="<?php echo base_url()?>assets/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url()?>assets/js/owl.carousel.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-validate.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-waypoints.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.easing.js"></script>
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/js/tether.min.js"></script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<!-- Javascript end-->

</body>
</html>