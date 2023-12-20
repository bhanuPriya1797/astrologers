<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <?php include('includes/css.php'); ?>

	<style>
		.custom_input{
			padding: 15px 15px;
			outline: none;
			font-size: 18px;
			color: gray;
			font-weight: 500;
			width: 100%;
			border: 1px solid grey;
			border-radius: 10px;
			margin-top: 25px;
		}
	</style>
</head>

<body>
 <?php include('includes/header.php'); ?> 
<section>
      					
    <div class="modal-width" id="mobileForm">
        <div class="modalbox mt-5">
            <div class="row popbox">
            <div class="col-lg-6 col-md-12 col-sm-12 loginbox">
                    <div class="instaastro">
                        <img src="<?php echo base_url('assets/img/lekha_logo_new.png'); ?>" alt="InstaAstro-Logo">
                        <h5 class="modal-heading">Astrologer Sign In</h5>
                        <form id="login" action="<?php echo base_url('astrologer/login'); ?>" method="POST">
                            <input type="text" autocomplete="off" name="username" class="custom_input"
                                placeholder="Enter your mobile number/email">
							
							<input type="text" autocomplete="off" name="password" class="custom_input"
                                placeholder="Enter your password">	
								
                            <input type="submit" value="Next">
                            <div class="termagreement text-center mt-3">
                                <p class="termcondition">By signing up, I agree to the <a href="#">Privacy <br>
                                    Policy</a>,<a href="#">Terms and Conditions.</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12" style="background-color: #FFCA28;">
                    <div class="left-side">
                        <p class="popup-text-start">Have Question about Marriage, Career or Relationship?</p>
                        <img src="<?php echo base_url('assets/images/pandit.jpg'); ?>" alt="pandit">
                        <p class="popup-text-end">Talk to India’s best Astrologers</p>
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
