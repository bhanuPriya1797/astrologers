<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
//Admin and subadmin routes

$route['admin'] 	= 'admin/login';
$route['admin/login'] 	= 'admin/login';
$route['admin/profile'] 	= 'admin/admin/profile';
/*sub admin route*/
$route['admin/manage-subadmin'] 	= 'admin/subadmin/index';
$route['admin/manage-subadmin/(:num)'] 	= 'admin/subadmin/edit_subadmin';
$route['admin/manage-subadmin/add'] 	= 'admin/subadmin/add_subadmin';
$route['admin/manage-subadmin/delete/(:num)'] 	= 'admin/subadmin/delete_subadmin';
/*dives location route*/
$route['admin/manage-dives'] 	= 'admin/dives/index';
$route['admin/manage-dives/(:num)'] 	= 'admin/dives/edit_dives';
$route['admin/manage-dives/add'] 	= 'admin/dives/add_dives';
$route['admin/manage-dives/delete/(:num)'] 	= 'admin/dives/delete_dives';

/* all dives route */

/* Lekha Jokhha */

$route['admin/services'] 	= 'admin/all_dives/index';
$route['admin/services/(:num)'] 	= 'admin/all_dives/edit_dives';
$route['admin/services/add'] 	= 'admin/all_dives/add_dives';
$route['admin/services/delete/(:num)'] 	= 'admin/all_dives/delete_dives';

$route['admin/online_puja'] 	= 'admin/online_puja/index';
$route['admin/online_puja/(:num)'] 	= 'admin/online_puja/edit_puja';
$route['admin/online_puja/add'] 	= 'admin/online_puja/add_puja';
$route['admin/online_puja/delete/(:num)'] 	= 'admin/online_puja/delete_puja';

$route['admin/category'] 	= 'admin/category/index';
$route['admin/category/(:num)'] 	= 'admin/category/edit_category';
$route['admin/category/add'] 	= 'admin/category/add_category';
$route['admin/category/delete/(:num)'] 	= 'admin/category/delete_category';

$route['admin/gifts'] 	= 'admin/gift/index';
$route['admin/gifts/(:num)'] 	= 'admin/gift/edit_gift';
$route['admin/gifts/add'] 	= 'admin/gift/add_gift';
$route['admin/gifts/delete/(:num)'] 	= 'admin/Gift/delete_gift';

$route['admin/products'] 	= 'admin/products/index';
$route['admin/products/(:num)'] 	= 'admin/products/edit_product';
$route['admin/products/add'] 	= 'admin/products/add_product';
$route['admin/products/delete/(:num)'] 	= 'admin/products/delete_product';

$route['admin/astrologers'] 	= 'admin/astrologers/index';
$route['admin/astrologers/(:num)'] 	= 'admin/astrologers/edit_astrologers';
$route['admin/astrologers/add'] 	= 'admin/astrologers/add_astrologers';
$route['admin/astrologers/delete/(:num)'] 	= 'admin/astrologers/delete_astrologers';

$route['admin/user'] 	= 'admin/customers/index'; 
$route['admin/user/(:num)'] 	= 'admin/customers/edit_customer';
$route['admin/user/add'] 	= 'admin/customers/add_customer';
$route['admin/user/delete/(:num)'] 	= 'admin/customers/delete_customer';

$route['admin/cms/(:num)'] 	= 'admin/cms/edit_inner_pages';

// frontend 

$route['shope/online_puja/(:any)'] 	= 'shope/details';
$route['shope/shop'] 	= 'shope/shope';
$route['shope/shop/(:any)']	= 'shope/shope_details';

$route['astrologers'] 	= 'Astrologer';
$route['astrologer/details/(:any)'] 	= 'Astrologer/details';
$route['astrologer/login'] 	= 'Astrologer/login';
$route['astrologer/dashboard'] 	= 'Astrologer/dashboard';

$route['signup'] = "customer/registration";
$route['verifyotp'] = "customer/verifyMobineNumber";
$route['dashboard'] = "dashboard/index";
$route['wallet'] = "customer/wallet";
$route['wallet-confirm-order'] = "customer/payment_details";
$route['signin'] = "customer/login";
$route['profile'] = "customer/profile";

/* Lekha Jokhha */

/*vendors Route*/
$route['admin/vendors'] 	= 'admin/vendors/index';
$route['admin/vendors/(:num)'] 	= 'admin/vendors/edit_vendor';
$route['admin/vendors/add'] 	= 'admin/vendors/add_vendor';
$route['admin/vendors/delete/(:num)'] 	= 'admin/vendors/delete_vendor';

$route['admin/customers'] 	= 'admin/customers/index';
$route['admin/customers/(:num)'] 	= 'admin/customers/edit_customer';
$route['admin/customers/add'] 	= 'admin/customers/add_customer';
$route['admin/customers/delete/(:num)'] 	= 'admin/customers/delete_customer';

/* Booking Route */

$route['admin/manage-booking'] = 'admin/booking/index';

/*vendors dashbaorad login panel route*/


$route['vendor'] 	= 'vendor/login';
$route['vendor/login'] 	= 'vendor/login';
$route['vendor/profile'] 	= 'vendor/vendor/profile';

$route['vendor/manage-dives'] 	= 'vendor/dives/index';
$route['vendor/manage-dives/(:num)'] 	= 'vendor/dives/edit_dives';
$route['vendor/manage-dives/add'] 	= 'vendor/dives/add_dives';
$route['vendor/manage-dives/delete/(:num)'] 	= 'vendor/dives/delete_dives';

$route['admin/manage-dives-category'] 	= 'admin/dives_category/index';
$route['admin/manage-dives-category/(:num)'] 	= 'admin/dives_category/edit_dives';
$route['admin/manage-dives-category/add'] 	= 'admin/dives_category/add_dives';
$route['admin/manage-dives-category/delete/(:num)'] 	= 'admin/dives_category/delete_dives';

$route['admin/activity'] 	= 'admin/activity/index';
$route['admin/activity/(:num)'] 	= 'admin/activity/edit';
$route['admin/activity/add'] 	= 'admin/activity/add';
$route['admin/activity/delete/(:num)'] 	= 'admin/activity/delete';


$route['admin/rental-products'] 	= 'admin/rental_products/index';
$route['admin/rental-products/(:num)'] 	= 'admin/rental_products/edit_products';
$route['admin/rental-products/add'] 	= 'admin/rental_products/add_products';
$route['admin/rental-products/delete/(:num)'] 	= 'admin/rental_products/delete_products';

$route['vendor/rental-products'] 	= 'vendor/rental_products/index';
$route['vendor/rental-products/(:num)'] 	= 'vendor/rental_products/edit_products';
$route['vendor/rental-products/add'] 	= 'vendor/rental_products/add_products';
$route['vendor/rental-products/delete/(:num)'] 	= 'vendor/rental_products/delete_products';

/* Blog Module Route */

$route['admin/manage-blog'] 	= 'admin/blog/index';
$route['admin/manage-blog/(:num)'] 	= 'admin/blog/edit_blog';
$route['admin/manage-blog/add'] 	= 'admin/blog/add_blog';
$route['admin/manage-blog/delete/(:num)'] 	= 'admin/blog/delete_blog';

$route['admin/manage-blog-category'] 	= 'admin/blog_category/index';
$route['admin/manage-blog-category/add'] 	= 'admin/blog_category/add_blog_category';
$route['admin/manage-blog-category/(:num)'] 	= 'admin/blog_category/edit_blog';
$route['admin/manage-blog-category/delete/(:num)'] 	= 'admin/blog_category/delete_blog';

$route['admin/manage-job-category'] 	= 'admin/job_category/index';
$route['admin/manage-job-category/add'] 	= 'admin/job_category/add_job';
$route['admin/manage-job-category/(:num)'] 	= 'admin/job_category/edit_job';
$route['admin/manage-job-category/delete/(:num)'] 	= 'admin/job_category/delete_job';

$route['admin/job'] 	= 'admin/job/index';
$route['admin/job/add'] 	= 'admin/job/add';
$route['admin/job/(:num)'] 	= 'admin/job/edit';
$route['admin/job/delete/(:num)'] 	= 'admin/job/delete';

$route['admin/testimonial'] 	= 'admin/testimonial/index';
$route['admin/testimonial/add'] 	= 'admin/testimonial/add';
$route['admin/testimonial/(:num)'] 	= 'admin/testimonial/edit';
$route['admin/testimonial/delete/(:num)'] 	= 'admin/testimonial/delete';



$route['admin/payment-distribution'] 	= 'admin/payment_history/index';


// $route['admin/cms/(:num)'] 	= 'admin/cms/edit_inner_pages';

$route['admin/promo-code'] 	= 'admin/offer_code/index';
$route['admin/promo-code/(:num)'] 	= 'admin/offer_code/edit';
$route['admin/promo-code/add'] 	= 'admin/offer_code/add';
$route['admin/promo-code/delete/(:num)'] 	= 'admin/offer_code/delete';
$route['admin/promo-code/services'] 	= 'admin/offer_code/getServicesByVendorId';

/*vendor bookings section*/

$route['vendor/bookings'] 	= 'vendor/bookings/index';

$route['vendor/bookings/send-email/(:any)/(:any)/(:any)'] 	= 'vendor/bookings/send_email';

$route['vendor/booking-view/(:any)'] 	= 'vendor/bookings/view_booking';
$route['vendor/booking-edit/(:any)'] 	= 'vendor/bookings/edit_booking';


/*website rouetes*/


$route['privacy-policy'] = "cms/privacy";
$route['cookie-policy'] = "cms/cookie_policy";
$route['about-us'] = "cms/about";
$route['career'] = "cms/career";
$route['t&c'] = "cms/terms_condition";

// $route['login'] = "customer/login";
$route['signup'] = "customer/registration";
$route['forgot-password'] = "customer/forgot_password";
$route['reset-password/(:any)'] = "customer/reset_password";

$route['admin/forgot-password'] = "admin/forgot_password/forgot_password";
$route['admin/reset-password/(:any)'] = "admin/forgot_password/reset_password";

$route['vendor/forgot-password'] = "vendor/forgot_password/forgot_password";
$route['vendor/reset-password/(:any)'] = "vendor/forgot_password/reset_password";


$route['wishlist'] = "customer/wishlist";
// $route['dashboard'] = "customer/dashboard";
$route['my-booking'] = "customer/user_orders";
$route['address'] = "customer/user_address";
$route['change-password'] = "customer/change_password";

/*partner signup from website*/

$route['partner-signup'] = "vendor_registration/index";
$route['partner-signup-process'] = "vendor_registration/signup_initiate";

$route['dive_details/(:any)'] 	= 'dive_details/details';

/* Services */ 

$route['services/(:any)'] 	= 'services/details';
$route['check_availability'] = 'services/check_availability';

$route['setValuesInsession'] = 'services/setValuesInsession';


$route['checkoutsummery'] = "checkout/view";


$route['news'] 	= 'news/index';
$route['news/(:any)/(:any)'] 	= 'news/details';
$route['vendor_profile/(:num)'] 	= 'vendor_profile/index/';

$route['career/apply/(:any)'] = "cms/apply_job";
$route['sitemap'] = "cms/sitemap";
$route['help'] = "contact/index";

// $route['coupon'] = "cart/coupon";
// $route['coupon'] = "coupon/index";
/*search*/
$route['search/(:any)'] 	= 'search/seach_location';
$route['search/(:any)/(:any)'] 	= 'search/details_dives';

$route['dive'] 	= 'dive/index';
$route['dive/(:any)'] 	= 'dive/index';


$route['service'] 	= 'service/index';
$route['service/(:any)'] 	= 'service/index';

$route['admin/manage-certification'] 	= 'admin/certification/index';
$route['admin/manage-certification/(:num)'] 	= 'admin/certification/edit';
$route['admin/manage-certification/add'] 	= 'admin/certification/add';
$route['admin/manage-certification/delete/(:num)'] 	= 'admin/certification/delete';

$route['admin/cms/offer_list/add'] 	= 'admin/cms/add_offer';

$route['admin/cms/offer_list/edit/(:num)'] 	= 'admin/cms/edit_offer';

$route['admin/cms/help_topic/add'] 	= 'admin/cms/add_help_topic';

$route['admin/cms/help_topic/edit/(:num)'] 	= 'admin/cms/edit_help_topic';

$route['admin/cms/help_topic/delete/(:num)'] 	= 'admin/cms/delete_help_topic';

$route['checkout'] = "checkout";

$route['book-services'] 	= 'booking/index';

/* vendor bank info details */


$route['vendor/bank-info'] 	= 'vendor/bank_details/index';
$route['vendor/bank-info/add'] 	= 'vendor/bank_details/add_bank_info';

/* admin booking */

$route['admin/booking-view/(:any)'] 	= 'admin/booking/view_booking';
$route['admin/booking-edit/(:num)'] 	= 'admin/booking/edit_booking';
$route['admin/vendor-booking/(:any)'] 	= 'admin/booking/vendor_booking_list';

/* customer */
$route['booking-view/(:num)'] 	= 'customer/booking_view_list';
$route['booking-edit/(:num)'] 	= 'customer/booking_edit';

/* payment */
$route['admin/payment-distribution/(:any)'] 	= 'admin/payment_history/commission';

/* Google Ads */
$route['admin/google-ads'] 	= 'admin/google_ads/index';
$route['admin/google-ads/add'] 	= 'admin/google_ads/add_ads';
$route['admin/google-ads-edit/(:num)'] 	= 'admin/google_ads/edit_ads';
$route['admin/google-ads/update_ads'] 	= 'admin/google_ads/update_ads';

$route['cancel_booking/(:num)'] 	= 'booking/cancel_booking';
