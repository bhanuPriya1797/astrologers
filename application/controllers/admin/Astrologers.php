<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Astrologers extends Core_Admin_Controller {
    
    public $table = "tbl_astrologers";
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Login_model', 'admin');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'astrologers';
        $this->data['title'] = 'astrologers';
        $this->data['astrologers'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/astrologers/index';

        $this->admin_view($views);
    }

    public function add_astrologers() {

        $user = $this->session->userdata('admin_login_data');
        
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required');

            if ($this->form_validation->run() != false) {

                $this->load->library('upload');

                if($_FILES['file']['profile_image']){

                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/admin/image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file'))
                    {                        
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [
                            "name" => $this->input->post('name'),
                            "mobile_no" => $this->input->post('mobile_no'),
                            "email" => $this->input->post('email'),
                            "all_skills" => $this->input->post('all_skills'),
                            "language_known" => $this->input->post('language_known'),
                            "location" => $this->input->post('location'),
                            "experience" => $this->input->post('experience_years'),
                            "gender" => $this->input->post('gender'),
                            "about_lekhajokhha" => $this->input->post('about_lekhajokhha'),
                            "profile_pic" => $picture,
                            "online_platform" => $this->input->post('online_platform'),
                            "about_me" => $this->input->post('about_me'),
                            "refer_by" => $this->input->post('refer_by'),
                            "adhaar_card_no" => $this->input->post('adhaar_card_no'),
                            "pan_card_no" => $this->input->post('pan_card_no'),
                            "complete_address" => $this->input->post('complete_address'),
                            'created_at' => date("Y-m-d H:i:s"),
                            "social_link" => $this->input->post('social_link'),
                            "screenshot_portals" => $this->input->post('screenshot_portals'),
                            "status" => '1'
                        ];
                        
                        $this->PermissionModel->insert('tbl_astrologers',$data);
                        $this->session->set_flashdata('success', "Customer details updated successfully.");
                        redirect('admin/astrologers'); 
                    }
                }
                else
                {
                    $data = [
                        "name" => $this->input->post('name'),
                        "mobile_no" => $this->input->post('mobile_no'),
                        "email" => $this->input->post('email'),
                        "all_skills" => $this->input->post('all_skills'),
                        "language_known" => $this->input->post('language_known'),
                        "location" => $this->input->post('location'),
                        "experience" => $this->input->post('experience_years'),
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
                        "screenshot_portals" => $this->input->post('screenshot_portals'),
                        "status" => '1'
                    ];
                    $this->PermissionModel->insert('tbl_astrologers',$data);
                    $this->session->set_flashdata('success', "Astrologers details updated successfully.");
                    redirect('admin/astrologers'); 
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'astrologers';
        $this->data['title'] = 'astrologers';
        $this->data['roles'] = $this->roles->getRoles();
        $views[] = 'admin/astrologers/add';

        $this->admin_view($views);
    }

    public function edit_astrologers() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required');
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
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [
                            "name" => $this->input->post('name'),
                            "mobile_no" => $this->input->post('mobile_no'),
                            "email" => $this->input->post('email'),
                            "all_skills" => $this->input->post('all_skills'),
                            "language_known" => $this->input->post('language_known'),
                            "location" => $this->input->post('location'),
                            "experience" => $this->input->post('experience_years'),
                            "gender" => $this->input->post('gender'),
                            "about_lekhajokhha" => $this->input->post('about_lekhajokhha'),
                            "profile_pic" => $picture,
                            "online_platform" => $this->input->post('online_platform'),
                            "about_me" => $this->input->post('about_me'),
                            "refer_by" => $this->input->post('refer_by'),
                            "adhaar_card_no" => $this->input->post('adhaar_card_no'),
                            "pan_card_no" => $this->input->post('pan_card_no'),
                            "complete_address" => $this->input->post('complete_address'),
                            'created_at' => date("Y-m-d H:i:s"),
                            "social_link" => $this->input->post('social_link'),
                            "screenshot_portals" => $this->input->post('screenshot_portals'),
                            "status" => $this->input->post('status')
                        ];
                        if(!empty($this->input->post('password'))){
                            $data['password'] = md5(trim($this->input->post('password')));
                        }
                        $id =$this->input->post('id');
                        
                        $this->PermissionModel->Update($id,$data,'tbl_astrologers');
                        $this->session->set_flashdata('success', "Astrologers details updated successfully.");
                        redirect('admin/astrologers'); 
                    }
                }
                else
                {
                    $data = [
                        "name" => $this->input->post('name'),
                        "mobile_no" => $this->input->post('mobile_no'),
                        "email" => $this->input->post('email'),
                        "all_skills" => $this->input->post('all_skills'),
                        "language_known" => $this->input->post('language_known'),
                        "location" => $this->input->post('location'),
                        "experience" => $this->input->post('experience_years'),
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
                        "screenshot_portals" => $this->input->post('screenshot_portals'),
                        "status" => $this->input->post('status')
                    ];
                    $id =$this->input->post('id');
                    
                    $this->PermissionModel->Update($id,$data,'tbl_astrologers');
                    $this->session->set_flashdata('success', "Astrologers details updated successfully.");
                    redirect('admin/astrologers'); 
                }
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        // echo $this->uri->segment(3); die;
        $this->data['active'] = 'astrologers';
        $this->data['title'] = 'astrologers';
        $this->data['user'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $views[] = 'admin/astrologers/edit';

        $this->admin_view($views);
    }

    public function delete_astrologers() {

        $this->data['customers'] = $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function change_status()
    {
        return $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_astrologers',);

        
    }

    
}
