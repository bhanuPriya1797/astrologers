<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer_registration extends CI_Controller {

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
        $this->load->model('admin/PermissionModel');

     }

	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			//if($_POST['add'] == 'add'){

                $this->form_validation->set_rules('name', 'name', 'required'); 
                $this->form_validation->set_rules('mobile_no', 'mobile', 'required|regex_match[/^[0-9]{10}$/]'); 
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); 
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                // $this->form_validation->set_rules('adhaar_card_no', 'Adhaar Card No', 'required');

                if($this->form_validation->run() != false) {

                    if($_FILES['profile_image']['name']!=''){

                        $config['upload_path']          = 'assets/uploads/astrologers_registration';
                        $config['allowed_types']        = 'gif|jpg|png';

                        $this->load->library('upload', $config);      
                        
                        if (!$this->upload->do_upload('profile_image'))
                        {
                            $error = array('error' => $this->upload->display_errors());    
                            $this->load->view('astrologer_registration', $error);
                        }
                        else
                        {
                            // echo $picture1; die;
                        //    echo "hey"; die;
                            $data = array('upload_data' => $this->upload->data());
                            $path =  $this->upload->data();
                            $picture = $path['file_name'];
                            // echo "<pre>"; print_r($picture); die;

                            if ( $_FILES['adhaar_card_image']['name'] && $this->upload->do_upload('adhaar_card_image') ) {
                                $adhaarFIlePath = $this->upload->data();
                                $adhaarFIle = $adhaarFIlePath['file_name'];
                            }

                            if ( $_FILES['pan_card_image']['name'] && $this->upload->do_upload('pan_card_image') ) {
                                $panFIlePath = $this->upload->data();
                                $panFile = $panFIlePath['file_name']; 
                            }

                            if ( $_FILES['screenshot_portals']['name'] && $this->upload->do_upload('screenshot_portals') ) {
                                $screenFIlePath = $this->upload->data();
                                $screenFIle = $screenFIlePath['file_name'];
                            }

                            if ( $_FILES['certificate']['name'] && $this->upload->do_upload('certificate') ) {
                                $certificateFIlePath = $this->upload->data();
                                $certificateFIle = $certificateFIlePath['file_name'];
                            }
                        
                            $data = [

                                "name" => $this->input->post('name'),
                                "mobile_no" => $this->input->post('mobile_no'),
                                "email" => $this->input->post('email'),
                                "all_skills" => implode(',', $this->input->post('all_skills')),
                                "language_known" => implode(',', $this->input->post('language_known')),
                                "location" => $this->input->post('location'),
                                "experience" => $this->input->post('experience_in_years'),
                                "gender" => $this->input->post('gender'),
                                "about_lekhajokhha" => $this->input->post('about_lekhajokhha'),
                                "profile_image" => $picture,
                                "adhaar_card_image" => $adhaarFIle,
                                "pan_card_image" => $panFile,
                                "screenshot_portals" => $screenFIle,
                                "expertise_certificate" => $certificateFIle,
                                "online_platform" => $this->input->post('online_platform'),
                                "about_me" => $this->input->post('about_me'),
                                "refer_by" => $this->input->post('refer_by'),
                                "adhaar_card_no" => $this->input->post('adhaar_card_no'),
                                "pan_card_no" => $this->input->post('pan_card_no'),
                                "complete_address" => $this->input->post('complete_address'),
                                'created_at' => date("Y-m-d H:i:s"),
                                "social_link" => $this->input->post('social_link')                     
                            ];
                            // echo "<pre>"; print_r($data); die;

                            $this->PermissionModel->insert('tbl_astrologers',$data);
                            $this->session->set_flashdata('success', "Thank you for registration. We will get back soon to you.");
                            redirect('astrologer_registration'); 
                        }
                    }
                    else
                    {
                    // echo "hey"; die;
                        // $category_name = implode(',', $this->input->post('category_id'));
                        $data = [

                            "name" => $this->input->post('name'),
                            "mobile_no" => $this->input->post('mobile_no'),
                            "email" => $this->input->post('email'),
                            "all_skills" => implode(',', $this->input->post('all_skills')),
                            "language_known" => implode(',', $this->input->post('language_known')),
                            "location" => $this->input->post('location'),
                            "experience" => $this->input->post('experience_in_years'),
                            "gender" => $this->input->post('gender'),
                            "about_lekhajokhha" => $this->input->post('about_lekhajokhha'),
                            "online_platform" => $this->input->post('online_platform'),
                            "about_me" => $this->input->post('about_me'),
                            "refer_by" => $this->input->post('refer_by'),
                            "adhaar_card_no" => $this->input->post('adhaar_card_no'),
                            "pan_card_no" => $this->input->post('pan_card_no'),
                            "complete_address" => $this->input->post('complete_address'),
                            'created_at' => date("Y-m-d H:i:s"),
                            "social_link" => $this->input->post('social_link'),
                            
                        ];
                        // echo "<pre>"; print_r($data); die;
                        $this->PermissionModel->insert('tbl_astrologers',$data);
                        $this->session->set_flashdata('success', "Thank you for registration. We will get back soon to you.");
                        redirect('astrologer_registration'); 
                    }
                }else{
                    // echo "error"; die;
                    $this->session->set_flashdata('error', validation_errors());
                    $this->load->view('astrologer_registration');
                }
                // echo "out"; die;
			// }

			
		}else{

			$this->load->view('astrologer_registration');
		}

	}
	
}
