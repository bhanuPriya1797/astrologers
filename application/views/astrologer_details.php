<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Astrologer Details</title>
	<meta name="description" content="Lekha Jokhha" />
	<meta name="keywords" content="Lekha Jokhha" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--start style -->
	<?php include('includes/css.php'); ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/astrologer.css'); ?>">
	<style>
		.modal-backdrop {
			background-color: #02020200 !important;
		}

		.giftbrocher,.pdui {
			width: 32%;
			display: inline-block;
			text-align: center;
			color:#ff8d00;
		}
		.active-gift img{
			background: #242424;
            border-radius: 24px;
		}
	</style>
</head>

<body>
	<!-- preloader Start-->
	<div id="preloader">
		<div id="status"><img src="<?php echo base_url('assets/img/loader.gif'); ?>" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- main_header_wrapper Start -->
	<?php include('includes/header.php'); ?>
	<!-- main_header_wrapper end -->

	<!-- start astrologer section -->
	<section>
		<div class="astrologer-detail astrologer-info">
			<div class="container">
				<div class="row as-det">

					<div class="col-lg-9 col-sm-12 col-12">
						<div class="lekha-sec-part">
							<div class="d-flex">
								<h2 class="astro-name"><?php echo ($astrologer->name); ?></h2>
							</div>
							<div class="follow-buttons-mb">
								<button class="bg-dark-2">Follow</button>
							</div>
							<p class="ec-font"><b>Expertise:</b> <?php echo ($astrologer->all_skills); ?></p>
							<p class="ec-font"><b>Experience:</b> <?php echo ($astrologer->experience); ?> + Years of Experience</p>
							<p class="ec-font"><b>Language:</b> <?php echo ($astrologer->language_known); ?></p>

							<div class="consultation-fee">
								<div class="consultation">
									<div class="consultation-head">
										Consultation Charges:
									</div>
									<div class="set-charges">
										30/min <strike class="org-charges">
											242/min</strike>
										<span class="todayoffer">
											<img src="<?php echo base_url('assets/images/astrologer/today-offer.png'); ?>" alt="today-offer">
										</span>
									</div>
								</div>

								<div class="consultation newconsults">
									<div class="consultation-head">
										User Rating:
									</div>
									<div class="rate-img">
										<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
										<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
										<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
										<img src="<?php echo base_url('assets/images/astrologer/halfstar.png'); ?>" alt="halfstar">
										<span class="rating">(4.8)</span>
									</div>
								</div>

								<div class="consultation text-center">
									<div class="gift-button">
										<button class="gift-fl" id="giftButton">Gift</button>
									</div>
									<div class="follow-buttons-mb">
										<button class="bg-dark-2">Follow</button>
										<p class="mb-0 mt-1">2524 Followers</p>
									</div>
								</div>
							</div>

							<div class="btn-detail-page">
								<input type="hidden" name="lekhaafree" value="false" id="rucchi-astrofree">
								<a href="#" class="btn-details">
									<img src="<?php echo base_url('assets/images/astrologer/ic_call.png'); ?>" alt="ic_call">Call
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-12 col-12">
						<div class="left-as-det">
							<div class="as-img">
								<img src="<?php echo base_url('assets/images/astrologer/bullet_green.png'); ?>" alt="bullet_green" class="onofbu">
								<?php if ($astrologer->profile_image) { ?>
									<img src='<?php echo base_url("assets/uploads/astrologers_registration/$astrologer->profile_image"); ?>' alt="ruuchi-sahota" class="img-astro">
								<?php } else { ?>
									<img src="<?php echo base_url('assets/images/astrologer/ruuchi-sahota.png'); ?>" alt="ruuchi-sahota" class="img-astro">
								<?php } ?>
								<div class="stamp-design">
									<img src="<?php echo base_url('assets/images/astrologer/verified-detail.png'); ?>" alt="verified-detail">
								</div>
							</div>

							<div class="gift-button">
								<button class="gift-fl" id="giftButton" onclick="openGiftModal()">Gift</button>
							</div>
							<div class="modal" tabindex="-1" role="dialog" id="giftModal" style="background: rgba(60,60,60,.9);">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="background: rgba(60,60,60,.9);">
										<!-- Your modal content goes here -->
										<div class="modal-footer" style="color: #ff8d00; font-size: 25px; font-weight: bold;">
											Gifts <button type="button" class="btn btn-secondary" style="float: right;" onclick="closeGiftModal()">Close</button>
										</div>
										<hr style="margin: 0px;">
										<div class="modal-body">
											<div id="gift-list" class="giftmdui row text-center">

												<?php foreach ($gifts as $key => $data) { ?>
													<div class="col-4 giftbrocher" id="giftbrocher<?php echo ($data->id); ?>" onclick="makeActive(this.id,<?php echo ($data->id); ?>);">
														<?php if(!empty($data->image)) { ?>
															<img src="<?php echo base_url('assets/uploads/gift_image/' . $data->image) ?>" style="display: block; margin:auto; height: 55px; width: 55px;">
														<?php } else {?>
															<img src="https://cdn.astrosage.com/images/varta/gemstone_1.png" style="display: block; margin:auto">
														<?php } ?>
														<a href="javascript:void(0);" onclick="getgiftdata(227)" value="227" style="display: block;"><?php echo ($data->title); ?></a>
														<span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo ($data->price); ?> </span>
														<input type="hidden" value="<?php echo ($data->id); ?>" name="giftid">
													</div>
												<?php } ?>
												
											</div>

											<hr style="margin-top: 10px;">

											<div class="row">
												<div class="col-4 pdui">
													<button type="button" id="rech-form" class="btngui bg-darkc text-white"> Recharge </button>
												</div>
												<div class="col-4 pdui">
													<div class="textsetui">
														Current balance <span id="walletbalGift"><i class="fa fa-inr" aria-hidden="true"></i> 0.00</span></div>
												</div>
												<div class="col-4 pdui">
													<form>
														<input type="hidden" value="" id="giftid">
														<input type="hidden" value="293" name="gfastroid" id="gfastroid">
														<input type="hidden" value="91" name="gfcountrycode" id="gfcountrycode">
														<input type="hidden" value="8093144727" name="gfphoneno" id="gfphoneno">
														<div class="col-3">
															<button type="button" onclick="sendGifts(true)" id="send-gift" class="btnsetuis" style="width:auto;" disabled="disabled"> SEND</button>
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
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="head-space">
						<h2 class="lekhha-heading">About <?php echo ($astrologer->name); ?></h2>
						<p><?php echo ($astrologer->name); ?> Ji is a skilled, highly educated, and empathetic person who has served
							hundreds of
							clients
							across the globe in more than half a decade of her professional career. She has given her
							clients
							full
							proof and accurate predictions along with useful life-changing tips. Be it financial,
							educational,
							business-related, marital, etc. she has solved every problem. Acharyaa Ruchi Ji can impart
							her
							excellent
							analysis in Hindi, English, and Punjabi language.She aims at
							guiding people across the
							country
							toward
							the path of spirituality and enlightenment.</p>

						<hr>
					</div>

					<div class="ast-widg-content">
						<div class="ast-ic-img shw-1">
							<img src="<?php echo base_url('assets/images/astrologer/time.png'); ?>" alt="time">
						</div>
						<div class="ast-heading-left br-1">
							<h2>Available Time</h2>
						</div>
						<div class="clearfix"></div>
						<div class="ast-paragraph clear">
							<p>10:00 AM to 04:00 PM</p>
						</div>
					</div>
					<div class="ast-widg-content">
						<div class="ast-ic-img shw-1">
							<img src="<?php echo base_url('assets/images/astrologer/education.png'); ?>" alt="education">
						</div>
						<div class="ast-heading-left br-1">
							<h2>Education</h2>
						</div>
						<div class="clearfix"></div>
						<div class="ast-paragraph clear">
							<p>10:00 AM to 04:00 PM</p>
						</div>
					</div>
					<div class="ast-widg-content">
						<div class="ast-ic-img shw-1">
							<img src="<?php echo base_url('assets/images/astrologer/focus.png'); ?>" alt="focus">
						</div>
						<div class="ast-heading-left br-1">
							<h2>Focus Area</h2>
						</div>
						<div class="clearfix"></div>
						<div class="ast-paragraph clear">
							<p><?php echo ($astrologer->all_skills); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="astrologer-know">
		<div class="container">
			<div class="profile-known">
				<div class="profile-known-left">
					<b>Systems Known :</b>
				</div>
				<?php $skills = explode(',', $astrologer->all_skills) ?>

				<div class="profile-known-right">
					<?php foreach ($skills as $key => $value) { ?>
						<a href="#"> <?php echo ($value) ?> </a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="astrologer-know">
		<div class="container">
			<div class="profile-known">
				<div class="profile-known-left">
					<b>Languages Known :</b>
				</div>

				<?php $languages = explode(',', $astrologer->language_known) ?>

				<div class="profile-known-right">
					<?php foreach ($languages as $key => $value) { ?>
						<a href="#"> <?php echo ($value) ?> </a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="astrologer-rating">
		<div class="container">
			<div class="review-checked">
				<div class="col-lg-12 col-12 pdb-20">
					<h6 class="rate-review">Ratings and Reviews:</h6>
					<span class="user-color">(<i class="fa fa-user"></i> 171)</span>
				</div>
				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12 review-box">
					<div class="full-width">
						<div class="left-review">
							<img src="<?php echo base_url('assets/images/astrologer/user.png'); ?>" alt="user" class="us-img">
							<span>
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
								<img src="<?php echo base_url('assets/images/astrologer/fullstar.png'); ?>" alt="fullstar">
							</span>
						</div>
						<div class="right-review">
							<h5 class="mb-0">
								<span class="r-num">9187078*****</span>
								<span class="r-date">19 Dec 2023</span>
							</h5>
							<p>good</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-12">
				<button class="load-review">Load More</button>
			</div>
		</div>
	</section>
	<!-- end astrologer section -->



	<!-- hs latest news wrapper End -->
	<!-- hs footer wrapper Start -->
	<?php include('includes/footer.php'); ?>
	<!-- hs bottom footer wrapper End -->
	<!--main js file start-->
	<?php include('includes/js.php'); ?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	<script>
		function openGiftModal() {
			$('#giftModal').modal('show');
		}

		function closeGiftModal() {
			$('#giftModal').modal('hide');
		}
	</script>

<script>
function makeActive(elementId, number) {
    var elements = document.querySelectorAll('.giftbrocher');
    elements.forEach(function(el) {
        el.classList.remove('active-gift');
    });
    var clickedElement = document.getElementById(elementId);
    clickedElement.classList.add('active-gift');
	document.getElementById('send-gift').removeAttribute('disabled');
}
</script>


</body>

</html>
