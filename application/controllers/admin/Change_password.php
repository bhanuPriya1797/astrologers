<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends Core_Admin_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/PermissionModel');
	}

	public function index(){

		$data['title'] = 'Scuba Hellas';
		$user = $this->session->userdata('admin_login_data');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            if($this->form_validation->run() != false) {
                
                $this->PermissionModel->Update($user['id'],["password" => md5(trim($this->input->post('password')))],'tbl_admin',);
                $this->session->set_flashdata('success', "You password has been successfully changed");
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

		$views[] = 'admin/change-password';

		$this->admin_view($views);

	}
}