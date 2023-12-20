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
                                <h2 class="astro-name"><?php echo($astrologer->name); ?></h2>
                            </div>
                            <div class="follow-buttons-mb">
                                <button class="bg-dark-2">Follow</button>
                            </div>
                            <p class="ec-font"><b>Expertise:</b> <?php echo($astrologer->all_skills); ?></p>
                            <p class="ec-font"><b>Experience:</b> <?php echo($astrologer->experience); ?> + Years of Experience</p>
                            <p class="ec-font"><b>Language:</b> <?php echo($astrologer->language_known); ?></p>

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
                                        <button class="gift-fl">Gift</button>
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
								<?php if($astrologer->profile_image) {?>
									<img src='<?php echo base_url("assets/uploads/astrologers_registration/$astrologer->profile_image"); ?>' alt="ruuchi-sahota" class="img-astro">
										<?php } else { ?>
									<img src="<?php echo base_url('assets/images/astrologer/ruuchi-sahota.png'); ?>" alt="ruuchi-sahota" class="img-astro">
								<?php } ?>
                                <div class="stamp-design">
                                    <img src="<?php echo base_url('assets/images/astrologer/verified-detail.png'); ?>" alt="verified-detail">
                                </div>
                            </div>

                            <div class="gift-button">
                                <button class="gift-fl">Gift</button>
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
                        <h2 class="lekhha-heading">About <?php echo($astrologer->name); ?></h2>
                        <p><?php echo($astrologer->name); ?> Ji is a skilled, highly educated, and empathetic person who has served
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
                            <p><?php echo($astrologer->all_skills); ?></p>
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
				<?php $skills = explode(',',$astrologer->all_skills) ?>

				<div class="profile-known-right">
					<?php foreach ($skills as $key => $value) { ?>
						<a href="#"> <?php echo($value) ?> </a>
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

				<?php $languages = explode(',',$astrologer->language_known) ?>

                <div class="profile-known-right">
					<?php foreach ($languages as $key => $value) { ?>
						<a href="#"> <?php echo($value) ?> </a>
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

	
	<!--main js file end-->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>
