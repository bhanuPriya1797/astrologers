<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Core_Vendor_Controller{

	function __construct(){

		parent::__construct();

		$this->load->model('vendor/Dashboard_model','dashboard');
	}

	function index(){
		
		$user = $this->session->userdata('vendor_login_data');
		$this->data['active'] = 'dashboard';

		$this->data['title'] = 'Dashboard';

		$this->data['count_dives_services'] = $this->Common_model->count("tbl_vendor_dives_location",['vendor_id'=> $user['id']]);

		$this->data['count_products'] = $this->dashboard->products_count("tbl_vendor_rental_products",['vendor_id'=> $user['id']]);

		$this->data['count_booking'] = $this->dashboard->booking_count($user['id']);

		$views[] = 'vendor/dashboard';

		$this->vendor_view($views);
	}

}