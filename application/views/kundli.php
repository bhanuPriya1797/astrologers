<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Kundli</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Horoscope" />
    <meta name="keywords" content="Horoscope" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--start style -->
    <?php include('includes/css.php'); ?>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="assets/img/logo.png" />
</head>

<body>
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status"><img src="assets/images/header/horoscope.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <!-- main_header_wrapper Start -->
    <!-- main_header_wrapper Start -->
    <?php include('includes/header.php'); ?>
    <!-- main_header_wrapper end -->
    <!-- main_header_wrapper end -->
    <!-- hs About Title Start -->
    <div class="hs_indx_title_main_wrapper">
        <div class="hs_title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full_width">
                    <div class="hs_indx_title_left_wrapper">
                        <h2>Free Online Kundli</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  full_width">
                    <div class="hs_indx_title_right_wrapper">
                        <ul>
                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Kundli </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hs About Title End -->
    <!-- hs sidebar Start -->
    <div class="hs_kd_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="hs_kd_left_sidebar_main_wrapper">

                        <h2 style="margin-bottom: 5px;">Get Your free Janam Kundli</h2>
                        <p>
                            To generate your Kundli, enter your birth date & time, and birthplace in the form below.</p>
                        <!-- start kundli form -->
                        <div class="form">
                            <ul class="tab-group">
                                <li class="tab active"><a href="#signup">Generate Kundli</a></li>
                                <li class="tab"><a href="#login">Save Kundli</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="signup">
                                    <!-- <h1 class="" style="color: black;">Get Your free Janam Kundli</h1> -->
                                    <form action="">
                                        <div class="kundli-form">
                                            <h3 class="heading-h3">Kundli / Birth Chart</h3>
                                            <hr>
                                            <p><strong>Enter Birth Details</strong></p>
                                            <input type="text" placeholder="Name">
                                            <select name="" id="">
                                                <option value="Male">Male</option>
                                                <option value="Male">Female</option>
                                            </select>
                                            <div>
                                                <input type="number" placeholder="Day">
                                                <input type="number" placeholder="Month">
                                                <input type="number" placeholder="Year">
                                            </div>
                                            <div>
                                                <input type="number" placeholder="Hours">
                                                <input type="number" placeholder="Minute">
                                                <input type="number" placeholder="Second">
                                            </div>
                                            <input type="text" placeholder="Birth Day Place" name="" id="">
                                            <div class="hs_effect_btn" style="margin: auto;">
                                                <ul>
                                                    <li data-animation="animated flipInX" class=""><a href="#"
                                                            class="hs_btn_hover">Get Kundli</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div id="login">
                                    <form action="">
                                        <div class="kundli-form">
                                            <p class="text-center" style="margin-top: 110px; margin-bottom: 20px;">
                                                Please sign up to view your saved kundali</p>

                                            <div class="hs_effect_btn" style="margin: auto; margin-bottom: 50px;">
                                                <ul>
                                                    <li data-animation="animated flipInX" class=""><a href="#"
                                                            class="hs_btn_hover">Please Login</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div><!-- tab-content -->

                        </div> <!-- /form -->
                        <!-- end kundli form -->



                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_first_sec_wrapper">
                                    <h2>Get your kundli within seconds</h2>
                                    <h4><span>&nbsp;</span></h4>
                                    <p>Janampatri is stated to be the graphical sketch of planets as per the time of a
                                        person’s birth originated by ancientits. It describes Planets, rising stars,
                                        yogas and dasas with their effects. Generally, it is ready
                                        provided one’s birth etails and a discovers many future issues regarding a
                                        particular person and his or her life in advance. Zodiac sign, movem ents and
                                        situation of the planets in horoscope describe the status
                                        of each stage of one‘s life from born to teenage, adult and old age.This is
                                        Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="hs_kd_second_sec_wrapper">
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis
                                        endum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed
                                        odio sit amet nibh vulputate cursus a sit amet mauris. Morbi
                                        accumsan ipsum velit. am nec tellus a odio tincidunt auctor a ornare odio. Sed
                                        non mauris vitae erat equat auctor eu in elit. Class aptent taciti sociosqu ad
                                        litora torquent.</p>
                                </div>
                                <div class="hs_kd_second_list_sec_wrapper">
                                    <ul>
                                        <li><i class="fa fa-circle"></i> &nbsp;&nbsp;When will I get married?</li>
                                        <li><i class="fa fa-circle"></i> &nbsp;&nbsp;Why there is a delay in getting
                                            married?</li>
                                        <li><i class="fa fa-circle"></i> &nbsp;&nbsp;Do I have any dosha (affliction)
                                            which is delaying or denying marriage?</li>
                                        <li><i class="fa fa-circle"></i> &nbsp;&nbsp;Will I get an understanding partner
                                        </li>
                                        <li><i class="fa fa-circle"></i> &nbsp;&nbsp;What are my chances for a second
                                            marriage?</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="hs_kd_second_img_sec_wrapper">
                                    <img src="assets/images/content/kundali/kundli_img.jpg" class="img-responsive"
                                        alt="kundali_img" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_third_sec_wrapper">
                                    <h2>Important of Janam Kundali</h2>
                                    <h4><span>&nbsp;</span></h4>
                                    <p>It is important to make an accurate Janam Kundali with proper birth matching to
                                        get the best result. Parents go to the expert astrologers to make an accurate
                                        Janam Kundali for their child on his or her birth time. Lorem
                                        ipsum dolor sit et, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad mim veiam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenerit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                        sunt in culpa qui officia deserunt mollit anim id
                                        est laborum.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="hs_jk_box_main_wrapper">
                                    <div class="hs_jk_img_wrapper">
                                        <img src="assets/images/content/kundali/j1.jpg" alt="janam_kundali" />
                                    </div>
                                    <div class="hs_jk_img_cont_wrapper">
                                        <h2>Kala sarpa yog report</h2>
                                        <h3>By - Shilpa rao</h3>
                                        <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem.</p>
                                        <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="hs_jk_box_main_wrapper">
                                    <div class="hs_jk_img_wrapper">
                                        <img src="assets/images/content/kundali/j2.jpg" alt="janam_kundali" />
                                    </div>
                                    <div class="hs_jk_img_cont_wrapper">
                                        <h2>Janam Kundli Phaladesh</h2>
                                        <h3>By - Shilpa rao</h3>
                                        <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem.</p>
                                        <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="hs_jk_box_main_wrapper">
                                    <div class="hs_jk_img_wrapper">
                                        <img src="assets/images/content/kundali/j3.jpg" alt="janam_kundali" />
                                    </div>
                                    <div class="hs_jk_img_cont_wrapper">
                                        <h2>Kala sarpa yog report</h2>
                                        <h3>By - Shilpa rao</h3>
                                        <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem.</p>
                                        <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_five_heading_sec_wrapper">
                                    <h2>kundali patrikla</h2>
                                    <h4><span>&nbsp;</span></h4>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="hs_kd_four_img_wrapper">
                                    <img src="assets/images/content/kundali/patrika.jpg" alt="patrika" />
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="hs_kd_four_img_cont_wrapper">
                                    <h2>Kundali Patrikla - Pankaj Maharaj</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur pisicng elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim iam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.<br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit
                                        anim id est laborum. Sed ut perspiciatis.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_four_img_cont_bottom_wrapper">
                                    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan
                                        ipsum velit. Nam nec tellussfasf a odio This is adasddPhotoshop's version of
                                        Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                                        ollicitudin, lofas sf sadf rem quis bibendum auctor, nisi elit consequat ipsum,
                                        nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursu ass a
                                        sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                        tellus a odio tincidunt auctor a are odio. Sed non mauras is vitae era asfas f t
                                        as consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent
                                        per conubia nostra, per inceptos himenaeos.</p>
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
                                        <img src="assets/images/content/about/astro_img1.jpg" alt="team-img">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>
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
                                        <img src="assets/images/content/about/astro_img2.jpg" alt="team-img">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>
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
                                        <img src="assets/images/content/about/astro_img3.jpg" alt="team-img">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>
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
                                <div class="hs_kd_six_sec_btn hs_kd_btn">
                                    <ul>
                                        <li><a href="#">submit</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="hs_kd_right_sidebar_main_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_right_first_sec_wrapper">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>kundali patrikla</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="assets/images/content/kundali/patrika.jpg" alt="patrika" />
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
                                        <img src="assets/images/content/kundali/patrika2.jpg" alt="patrika" />
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
                                        <img src="assets/images/content/kundali/patrika3.jpg" alt="patrika" />
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
                                        <img src="assets/images/content/kundali/love_img.jpg" alt="love_img" />
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
                                                                aria-expanded="false">Life Meter</a>
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
                                <div class="hs_kd_right_first_sec_wrapper2">
                                    <div class="hs_kd_right_first_sec_heading">
                                        <h2>Black magic</h2>
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_heading">
                                        <img src="assets/images/content/kundali/patrika4.jpg" alt="patrika" />
                                    </div>
                                    <div class="hs_kd_right_first_sec_img_price_heading">
                                        <ul>
                                            <li>Kundli Patrika</li>
                                            <li>$26</li>
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
    <!-- hs sidebar End -->
    <!-- hs kundali services Start -->
    <div class="hs_kd_special_service_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hs_kd_srrvice_main_wrapper">
                        <div class="hs_kd_service_heading_wrapper">
                            <h2>Special <span> services</span></h2>
                            <h4><span>&nbsp;</span></h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br>
                                auctor, nisi elit consequat hello Aenean world.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="hs_kd_service_main_box_wrapper">
                        <div class="hs_kd_service_inner_box_wrapper">
                            <img src="assets/images/content/kundali/ser1.jpg" alt="service_img" />
                            <div class="hs_kd_ser_img_cont_wrapper">
                                <h2>Daily Karma Removal Program</h2>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                    auctor, nisi elit consequat hte hat paer.</p>
                                <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="hs_kd_service_main_box_wrapper">
                        <div class="hs_kd_service_inner_box_wrapper">
                            <img src="assets/images/content/kundali/ser2.jpg" alt="service_img" />
                            <div class="hs_kd_ser_img_cont_wrapper">
                                <h2>Daily Karma Removal Program</h2>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                    auctor, nisi elit consequat hte hat paer.</p>
                                <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="hs_kd_service_main_box_wrapper">
                        <div class="hs_kd_service_inner_box_wrapper">
                            <img src="assets/images/content/kundali/ser3.jpg" alt="service_img" />
                            <div class="hs_kd_ser_img_cont_wrapper">
                                <h2>Daily Karma Removal Program</h2>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                    auctor, nisi elit consequat hte hat paer.</p>
                                <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hs kundali services End -->
    <!-- hs footer wrapper Start -->
    <?php include('includes/footer.php'); ?>
    <!-- hs bottom footer wrapper End -->
    <!--main js file start-->
   

    <?php include('includes/js.php'); ?>
    <!--main js file end-->
</body>

</html>