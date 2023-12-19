<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51NNxsSHHrbchm1FNQhDldrOZd07ajPZf5RA9G11UWRBQnVPSthmGm8otcFepNcuYIOe01qeuMfPpRb0ZWGBEVhfJ00MuE04np4'; 
$config['stripe_publishable_key'] = 'pk_test_51NNxsSHHrbchm1FNPReB8l1lrTTRbtrqMGjJVmuO3bYevJ24rPdMoI2I7eGcd0mcjjdsTcJu0kpEbeR4WgVIEb9o00LCeHv7C4'; 
$config['stripe_currency']        = 'usd';
?>