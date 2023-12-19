<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	function __construct(){

		parent::__construct();
	}

}

class Core_Admin_Controller extends MY_Controller{
	protected $data;
	function __construct(){

		parent::__construct();

		$user = $this->session->userdata('admin_login_data');

		if(empty($user['id'])) redirect(ADMIN_PATH.'/login');

		$this->data['in_active'] = $this->Common_model->count("tbl_vendors",['status'=> 0]);

		$this->data['current_user_data'] = $user;

	}

	function admin_view($views){

		$this->load->view('admin/common/header', $this->data);

		$this->load->view('admin/common/sidebar', $this->data);
		
		foreach($views as $view) $this->load->view($view, $this->data);

		$this->load->view('admin/common/footer', $this->data);

	}

}

class Core_Vendor_Controller extends MY_Controller{
	protected $data;
	function __construct(){

		parent::__construct();

		$user = $this->session->userdata('vendor_login_data');

		if(empty($user['id'])) redirect('vendor/login');

		$this->data['current_user_data'] = $user;

	}

	function vendor_view($views){

		$this->load->view('vendor/common/header', $this->data);

		$this->load->view('vendor/common/sidebar', $this->data);
		
		foreach($views as $view) $this->load->view($view, $this->data);

		$this->load->view('vendor/common/footer', $this->data);

	}

}

class Core_front_Controller extends MY_Controller{

	protected $data;

	function __construct(){
		error_reporting(0);
		parent::__construct();

		if($this->session->userdata('user_data')){
			$this->data['user_data'] = $this->session->userdata('user_data');
			$wishlist = get_table_data('tbl_wishlist', array('customer_id' => $this->data['user_data']['customer_id']));
			$temp=0;
			foreach($wishlist as $r) {
			    $var+=$temp++;
            }
            $this->data['user_whishlist'] = $var;

		} 
		else{
			$this->data['user_data'] = array();
			$this->data['user_whishlist'] = 0;
		}

		$this->data['user_cart'] = array();

	}

	function front_view($views,$sidebar=true){

		$this->data['url'] = $this->uri->segment(1);
		$this->load->view('includes/header', $this->data);
		foreach($views as $view) $this->load->view($view, $this->data);
		$this->load->view('includes/footer', $this->data);

	}

}



