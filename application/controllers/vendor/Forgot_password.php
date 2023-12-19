<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller{

	public function __construct(){

		parent::__construct();

		

	}

	public function forgot_password(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if($this->form_validation->run() != false) {
                $check = get_table_value('tbl_vendors', array('email' => $this->input->post('email')));
                if(empty($check)){
                    $this->session->set_flashdata('error', "Hello Vendor, This is not correct email ");
                    redirect('vendor/forgot-password');
                }else{
                    $token = token();
                    $data = array(
                        'forgot_password_link' => $token
                    );
                    $this->db->where('id', $check['id']);
                    $this->db->update('tbl_vendors', $data);
                    
                    $mail_data['token'] = $token;
                    $subject = "Reset Password Link";
                    $message = $this->load->view('vendor/mailer/customer-reset-password', $mail_data, true);
                    send_mail($post['email'], $subject, $message);
                    $this->session->set_flashdata('message', "Reset password link sent to your Email ID. Please visit your email id");
                    redirect('vendor/forgot-password');
                }
            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['meta_title'] = "forgot-password";
        $this->data['meta_description'] = "forgot-password";
        $this->data['meta_keywords'] = "forgot-password";
        $views[] = 'vendor/forgot-password';
        $this->load->view('vendor/forgot-password');    
    }

    public function reset_password(){
        $post = $this->input->post();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
            if($this->form_validation->run() != false) {
                $check = get_table_value('tbl_vendors', array('id' => $post['id'], 'forgot_password_link' => $post['link']));
                if(empty($check)){

                    $this->session->set_flashdata('error', "Invalid Link Posted");
                    redirect('vendor/forgot-password');

                }else{
                    $data = array(

                        'password' => md5($post['password']),

                        'forgot_password_link' => ''

                    );

                    $this->db->where('id', $check['id']);

                    $this->db->update('tbl_vendors', $data);

                    $this->session->set_flashdata('message', "Password successfully reset.");
                    redirect('vendor/login');
                }
            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $check = get_table_value('tbl_vendors', array('forgot_password_link' => $this->uri->segment(3)));
        $data['id'] = $check['id']; 
        $data['link'] = $check['forgot_password_link'];
        $data['meta_title'] = "reset-password";
        $data['meta_description'] = "reset-password";
        $data['meta_keywords'] = "reset-password";
        $this->load->view('vendor/reset-password',$data);
    }

}