<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Astrologer Registration</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="description" content="Horoscope" />
        <meta name="keywords" content="Horoscope" />
        <meta name="author" content="" />
        <meta name="MobileOptimized" content="320" />
        <?php include('includes/css.php'); ?>
    </head>
<body>
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status"><img src="<?php echo base_url('assets/images/header/horoscope.gif');?>" id="preloader_image" alt="loader">
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
                        <h2>Astrologer Registration</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  full_width">
                    <div class="hs_indx_title_right_wrapper">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Astrologer Registration</li>
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
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="hs_kd_left_sidebar_main_wrapper">
                        <div class="row">
                        <h3><?php echo $this->session->flashdata('success'); ?></h3>
                            <form name="myForm" action="<?php echo base_url('astrologer_registration'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_cn_second_sec_wrapper">
                                    <h2>Astrologer Registration</h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Mobile No : <span style="color:#ff0000;">*</span></label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>">
                                        </div>
                                        <span style="color:#ff0000;"><?php echo form_error('mobile_no', '<div class="error">', '</div>'); ?></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Name : <span style="color:#ff0000;">*</span></label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="name" value="<?php echo set_value('name'); ?>">
                                        </div>
                                        <span style="color:#ff0000;"><?php echo form_error('name', '<div class="error">', '</div>'); ?></span>
                                    </div>
                                </div>
                                <div class="hs_cn_second_sec_wrapper">
                                    <h2>Skill Info</h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Email : <span style="color:#ff0000;">*</span></label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="email" value="<?php echo set_value('email'); ?>">
                                        </div>
                                        <span style="color:#ff0000;"><?php echo form_error('email', '<div class="error">', '</div>'); ?></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>All Skills : </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="all_skills" value="<?php echo set_value('all_skills'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Location : </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="location" value="<?php echo set_value('location'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Language Known : </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="" name="language_known" value="<?php echo set_value('language_known'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Gender : <span style="color:#ff0000;">*</span></label>
                                        <div class="hs_num_input_wrapper">
                                            <select name="gender">
                                                <option value="" disabled>Select Gender</option>
                                                <option value="male" value="<?php echo set_value('gender'); ?>">Male</option>
                                                <option value="female" value="<?php echo set_value('gender'); ?>">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Experience In Years : </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="experience_in_years" value="<?php echo set_value('experience_in_years'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Are You Working On Any Other Online Platform ?  </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="online_platform" value="<?php echo set_value('online_platform'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Where did you hear about Lekhajokhha ?  </label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="about_lekhajokhha" value="<?php echo set_value('about_lekhajokhha'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Profile Image</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="file" name="profile_image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>About Me</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="about_me" value="<?php echo set_value('about_me'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Adhaar Card Image</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="file" name="adhaar_card_image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Refer By</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="refer_by" value="<?php echo set_value('adhaar_card_image'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Pan Card Image</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="file" name="pan_card_image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Adhaar Card No</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" class="form-control input_capital" MaxLength="14" onkeyup="adhaar_validate(this.value);"  name="adhaar_card_no" autocomplete="off">
                                            <b style="color:red"><span id="adhaar_card"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Complete Address</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="complete_address" value="<?php echo set_value('complete_address'); ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Pan Card No</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" class="form-control input_capital" MaxLength="10" onkeyup="pan_validate(this.value);"  name="pan_card_no" autocomplete="off"  value="<?php echo set_value('pan_card_no'); ?>">
                                            <b style="color:red"><span id="pan_card"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Screenshots of Profile on other portals</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="file" name="screenshot_portals">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Instagram Or Social Media Link</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="text" name="social_link" value="<?php echo set_value('social_link'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Expertise Certificates/Degree</label>
                                        <div class="hs_num_input_wrapper">
                                            <input type="file" name="certificate">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="hs_num_input_btn_wrapper hs_cn_birth_btn_wrapper">
                                            <ul>
                                                <li><button type="submit">Submit</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                                <input type="hidden" name="add" value="add">                     
                            </form>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/js.php'); ?>
</body>
<script>

     // Adhaar Card No //

    function adhaar_validate(adhaar){

        var regadhaar = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
        if (regadhaar.test(adhaar) == false) {
            document.getElementById("adhaar_card").innerHTML = "Adhaar Card Number Not Valid.";
        } else {
            document.getElementById("adhaar_card").innerHTML = "";
        }
    }

     // Pan Card No

    function pan_validate(pan) {

        var regpan = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
        if (regpan.test(pan) == false) {
            document.getElementById("pan_card").innerHTML = "PAN Number Not Valid.";
        } else {
            document.getElementById("pan_card").innerHTML = "";
        }
    }
</script>
</html>