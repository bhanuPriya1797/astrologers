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
</head>

<body>
	<!-- preloader Start-->
	<div id="preloader">
		<div id="status"><img src="assets/img/loader.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- main_header_wrapper Start -->
	<?php include('includes/header.php'); ?>
	<!-- main_header_wrapper end -->
	<!-- hs Slider Start -->

	<!-- hs Slider End -->

	

	<!-- start astrologer section -->
	<div class="hs_title_main_wrapper" style="padding-bottom: 0px; margin-bottom: 100px;">
		<div class="container">

			<div class="astrologer-section">
			<?php foreach ($astrologer_list as $data => $astrologer){ ?>
				<div class="astro-card available">
					<div class="astro-passport">
						<div class="astro-status">
							<span class="online-green" id="online-box"></span>
							<div class="astro-image">
								<a href="<?php echo base_url('astrologer/details/'.$astrologer->slug);?>">
								<?php if($astrologer->profile_image) {?>
									<img loading="lazy"
										src="assets/uploads/astrologers_registration/<?php echo $astrologer->profile_image; ?>"
										alt="Not Available">
										<?php } else { ?>
									<img loading="lazy"
										src="https://d3e0xze5s330hm.cloudfront.net/media/upload/images/Pinky_Astro_2-removebg-preview.webp"
										alt="Not Available">
								<?php } ?>
								</a>
							</div>
							<div class="astro-rating">
								<span>4.95</span>
								<span><i class="fa fa-star"></i></span>
							</div>
						</div>
					</div>
					<div class="astro-detail">
						<p class="astro-name">
							<a href="<?php echo base_url('astrologer/details/'.$astrologer->slug);?>">
							<?php echo $astrologer->name; ?>
							</a>
						</p>
						<p class="astro-exp">Exp. <?php echo $astrologer->experience; ?> years</p>
						<p class="astro-lang">
						<?php echo $astrologer->language_known; ?>
						</p>
						<p class="astro-type">
						<?php echo $astrologer->all_skills; ?>
						</p>
						<div class="action-item">
							<div class="astro-price">
								<p class="offer-price">₹ 28/min</p>
							</div>
							<div class="astro-availability">
								<button class="btn btn-green"
									onclick="checkWebChatLoginorShowPopup('77', 'call')">Call</button>
							</div>
						</div>
					</div>
				</div>
        	<?php } ?>

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
