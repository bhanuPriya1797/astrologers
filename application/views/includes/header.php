<div class="main_header_wrapper">
		<!-- hs_lang_wrapper Start -->
		<div class="hs_lang_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div id="google_translate_element"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- hs Navigation Start -->
		<div class="hs_navigation_header_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5">
						<div class="hs_header_add_wrapper border_icon hidden-sm hidden-xs">
							<!-- <li class="dropdown menu-button hs_top_user_profile"> -->
							<?php
							//echo "<pre>"; print_r($_SESSION); die; 
								$user_data = $_SESSION['user_data'];

								if(!empty($user_data)){ ?>
										
										<a class="border-btn mr-3" href="<?php echo base_url('dashboard');?>">My Account</a> |

										<a class="border-btn mr-3" href="<?php echo base_url('customer/logout');?>">Logout</a>
								<?php  }else{ ?>
									<a href="<?php echo base_url('signin'); ?>" id="signin_signup">
										<!-- <img src="<?php // echo base_url('assets/images/header/top_user.png');?>" alt="user"> -->
										<span class="hidden-xs">SIGN IN |</span>
									</a>

									<a href="<?php echo base_url('signup'); ?>" id="signin_signup">
										<!-- <img src="<?php // echo base_url('assets/images/header/top_user.png');?>" alt="user"> -->
										<span class="hidden-xs">SIGN UP </span>
									</a>
								<?php } 
							?>
								
						</div>
						<div class="hs_header_add_wrapper">
							<div class="hs_btn_wrapper hidden-md">
								<ul>
									<li><a href="chatwithastrologer.html" class="hs_btn_hover"> <span
												style="margin-right: 5px;"><i class="fa-regular fa-message"></i></span>
											Chat With Astrologer </a>
									</li>
								</ul>
							</div>
						</div>
						
					</div>
					<div class="col-lg-6 col-md-7 col-sm-7 col-xs-7">
						<div class="hs_top_right_wrapper">
							<ul class="cart_login_wrapper">
								<div class="logo">
									<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/lekha_logo_new.png');?>"></a>
								</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- hs Navigation End -->
		<!-- hs top header Start -->
		<div class="hs_header_Wrapper hidden-sm hidden-xs">
			<div class="container">
				<!-- hs top header Start -->
				<div class="hs_top_header_main_Wrapper">
					<div class="hs_header_logo_left">
						<div class="hs_logo_wrapper">

							<a  href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/final-logo.png');?>" class="img-responsive"
									style="width: 80%;" alt="logo" title="Logo"></a>
						</div>
					</div>
					<div class="hs_header_logo_right">
						<nav class="hs_main_menu">
							<ul>
								<li class="dropdown menu-button">
									<a class="menu-button" href="<?php echo base_url(); ?>">Home</a>

								</li>
								<li>
									<a class="menu-button" href="<?php echo base_url('kundli'); ?>">Kundli</a>
								</li>
								<li>
									<a class="menu-button" href="<?php echo base_url('matchmaking'); ?>">Matchmaking</a>
								</li>
								<li class="dropdown menu-button">
									<a class="menu-button" href="<?php echo base_url('horoscope'); ?>">Horoscope </a>
									<ul class="dropdown-menu hs_mega_menu">
										<li>
											<a class="menu-button" href="horoscope.html">Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="yesterdayhorscope.html">Yesterday's
												Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="todayhoroscope.html">Today's Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="tomorrowhoroscope.html">Tomorrow's
												Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="weeklyhoroscope.html">Weekly's Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="monthlyhoroscope.html">Monthly's Horoscope</a>
										</li>
										<li>
											<a class="menu-button" href="yearlyhoroscope.html">Yearly's Horoscope</a>
										</li>

									</ul>
								</li>
								<li>
									<a class="menu-button" href="live.php">Live </a>
								</li>
								<li>
									<a class="menu-button" href="panchang.html">Panchang </a>
								</li>
								<li class="dropdown menu-button">
									<a class="menu-button" href="#">Services</a>
									<ul class="dropdown-menu hs_mega_menu">
										<li>
											<a class="menu-button" href="aries.html">Aries</a>
										</li>
										<li>
											<a class="menu-button" href="chinese.html">Chinese</a>
										</li>
										<li>
											<a class="menu-button" href="chinese_single.html">Chinese-Single</a>
										</li>
										<li>
											<a class="menu-button" href="crystal.html">Crystal</a>
										</li>
										<li>
											<a class="menu-button" href="kundli_dosh.html">Kundli-Dosh</a>
										</li>
										<li>
											<a class="menu-button" href="numerology.html">Numerology</a>
										</li>
										<li>
											<a class="menu-button" href="palm.html">Palm</a>
										</li>
										<li>
											<a class="menu-button" href="tarot.html">Tarot</a>
										</li>
										<li>
											<a class="menu-button" href="tarot_single.html">Tarot-Single</a>
										</li>
										<li>
											<a class="menu-button" href="vastu_shastra.html">Vastu-Shastra</a>
										</li>
									</ul>
								</li>
								<li class="dropdown menu-button">
									<a class="menu-button" href="#">Shop</a>
									<ul class="dropdown-menu">
										<li>
											<a class="menu-button" href="<?php echo base_url('shope/online_puja'); ?>">Online Puja</a>
										</li>
										<li>
											<a class="menu-button" href="<?php echo base_url('shope/shop'); ?>">Shop</a>
										</li>
										<li>
											<a class="menu-button" href="shop_single.html">Shop-Single</a>
										</li>
									</ul>
								</li>
								<!-- <li class="dropdown menu-button">
									<a class="menu-button" href="#">News </a>
									<ul class="dropdown-menu">
										<li>
											<a class="menu-button" href="blog_categories.html">Blog-Categories</a>
										</li>
										<li>
											<a class="menu-button" href="blog_single.html">Blog-Single</a>
										</li>
									</ul>
								</li> -->
								<li>
									<a class="menu-button" href="calendar.html">Calender </a>
								</li>


								<li>
									<a class="menu-button" href="https://marriage.lekhajokhha.com">Marriage </a>
								</li>

								<!-- <li>
									<a class="menu-button" href="<?php echo base_url('signup'); ?>">Sign up </a>
								</li> -->
							</ul>
						</nav>
						<!-- <div class="hs_btn_wrapper hidden-md">
							<ul>
								<li><a href="contact.html" class="hs_btn_hover">Appointments</a></li>
							</ul>
						</div> -->
					</div>
				</div>
				<!-- hs top header End -->
			</div>
		</div>
		<header class="mobail_menu visible-sm visible-xs">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6">
						<div class="hs_logo">
							<a href="index.html"><img src="<?php echo base_url('assets/img/final-logo.png');?>" style="width: 100%;" alt="Logo"
									title="Logo"></a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6">
						<div class="cd-dropdown-wrapper">
							<a class="house_toggle" href="#0">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="511.63px"
									height="511.631px" viewBox="0 0 511.63 511.631"
									style="enable-background:new 0 0 511.63 511.631;" xml:space="preserve">
									<g>
										<g>
											<path
												d="M493.356,274.088H18.274c-4.952,0-9.233,1.811-12.851,5.428C1.809,283.129,0,287.417,0,292.362v36.545
											c0,4.948,1.809,9.236,5.424,12.847c3.621,3.617,7.904,5.432,12.851,5.432h475.082c4.944,0,9.232-1.814,12.85-5.432
											c3.614-3.61,5.425-7.898,5.425-12.847v-36.545c0-4.945-1.811-9.233-5.425-12.847C502.588,275.895,498.3,274.088,493.356,274.088z" />
											<path
												d="M493.356,383.721H18.274c-4.952,0-9.233,1.81-12.851,5.427C1.809,392.762,0,397.046,0,401.994v36.546
											c0,4.948,1.809,9.232,5.424,12.854c3.621,3.61,7.904,5.421,12.851,5.421h475.082c4.944,0,9.232-1.811,12.85-5.421
											c3.614-3.621,5.425-7.905,5.425-12.854v-36.546c0-4.948-1.811-9.232-5.425-12.847C502.588,385.53,498.3,383.721,493.356,383.721z" />
											<path
												d="M506.206,60.241c-3.617-3.612-7.905-5.424-12.85-5.424H18.274c-4.952,0-9.233,1.812-12.851,5.424
											C1.809,63.858,0,68.143,0,73.091v36.547c0,4.948,1.809,9.229,5.424,12.847c3.621,3.616,7.904,5.424,12.851,5.424h475.082
											c4.944,0,9.232-1.809,12.85-5.424c3.614-3.617,5.425-7.898,5.425-12.847V73.091C511.63,68.143,509.82,63.861,506.206,60.241z" />
											<path
												d="M493.356,164.456H18.274c-4.952,0-9.233,1.807-12.851,5.424C1.809,173.495,0,177.778,0,182.727v36.547
											c0,4.947,1.809,9.233,5.424,12.845c3.621,3.617,7.904,5.429,12.851,5.429h475.082c4.944,0,9.232-1.812,12.85-5.429
											c3.614-3.612,5.425-7.898,5.425-12.845v-36.547c0-4.952-1.811-9.231-5.425-12.847C502.588,166.263,498.3,164.456,493.356,164.456z" />
										</g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
								</svg>
							</a>
							<nav class="cd-dropdown">
								<h2><a href="<?php echo base_url();?>">Lekha Jokhha</a></h2>
								<a href="#0" class="cd-close">Close</a>
								<ul class="cd-dropdown-content">
									<li>
										<form class="cd-search">
											<input type="search" placeholder="Search...">
										</form>
									</li>
									<li>
										<a href="index.html">Home</a>
									</li>
									<li>
										<a href="kundli.html">Kundli</a>
									</li>
									<li>
										<a href="kundli.html">Matchmaking</a>
									</li>
									<li class="has-children">
										<a href="horoscope.html">Horoscope </a>
										<ul class="cd-secondary-dropdown is-hidden">
											<li class="go-back"><a href="#0">Menu</a></li>
											<li>
												<a href="horoscope.html">Horoscope</a>
											</li>
											<li>
												<a href="yesterdayhorscope.html">Yesterday's
													Horoscope</a>
											</li>
											<li>
												<a href="todayhoroscope.html">Today's Horoscope</a>
											</li>
											<li>
												<a href="tomorrowhoroscope.html">Tomorrow's
													Horoscope</a>
											</li>
											<li>
												<a href="weeklyhoroscope.html">Weekly's Horoscope</a>
											</li>
											<li>
												<a href="monthlyhoroscope.html">Monthly's Horoscope</a>
											</li>
											<li>
												<a href="yearlyhoroscope.html">Yearly's Horoscope</a>
											</li>


										</ul>
									</li>
									<li>
										<a href="live.html">Live</a>
									</li>
									<li>
										<a href="panchang.html">Panchang</a>
									</li>
									<!-- .has-children -->
									<li class="has-children">
										<a href="#">Services</a>
										<ul class="cd-secondary-dropdown is-hidden">
											<li class="go-back"><a href="#0">Menu</a></li>
											<li>
												<a href="aries.html">Aries</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="chinese.html">Chinese</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="chinese_single.html">Chinese-Single</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="crystal.html">Crystal</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="kundli_dosh.html">Kundli-Dosh</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="numerology.html">Numerology</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="palm.html">Palm</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="tarot.html">Tarot</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="tarot_single.html">Tarot-Single</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="vastu_shastra.html">Vastu-Shastra</a>
											</li>
											<!-- .has-children -->
										</ul>
										<!-- .cd-secondary-dropdown -->
									</li>
									<!-- .has-children -->
									<li class="has-children">
										<a href="#">Shop</a>
										<ul class="cd-secondary-dropdown is-hidden">
											<li class="go-back"><a href="#0">Menu</a></li>
											<li>
												<a href="shop.html">Shop</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="shop_single.html">Shop-Single</a>
											</li>
											<!-- .has-children -->
										</ul>
										<!-- .cd-secondary-dropdown -->
									</li>
									<!-- .has-children -->
									<li class="has-children">
										<a href="#">News</a>
										<ul class="cd-secondary-dropdown is-hidden">
											<li class="go-back"><a href="#0">Menu</a></li>
											<li>
												<a href="blog_categories.html">Blog-Categories</a>
											</li>
											<!-- .has-children -->
											<li>
												<a href="blog_single.html">Blog-Single</a>
											</li>
											<!-- .has-children -->
										</ul>
										<!-- .cd-secondary-dropdown -->
									</li>
									<!-- .has-children -->
									<li>
										<a href="calendar.html">Calender</a>
									</li>
									<li><a href="https://marriage.lekhajokhha.com/" class="hs_btn_hover">Marriage</a>
									</li>
								</ul>
								<!-- .cd-dropdown-content -->
							</nav>
							<!-- .cd-dropdown -->
						</div>
					</div>
				</div>
			</div>
			<!-- .cd-dropdown-wrapper -->
		</header>
	</div>
	