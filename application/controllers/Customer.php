<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
         $this->load->library('session');
        $this->load->model('Customer_model');

     }

     public function registration(){


		if ($this->input->server('REQUEST_METHOD') == 'POST') {


            $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); 

            if($this->form_validation->run() != false) {

                $mobile = $this->input->post('mobile');

                $checkMobileInfo = $this->Customer_model->checkMobileNo($mobile);
            
                    
                    if($checkMobileInfo != 0){  

                        echo "no"; die;

                    }else{

                        $six_digit_random_number = random_int(100000, 999999);
                        $data = array(

                            'mobile' => $this->input->post('mobile'),
                            'otp' => $six_digit_random_number,
                            'status' => '1',
                        );

                        $insert_id = $this->Common_model->insert('tbl_users',$data);
                        $this->session->set_flashdata('message', "You have successfully sign up.");
                        $this->session->set_userdata('mobile', $this->input->post('mobile'));

                        $otp = $six_digit_random_number; 
                        $message = 'Your One Time Password is '.$otp;
                        $mobile = '91'.$this->input->post('mobile');

                       
                        $msg = $this->sendOTP($mobile,$message,$otp);
                        // echo "<pre>"; print_r($_SESSION['']);
                        // echo $_SESSION['mobile']; die;
                        echo "yes"; die;
                    }

            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['meta_title'] = "register";
		$this->data['meta_description'] = "register";
		$this->data['meta_keywords'] = "register";
		$this->data['active'] = 'registration';
        $this->data['title'] = 'registration';
        $this->load->view('sign_up');
	}

    public function verifyMobineNumber(){

        if ($this->input->server('REQUEST_METHOD') == 'POST') {


            $this->form_validation->set_rules('otp', 'otp ', 'required'); 

            if($this->form_validation->run() != false) {

                $otp = $this->input->post('otp');
                $mobile = $_SESSION['mobile']; 
                $id = $_SESSION['id']; 

                $checkMobileInfo = $this->Customer_model->checkOTPMobileNo($mobile,$otp);      
                
                    
                    if($checkMobileInfo > 0){  

                        $data = array(

                            
                            'otp' => '',
                            'status' => '1',
                        );

                        $mobile = $this->input->post('mobile');

                        $update = $this->Customer_model->updateCustomerInfo($data,$mobile);
                        // $this->session->set_flashdata('message', "You have successfully sign up.");
                        // echo "mobile".$mobile; die;
                        $mobile = $_SESSION['mobile']; 
                        $id = $_SESSION['id']; 

                        $sessionData = array('id', $id,'mobile', $mobile);

                        $this->session->set_userdata('user_data',$sessionData);
                        // echo "<pre>"; print_r($_SESSION); die;
                        echo "yes"; die;
                        // redirect("home");
                    }else{
                        // redirect("signup");
                        echo "no"; die;

                    }

            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        
    }

    public function wallet(){

        $user_data = $_SESSION['user_data'];

        if(empty($user_data)){

			redirect('login');

		}

        $this->load->view('wallet');

    }

    public function login(){

        $user = $this->session->userdata('user_data');
        if(!empty($user['id'])) redirect('home');

		if ($this->input->server('REQUEST_METHOD') == 'POST') {      
       

            $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); 

            if($this->form_validation->run() != false) {

                $mobile = $this->input->post('mobile');

                $checkMobileInfo = $this->Customer_model->checkMobileNo($mobile);              
                // echo $checkMobileInfo; die;
                    
                    if($checkMobileInfo == 0){  

                        echo "no"; die;

                    }else{
                        $six_digit_random_number = random_int(100000, 999999);
                        $data = array(
                            'mobile' => $this->input->post('mobile'),
                            'otp' => $six_digit_random_number,
                            'status' => '1',
                        );

                        $update = $this->Customer_model->updateCustomerInfo($data,$mobile);
                        $this->session->set_userdata('mobile', $this->input->post('mobile'));

                        $otp = $six_digit_random_number; 
                        $message = 'Your One Time Password is '.$otp;
                        $mobile = '91'.$this->input->post('mobile');

                       
                        $msg = $this->sendOTP($mobile,$message,$otp);
                        //echo "<pre>"; print_r($msg); die;

                        echo "yes"; die;
                    }

            }else{
                $this->session->set_flashdata('error', validation_errors());
            }

        }
      
        $this->load->view('login');

    }

    public function logout(){
		$this->session->unset_userdata('user_data');
		redirect("login");
	}

    public function profile(){

        // echo "<pre>"; print_r($_SESSION);
         $mobile = $_SESSION['mobile'];
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;   
            
            $name = $this->input->post('name');
            $gender = $this->input->post('gender');
            $place_of_birth = $this->input->post('place_of_birth');
            $date_of_birth = $this->input->post('date_of_birth');
            $time_of_birth = $this->input->post('time_of_birth');
            $marital_status = $this->input->post('marital_status');
            $occupation = $this->input->post('occupation');

            $data = array(

                'name' => $name,
                'gender' => $gender,
                'place_of_birth' => $place_of_birth,
                'date_of_birth' => $date_of_birth,
                'time_of_birth' => $time_of_birth,
                'marital_status' => $marital_status,
                'occupation' => $occupation

            );
            $mobile = $_SESSION['mobile'];
            $update = $this->Customer_model->updateCustomerInfo($data,$mobile);
            $this->session->set_flashdata('message', "Profile Details Updated!"); 
            // echo $update; die;
            redirect('profile');
            

        
        }
        // $id= $_SESSION['id'];
        $data['profileData']  = $this->Customer_model->getProfileDataById($mobile);
        $this->load->view('profile',$data);
		// $views[] = 'profile';
		// $this->load->view('pro',false);

    }


    public function payment_details(){

        $this->load->view('payment_details');        

    }

    public function sendOTP($mobile,$message){

        $api_url = 'https://whatsbot.tech/api/send_sms';

        // API parameters
        $api_token = 'bd43168e-a819-41cc-a22c-9efbc2ee4fb8';
        

        // Construct the URL with parameters
        $request_url = $api_url . '?api_token=' . $api_token . '&mobile=' . $mobile . '&message=' . urlencode($message);

        $ch = curl_init($request_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return $response;
        curl_close($ch);
        
    }   
	
}
