<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Horoscope" />
    <meta name="keywords" content="Horoscope" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--start style -->
    <?php include('includes/css.php'); ?>
    <!-- <link rel="shortcut icon" type="image/png" href="assets/img/logo.png" /> -->
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
    <div id="preloader">
        <div id="status"><img src="assets/images/header/horoscope.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <?php include('includes/header.php'); ?>
    <!-- hs About Title End -->
    <!-- hs sidebar Start -->
    <div class="hs_kd_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="hs_kd_left_sidebar_main_wrapper profile-top">
                        <div class="form">
                            <div class="tab-content">
                           <?php // echo "<pre>"; print_r($profileData);   ?>
                                <div id="signup">
                                    <form action="<?php echo base_url('profile');?>" method="POST">
                                        <div class="kundli-form">
                                            <h3 class="heading-h3">Profile</h3>
                                            <hr>
                                            <input type="text" name="name" placeholder="Name" value="<?php echo $profileData->name;?>">

                                            <select name="gender" >
                                                <option value="">Gender</option>
                                                <option value="male" <?php if($profileData->gender == 'male'){echo "selected"; }?>>Male</option>
                                                <option value="female" <?php if($profileData->gender == 'female'){echo "selected"; }?>>Female</option>
                                            </select>
                                            <input type="text" placeholder="Place of Birth" name="place_of_birth" value="<?php echo $profileData->place_of_birth;?>">
                                            <div>
                                                
                                                <input type="text" placeholder="Day" name="date_of_birth" id="dob" value="<?php echo $profileData->date_of_birth;?>">
                                                <input type="time" placeholder="Time" name="time_of_birth" value="<?php echo $profileData->name;?>">
                                            </div>
                                            <select name="marital_status">
                                                <option value="">Marital Status</option>
                                                <option value="single" <?php if($profileData->marital_status == 'single'){echo "selected"; }?>>Single</option>
                                                <option value="married" <?php if($profileData->marital_status == 'married'){echo "selected"; }?>>Married</option>
                                                <option value="divorced" <?php if($profileData->marital_status == 'divorced'){echo "selected"; }?>>Divorced</option>
                                            </select>
                                            <select name="occupation">
                                                <option value="">Occupation</option>
                                                <option value="student" <?php if($profileData->occupation == 'student'){echo "selected"; }?>>Student</option>
                                                <option value="married" <?php if($profileData->occupation == 'married'){echo "selected"; }?>>Buisness Person</option>
                                                <option value="employee" <?php if($profileData->occupation == 'employee'){echo "selected"; }?> >Employee</option>
                                                <option value="retired" <?php if($profileData->occupation == 'retired'){echo "selected"; }?>>Retired</option>
                                                <option value="housewife" <?php if($profileData->occupation == 'housewife'){echo "selected"; }?>>Housewife</option>                                            
                                            </select>
                                            <div class="hs_effect_btn" style="margin: auto;">
                                                <ul>
                                                    <li data-animation="animated flipInX" class=""><button type="submit"  class="hs_btn_hover">Submit</button></li>
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

                            </div>

                        </div> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                   
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/js.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>

        $('#dob').datepicker({
            dateFormat: 'yy-m-d',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
        });

    </script>

</body>

</html>