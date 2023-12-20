<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Astrologer_model','astrologer');
	}

	public function index()
	{
		$data['astrologer_list'] = $this->astrologer->getAstrologers();
		// echo "<pre>"; print_r($data); die; 
		$this->load->view('astrologers',$data); 
	}
}
