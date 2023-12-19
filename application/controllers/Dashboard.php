<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Customer_model');

    }

    function index(){
        // echo "hi"; die;
		// echo "<pre>"; print_r($_SESSION); die;
		$user_data = $_SESSION['user_data'];
		
		$this->data['active'] = 'dashboard';
		if(empty($user_data)){
			redirect('login');
		}

        if($this->input->server('REQUEST_METHOD') == 'POST') {

			$post = $this->input->post();

			$this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            if ($this->form_validation->run() != false) {
            	$this->load->library('upload');
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/admin/image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file'))
                    {                        
                        $update = array(
							'first_name' => $post['first_name'],
							'last_name' => $post['last_name'],
							'email' => $post['email'],
							'mobile' => $post['mobile']
						);
						$_SESSION['user_data']['first_name'] = $post['first_name'] ;
						$_SESSION['user_data']['last_name'] = $post['last_name'] ;
						$_SESSION['user_data']['email'] = $post['email'] ;
						$_SESSION['user_data']['mobile'] = $post['mobile'] ;
						$this->db->where('id', $user_data['id']);
						$this->db->update('tbl_customer', $update);
						$this->session->set_flashdata('success', "Customer Profile details updated successfully.");
                        redirect('dashboard'); 
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $update = array(
							'first_name' => $post['first_name'],
							'last_name' => $post['last_name'],
							'email' => $post['email'],
							'mobile' => $post['mobile'],
							'profile_pic'=> $picture
						);

						$_SESSION['user_data']['first_name'] = $post['first_name'] ;
						$_SESSION['user_data']['last_name'] = $post['last_name'] ;
						$_SESSION['user_data']['email'] = $post['email'] ;
						$_SESSION['user_data']['mobile'] = $post['mobile'] ;
						$_SESSION['user_data']['profile_pic'] = $picture ;
	                        
	                    $this->db->where('id', $user_data['id']);
						$this->db->update('tbl_customer', $update);
	                    $this->session->set_flashdata('success', "Admin Profile details updated successfully.");
	                    redirect('dashboard'); 
                    }
                }
                else
                {
                    $update = array(
							'first_name' => $post['first_name'],
							'last_name' => $post['last_name'],
							'email' => $post['email'],
							'mobile' => $post['mobile']
						);
					$_SESSION['user_data']['first_name'] = $post['first_name'] ;
					$_SESSION['user_data']['last_name'] = $post['last_name'] ;
					$_SESSION['user_data']['email'] = $post['email'] ;
					$_SESSION['user_data']['mobile'] = $post['mobile'] ;
					$this->db->where('id', $user_data['id']);
					$this->db->update('tbl_customer', $update);
					$this->session->set_flashdata('success', "Customer Profile details updated successfully.");
                    redirect('dashboard'); 
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['meta_title'] = "dashboard";
		$this->data['meta_description'] = "dashboard";
		$this->data['meta_keywords'] = "dashboard";
		// $views[] = 'frontend/dashboard';
		$data['user_data'] = $user_data;
		// $this->front_view($views,false);
        $this->load->view('dashboard');

    }

     
}
