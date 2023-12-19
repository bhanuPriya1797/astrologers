<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Core_Admin_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->model('admin/Dashboard_model','dashboard');
	}

	public function index(){

		$this->data['active'] = 'dashboard';

		$this->data['title'] = 'Dashboard';
		$this->data['vendors'] = $this->Common_model->count("tbl_vendors",['status>='=> 0]);
		$this->data['customers'] = $this->Common_model->count("tbl_customer",['status>='=> 0]);
		$this->data['subadmin'] = $this->Common_model->count("tbl_admin",['role_id >'=> 0]);
		$this->data['dives_center'] = $this->Common_model->count("tbl_dives_center",['status>='=> 0]);
		$this->data['rental_products'] = $this->Common_model->count("tbl_rental_products",['status>='=> 0]);
		$this->data['service_booking'] = $this->Common_model->count(" tbl_services_booking",['id>'=> 0]);
		$this->data['blog_posting'] = $this->Common_model->count("blog_posting",['status>='=> 0]);
		$this->data['activity'] = $this->Common_model->count("tbl_activity_type",['status>='=> 0]);

		$views[] = 'admin/dashboard';

		$this->admin_view($views);
	}

}