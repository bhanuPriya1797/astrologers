<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="description" content="Horoscope" />
        <meta name="keywords" content="Horoscope" />
        <meta name="author" content="" />
        <meta name="MobileOptimized" content="320" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <?php include('includes/css.php'); ?>
    </head>
    <body>
        <div id="preloader">
            <div id="status"><img src="<?php echo base_url('assets/images/header/horoscope.gif'); ?>" id="preloader_image" alt="loader">
            </div>
        </div>
        <?php include('includes/header.php'); ?>    
        <section>
            <div class="dashboard-head">
                <div class="container">
                    <div>
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <div class="dashboard-box">
                                    <div class="dashboard-item">
                                        <div class="dashboard-image">
                                            <img src="<?php echo base_url('assets/img/dashboardpic.jpeg'); ?>" alt="dashboardpic">
                                        </div>
                                        <div class="dashboard-content">
                                            <h2>Welcome, Pawan Rikhari</h2>
                                            <div class="inner-contact">
                                                <p>
                                                    <span>
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                    </span>
                                                    <a href="tel:8882939347">8882939347</a>
                                                </p>
                                                <p>
                                                    <span><i class="fa fa-envelope" area-hidden="true"></i></span>
                                                    <a href="mailto:pawan30jul@gmail.com">pawan30jul@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <ul class="my-account-sidebar">
                                    <li class="active-dash">
                                        <a href="#">
                                            <i class="fa fa-th-large" area-hidden="true"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="active-dash">
                                        <a href="<?php echo base_url('profile');?>">
                                            <i class='fa fa-user-circle' area-hidden="true"></i>profile
                                        </a>
                                    </li>
                                    <li class="active-dash">
                                        <a href="#">
                                            <i class='fas fa-user-circle' area-hidden="true"></i>Wallet
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="outer-box bg-grey">
                                            <div class="inner-form">
                                                <div class="topheading mb-5">
                                                    <h4 class="info">Personal Information</h4>
                                                </div>
                                                <form action="#">
                                                    <div class="row form-content">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="name">Name<span class="astrick-color">*</span></label>
                                                                <input type="text" class="form-control" placeholder="Enter First Name" name="first-name"
                                                                    id="first-name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="name">Last Name <span
                                                                        class="astrick-color">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Last Name" name="last-name"
                                                                    id="last-name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="name">Email Address <span
                                                                        class="astrick-color">*</span></label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Enter Email" name="email" id="email" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="name">Contact No <span
                                                                        class="astrick-color">*</span></label>
                                                                <input class="form-control" placeholder="Enter Mobile"
                                                                    name="mobile" id="mobile" maxlength="10" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="Inputprofile" class="name">Profile Image</label>
                                                                <div class="input-group">
                                                                    <div class="choosefile">
                                                                        <input style="font-size:small;" type="file" name="file" id="file">
                                                                    </div>
                                                                </div>
                                                                <div style="margin-top:10px;">
                                                                    <img style="width:100px;height:100px" src="<?php echo base_url('assets/img/dashboardpic.jpeg'); ?>" alt="dashboardpic">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-4 col-12 d-flex">
                                                            <button type="submit" class="bluesub-btn">Update info</button>
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
        </section>
        <?php include('includes/footer.php'); ?>
        <?php include('includes/js.php'); ?>
    </body>
</html>