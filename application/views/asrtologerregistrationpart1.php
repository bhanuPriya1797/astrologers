<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Registration</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <?php include('includes/css.php'); ?>
</head>

<body>
<?php include('includes/header.php'); ?>
    <section class="herobreadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="underheaderbar">
                        <a href="#">Home</a> > Astrologer Registration
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="astroContent">
                        <h1 class="mt-5 mb-5">Astrologer Registration</h1>
                    </div>
                </div>
                <div class="processBar">
                    <div class="process">
                        <p>Personal Details</p>
                        <div class="bulletcircle">
                            <span>1</span>
                        </div>
                    </div>
                    <div class="process">
                        <p>Skills Details</p>
                        <div class="bulletcircle">
                            <span>2</span>
                        </div>
                    </div>
                    <div class="process">
                        <p>Advance Details</p>
                        <div class="bulletcircles">
                            <span>3</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="formArea">
                        <form action="#" class="astro-form mt-5">
                            <div class="form-Imfo">
                                <div class="formtitle">
                                    Basic Info:
                                </div>
                                <div class="fieldinput">
                                    <div class="labelbox">Name</div>
                                    <input type="text" id="full_name" class="form-input" placeholder="Enter your full Name" required>
                                </div>
                                <div class="fieldinput">
                                    <div class="labelbox">
                                        Mobile Number
                                        <span class="text-danger">*</span>
                                    </div>
                                    <input type="text" id="full_name" class="form-input" placeholder="Your Phone Number" required>
                                </div>
                              <div class="Otpscreen">
                                <button class="Otpbox">Send Otp</button>
                              </div>
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
</body>
<?php include('includes/js.php'); ?>
</html>