<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Wallet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Horoscope" />
    <meta name="keywords" content="Horoscope" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--start style -->
    <?php include('includes/css.php'); ?>
</head>

<body>

    <div id="preloader">
        <div id="status"><img src="<?php echo base_url('assets/images/header/horoscope.gif');?>" id="preloader_image" alt="loader">
        </div>
    </div>

    <?php include('includes/header.php'); ?>
  
    <div class="hs_kd_sidebar_main_wrapper hs_num_sidebar_main_wrapper">
        <div class="container">
            <div style="margin-top:100px;">
                <div class="wallet-top-main">
                    <div class="wallet-top-left">
                        <p>Available Balance</p>
                        <h1>₹ 00.00</h1>
                    </div>
                    <div class="wallet-top-right">
                       <p>Consultation History</p>
                    </div>
                </div>

                <div class="wallet-bottom-main">
                    <div class="wallet-bottom-content">
                        <p>Add Money to Wallet</p>
                        <span class="rpack">Choose from the available recharge pack</span>
                    </div>

                    <div class="wallet-top-offer">
                        <div class="row wallet-row-space">
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 199</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 100</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 50</p>
                                   <a href="<?php echo base_url('wallet-confirm-order'); ?>"><p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                        </div>

                        <div class="row wallet-row-space">
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 1000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 500</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 300</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                        </div>

                        <div class="row wallet-row-space">
                           <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 5000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 3000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 2000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>                            
                        </div>

                        <div class="row wallet-row-space">
                            <div class="col-lg-4">
                                <div class="other-wallet">
                                   <button class="optional-offer">Other</button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 50000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wallet-box">
                                   <p>₹ 10000</p>
                                   <p class="wallet-pay">Pay Now</p>
                                </div>
                            </div>                            
                        </div>               
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hs sidebar End -->
    <!-- hs footer wrapper Start -->
    <?php include('includes/footer.php'); ?>
    <!-- hs bottom footer wrapper End -->
    <!--main js file start-->
    <?php include('includes/js.php'); ?>
    <!--main js file end-->
</body>

</html>