<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shope extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 function __construct(){
		parent::__construct();

		$user_data = $this->data['user_data'];
		// if(empty($user_data)){
		// 	redirect('login');
		// }
		$this->load->library('pagination');
		$this->load->model('front/Online_puja_model','online_puja');
		$this->load->model('front/Product_model','product');
	}
	public function index()
	{
		$this->load->view('astrologer_registration');
	}

	public function online_puja()
	{	
		$data['puja_list'] = $this->online_puja->getOnlinePujaList();
        // $views[] = 'online_puja';
		$this->load->view('online_puja',$data); 
	}

	public function details()
	{	
		$pujaSlug = $this->uri->segment(3);
		// echo $pujaSlug; die;	
		$data['puja_details'] = $this->online_puja->getOnlinePujaDetails($pujaSlug);
        // $views[] = 'online_puja';
		$this->load->view('online_puja_details',$data); 
	}

	public function shope(){

		$data['productList'] = $this->product->getProductList();
		$this->load->view('shop',$data); 

	}

	public function shope_details(){

		$proSlug = $this->uri->segment(3);
		$data['productDetails'] = $this->product->getProductDetails($proSlug);
		$this->load->view('shop_details',$data); 

	}
	
}
