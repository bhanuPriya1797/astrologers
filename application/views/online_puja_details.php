<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Online Puja consultancy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Horoscope" />
    <meta name="keywords" content="Horoscope" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--start style -->
    <?php include('includes/css.php');?>
</head>

<body>
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status"><img src="<?php echo base_url('assets/images/header/horoscope.gif');?>" id="preloader_image" alt="loader">
        </div>
    </div>
    <!-- main_header_wrapper Start -->
    <!-- main_header_wrapper Start -->
    <?php include('includes/header.php');?>
    <div class="hs_indx_title_main_wrapper">
        <div class="hs_title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full_width">
                    <div class="hs_indx_title_left_wrapper">
                        <h2><?php echo $puja_details->puja_name; ?></h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  full_width">
                    <div class="hs_indx_title_right_wrapper">
                        <ul>
                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li><?php echo $puja_details->puja_name; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hs About Title End -->
    <!-- hs sidebar Start -->
    <div class="hs_kd_sidebar_main_wrapper hs_num_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="hs_kd_right_sidebar_main_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper hs_vs_list_wrapper">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>kundali patrikla</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="<?php echo base_url('assets/images/content/kundali/cn1.jpg');?>" alt="patrika" />
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_price_heading">
                                        <ul>
                                            <li>Kundli Patrika</li>
                                            <li>$26</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper2">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>Mangala Dosha</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="<?php echo base_url('assets/images/content/kundali/cn2.jpg');?>" alt="patrika" />
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_price_heading">
                                        <ul>
                                            <li>Kundli Patrika</li>
                                            <li>$26</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper2">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>Black magic</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="<?php echo base_url('assets/images/content/kundali/cn3.jpg');?>" alt="patrika" />
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_price_heading">
                                        <ul>
                                            <li>Kundli Patrika</li>
                                            <li>$26</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_second_sec_wrapper">
                                    <div class="hs_kd_right_second_img_wrapper">
                                        <img src="<?php echo base_url('assets/images/content/kundali/love_img.jpg');?>" alt="love_img" />
                                    </div>
                                    <div class="hs_kd_right_second_img_cont_wrapper">
                                        <p>How Will Be Your</p>
                                        <h3>Love Life?</h3>
                                        <ul>
                                            <li><a href="#">find now for free</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper2">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>Your star guide</h2>
                                    </div>
                                    <div class="hs_kd_right_accordi_sec_wrapper">
                                        <div class="accordionFifteen">
                                            <div class="panel-group" id="accordionFifteenLeft" role="tablist">
                                                <div class="panel panel-default truck_pannel">
                                                    <div class="panel-heading desktop">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse"
                                                                data-parent="#accordionFifteenLeft"
                                                                href="#collapseFifteenLeftone" aria-expanded="true"> Day
                                                                Guide</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFifteenLeftone" class="panel-collapse collapse in"
                                                        aria-expanded="true" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="panel_cont">
                                                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                    sollicitudin, lorem quis bibendum auctor,</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.panel-default -->
                                                <div class="panel panel-default truck_pannel">
                                                    <div class="panel-heading horn">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                data-parent="#accordionFifteenLeft"
                                                                href="#collapseFifteenLeftTwo"
                                                                aria-expanded="false">Life
                                                                Meter</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFifteenLeftTwo" class="panel-collapse collapse"
                                                        aria-expanded="false" style="height: 0px;" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="panel_cont">
                                                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                    sollicitudin, lorem quis bibendum auctor,</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.panel-default -->
                                                <div class="panel panel-default truck_pannel">
                                                    <div class="panel-heading bell">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                data-parent="#accordionFifteenLeft"
                                                                href="#collapseFifteenLeftThree"
                                                                aria-expanded="false">Compatibility</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFifteenLeftThree" class="panel-collapse collapse"
                                                        aria-expanded="false" style="height: 0px;" role="tabpanel">
                                                        <div class="panel-body">
                                                            <div class="panel_cont">
                                                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                    sollicitudin, lorem quis bibendum auctor,</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end of /.panel-group-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper2 c_sidebar_wrapper">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>NAjar yantra</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="<?php echo base_url('assets/images/content/kundali/cn4.jpg');?>" alt="patrika" />
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_price_heading">
                                        <ul>
                                            <li>NAjar yantra</li>
                                            <li>$26</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="hs_kd_left_sidebar_main_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1">
                                    <div class="hs_slider_tabs_icon_wrapper">
                                        <i class="flaticon-Matchmaking"></i>
                                    </div>
                                    <div class="hs_slider_tabs_icon_cont_wrapper hs_ar_tabs_heading_wrapper">
                                        <ul>
                                            <li><a href="#" class="hs_tabs_btn"><?php echo $puja_details->puja_name; ?></a></li>
                                            <li>Online Puja</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: 30px 0; ">
                                        <div class="online-puja-details">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="">
                                                        <h3 style="font-size: 25px; font-weight: 600;"><?php echo $puja_details->puja_name; ?></h3>
                                                        <!-- <p>Category: Online Puja</p> -->
                                                        <h5 class="heading-h6"
                                                            style="font-size: 16px; font-weight: 600;">Starting from:
                                                            ₹ <?php echo $puja_details->price; ?>/-</h5>
                                                        <button class="btn btn-design"><a href="<?php echo base_url('');?>">Book
                                                                Now</a></button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <img src="<?php echo base_url('assets/uploads/puja_image/'); ?><?php echo $puja_details->puja_image; ?>" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="hs_ar_first_sec_wrapper">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_ar_first_sec_img_cont_wrapper">
                                        <?php echo $puja_details->description; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_rs_four_sec_wrapper">
                                            <div class="hs_rs_four_sec_img_overlay_wrapper"></div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="hs_rs_four_slider_wrapper">
                                                        <div class="owl-carousel owl-theme">
                                                            <div class="item">
                                                                <div class="hs_rs_slider_inner_cont_wrapper">
                                                                    <h2>Now talk to best astrologers,
                                                                        Numerologists
                                                                        & Tarot<br> Readers anywhere, anytime
                                                                        with
                                                                        Astroyogi.</h2>
                                                                    <ul>
                                                                        <li><a href="#">Call Now</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="hs_rs_slider_inner_cont_wrapper">
                                                                    <h2>Now talk to best astrologers,
                                                                        Numerologists
                                                                        & Tarot<br> Readers anywhere, anytime
                                                                        with
                                                                        Astroyogi.</h2>
                                                                    <ul>
                                                                        <li><a href="#">Call Now</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="hs_rs_slider_inner_cont_wrapper">
                                                                    <h2>Now talk to best astrologers,
                                                                        Numerologists
                                                                        & Tarot<br> Readers anywhere, anytime
                                                                        with
                                                                        Astroyogi.</h2>
                                                                    <ul>
                                                                        <li><a href="#">Call Now</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper">
                                            <ul>
                                                <li>
                                                    <div class="hs_pr_icon_wrapper">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    <div
                                                        class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper hs_cn_third_sec_wrapper">
                                                        <span>Best Matches :</span> Rat, Snake, Rooster They are
                                                        quite compatible, deeply attracted by each other. They
                                                        are
                                                        both responsible, willing to share the family duty.
                                                        Besides,
                                                        loyalty and faith
                                                        are the key factors to their happy marriage.
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_kd_first_sec_wrapper hs_ar_third_sec_heading_wrapper">
                                            <h2>Jobs & Careers</h2>
                                            <h4><span>&nbsp;</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_pr_second_cont_wrapper hs_ar_second_sec_cont_list_wrapper">
                                            <ul>
                                                <li>
                                                    <div class="hs_pr_icon_wrapper">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    <div class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper">
                                                        <p>Best Jobs: Lawyer, doctor, teacher, technician,
                                                            politician, office clerk, consultant...</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hs_pr_icon_wrapper">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    <div class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper">
                                                        <p>Best Working Partners: Rat, Rooster, Snake</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hs_pr_icon_wrapper">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    <div class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper">
                                                        <p>Best Age to Start a Business: 30 - 40</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="hs_pr_icon_wrapper">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    <div class="hs_pr_icon_cont_wrapper hs_ar_icon_cont_wrapper">
                                                        <p>Best Career Field: Building Material Field</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_kd_five_heading_sec_wrapper">
                                            <h2>Talk to live an astrologer</h2>
                                            <h4><span>&nbsp;</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="hs_astro_team_img_main_wrapper">
                                            <div class="hs_astro_img_wrapper">
                                                <img src="<?php echo base_url('assets/images/content/about/astro_img1.jpg');?>" alt="team-img">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call
                                                            Now</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hs_astro_img_cont_wrapper">
                                                <div class="hs_astro_img_inner_wrapper">
                                                    <h2><a href="#">Rashmi Doe</a></h2>
                                                    <p>Magic ball reader</p>
                                                </div>
                                                <div class="hs_astro_img_bottom_wrapper">
                                                    <ul>
                                                        <li>Charges :</li>
                                                        <li>$5 / Min.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="hs_astro_team_img_main_wrapper">
                                            <div class="hs_astro_img_wrapper">
                                                <img src="<?php echo base_url('assets/images/content/about/astro_img2.jpg');?>" alt="team-img">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call
                                                            Now</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hs_astro_img_cont_wrapper">
                                                <div class="hs_astro_img_inner_wrapper">
                                                    <h2><a href="#">Rashmi Doe</a></h2>
                                                    <p>Magic ball reader</p>
                                                </div>
                                                <div class="hs_astro_img_bottom_wrapper">
                                                    <ul>
                                                        <li>Charges :</li>
                                                        <li>$5 / Min.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="hs_astro_team_img_main_wrapper">
                                            <div class="hs_astro_img_wrapper">
                                                <img src="<?php echo base_url('assets/images/content/about/astro_img3.jpg');?>" alt="team-img">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call
                                                            Now</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hs_astro_img_cont_wrapper">
                                                <div class="hs_astro_img_inner_wrapper">
                                                    <h2><a href="#">Rashmi Doe</a></h2>
                                                    <p>Magic ball reader</p>
                                                </div>
                                                <div class="hs_astro_img_bottom_wrapper">
                                                    <ul>
                                                        <li>Charges :</li>
                                                        <li>$5 / Min.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_kd_five_heading_sec_wrapper">
                                            <h2>Talk to live an astrologer</h2>
                                            <h4><span>&nbsp;</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="hs_kd_six_sec_input_wrapper i-name">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="hs_kd_six_sec_input_wrapper i-email">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_kd_six_sec_input_wrapper i-message">
                                            <textarea rows="6" placeholder="Comments"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_kd_six_sec_btn">
                                            <ul>
                                                <li><a href="#">submit</a></li>
                                            </ul>
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

    <?php include('includes/footer.php');?>
    <?php include('includes/js.php');?>

    <script src="https://kit.fontawesome.com/5c9f82cc45.js" crossorigin="anonymous"></script>
    <!--main js file end-->
</body>

</html>