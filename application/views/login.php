<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <?php include('includes/css.php'); ?>
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
                        <h5 class="modal-heading">Sign In</h5>
                        <p class="box-text-content">Enter your mobile number to SignIN</p>
                        <form id="sendOtp" method="POST">
                            <input type="tel" autocomplete="off" name="mobile" id="mobile"
                                placeholder="Enter Your Mobile Number" maxlength="10">
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
    <div class="model-content-otp mb-5" id="otpForm" style="display:none;">
        <div class="model-head">
            <h5>Mobile Number Verification</h5>
        </div>

        <div class="model-body" id="mobileForm">
            <div class="form-wrapper">
                <p class="text-center otpinfo">Enter 6 digit OTP sent to your phone <strong><?php echo $_SESSION['mobile']; ?></strong>
                    <a href="<?php echo base_url('signin')?>">Change</a>
                </p>
               
                <form method="POST">
                    <div class="otp-box">
                        <input type="tel" name="otp-1" id="otp-1" class="Form-controls" maxlength="1">
                        <input type="tel" name="otp-2" id="otp-2" class="Form-controls" maxlength="1">
                        <input type="tel" name="otp-3" id="otp-3" class="Form-controls" maxlength="1">
                        <input type="tel" name="otp-4" id="otp-4" class="Form-controls" maxlength="1">
                        <input type="tel" name="otp-5" id="otp-5" class="Form-controls" maxlength="1">
                        <input type="tel" name="otp-6" id="otp-6" class="Form-controls" maxlength="1">
                    </div>

                    <div>
                        <input type="submit" value="Next" id="verifyOtp">
                    </div>

                    <div class="text-center mt-3">
                        <button class="otp-button" >Resend otp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/js.php'); ?>
</body>
<script type="text/javascript">
        $(document).ready(function(){
            // Send OTP mobile jquery
            $("#sendOtp").on("click", function(e){ 
            e.preventDefault();    
            var mobile = $("#mobile").val();
            $.ajax({
                url  : "<?php echo base_url('signin');?>",
                type : "POST",
                cache:false,
                data : {mobile:mobile},
                success:function(result){
                if (result == "yes") {
                    $("#otpForm,.alert-success").show();
                    $("#mobileForm").hide();
                    $(".success-message").html("OTP sent your mobile number");
                }
                if (result =="no") {
                    $(".error-message").html("Please enter valid mobile number");
                }        
                }
            });  
            });   
            // Verify OTP mobile jquery
            $("#verifyOtp").on("click",function(e){
            e.preventDefault();
            var otp1 = $("#otp-1").val();
            var otp2 = $("#otp-2").val();
            var otp3 = $("#otp-3").val();
            var otp4 = $("#otp-4").val();
            var otp5 = $("#otp-5").val();
            var otp6 = $("#otp-6").val();

            var otp = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;
            // alert(otp);
            
            $.ajax({
                url  : "<?php echo base_url('verifyotp');?>",
                type : "POST",
                cache:false,
                data : {otp:otp},
                success:function(response){
                if (response == "yes") {
                    window.location.href='profile';
                }
                if (response =="no") {
                    $(".otp-message").html("Please enter valid OTP");
                }        
                }
            });
            });
        });
</script>

</html>