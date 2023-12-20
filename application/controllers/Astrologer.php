<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Astrologer_model','astrologer');
		$this->load->library('form_validation');
		$this->load->library('session');
	}


	public function index()
	{
		$data['astrologer_list'] = $this->astrologer->getAstrologers();
		// echo "<pre>"; print_r($data); die; 
		$this->load->view('astrologers',$data);
	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('astrologer_login');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $is_valid_credentials = $this->astrologer->validate_credentials($username, $password);

                if ($is_valid_credentials) {
					$user_data = array(
						'username' => $username,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($user_data);

                    redirect('astrologer/dashboard');
                } else {
                    $data['error_message'] = 'Invalid username or password';
                    $this->load->view('astrologer_login', $data);
                }
            }
		} else {
			$this->load->view('astrologer_login');
		}
	}

	public function dashboard(){
		$this->load->view('astrologer_dashboard');
	}
}
