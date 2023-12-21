<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Astrologers</title>
	<meta name="description" content="Lekha Jokhha" />
	<meta name="keywords" content="Lekha Jokhha" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--start style -->
	<?php include('includes/css.php'); ?>

	<style>
		.row {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
}

/* Style each card (col-4) */
.col-4 {
    background-color: #fff; /* Card background color */
    border: 1px solid #ccc; /* Card border */
    padding: 20px; /* Padding inside the card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow */
}

/* Add some spacing between cards */
.col-4 + .col-4 {
    margin-left: 20px;
}

/* Responsive styles - adjust as needed */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    /* Reset margin between cards in the vertical layout */
    .col-4 + .col-4 {
        margin-left: 0;
        margin-top: 10px;
    }
}
	</style>
</head>

<body>
	<!-- preloader Start-->
	<div id="preloader">
		<div id="status"><img src="<?php echo base_url('assets/img/loader.gif');?>" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- main_header_wrapper Start -->
	<?php include('includes/header.php'); ?>
	<!-- main_header_wrapper end -->
	<!-- hs Slider Start -->

	<!-- hs Slider End -->



	<div class="hs_title_main_wrapper" style="padding-bottom: 0px; margin-bottom: 100px;">
		<div class="container">
			<div class="astrologer-section">
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Call Details</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Go Live</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Shortcuts</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Set Call/Chat Rate</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Support</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Show Login Hours</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Payment Report</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Articles</span>
							</div>
						</div>
					</div>
				</div>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<div class="astro-image">
								<img src="<?php echo base_url('assets/frontend/images/call.jpg');?>" alt="">
								<span style="padding: 10px; font-size: 25px; font-weight: bold;">Apply Leave</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<!-- start astrologer section -->
	<div class="hs_title_main_wrapper" style="padding-bottom: 0px; margin-bottom: 100px;">
		<div class="container">

			<div class="astrologer-section">
			

			</div>
		</div>
	</div>
	<!-- end astrologer section -->








	
	<!-- hs latest news wrapper End -->
	<!-- hs footer wrapper Start -->
	<?php include('includes/footer.php'); ?>
	<!-- hs bottom footer wrapper End -->
	<!--main js file start-->
	<?php include('includes/js.php'); ?>

	
	<!--main js file end-->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>
