<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends Core_Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Job_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->library('Uploadfiles');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'job';
        $this->data['title'] = 'job';
        $this->data['jobPostList'] = $this->Job_model->getJobPostList();
        $views[] = 'admin/job/index';

        $this->admin_view($views);
    }

    public function add(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $config['upload_path'] = './uploads/job/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){  
				
				$uploadData = $this->upload->data();  
				$filename = $uploadData['file_name'];  

			}else{

				$this->session->set_flashdata('errors', $this->upload->display_errors());
				redirect(base_url('admin/job'));
			
			}

            $this->form_validation->set_rules('heading', 'Heading', 'required');
            $this->form_validation->set_rules('subheading', 'Subheading', 'required');
            if ($this->form_validation->run() != false) {
                $data = [
                    "job_category_id" => $this->input->post('job_category_id'),
                    "heading" => $this->input->post('heading'),
                    "subheading" => $this->input->post('subheading'),
                    "overview" => $this->input->post('overview'),
                    "requirements" => $this->input->post('requirements'),
                    "skill_experience" => $this->input->post('skill_experience'),
                    "status" => $this->input->post('status'),
                    "image" =>  $filename
                ];

                $insert_id = $this->PermissionModel->insert('tbl_jobs',$data);
                $this->session->set_flashdata('success', "Job Post Added successfully.");
                redirect('admin/job'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'job';
        $this->data['title'] = 'job';
        $this->data['categoryList'] = $this->Job_model->getJobCategoryList();
        $views[] = 'admin/job/add';

        $this->admin_view($views);


    }

    public function edit(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $id =$this->input->post('id');
            $where = array();
            $config['upload_path'] = './uploads/job/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';

            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!empty($_FILES)){
                
                if($this->upload->do_upload('file')){  
                    $uploadData = $this->upload->data();  
                    $filename = $uploadData['file_name'];  
                }else{
                    $data = [
                        "job_category_id" => $this->input->post('job_category_id'),
                        "heading" => $this->input->post('heading'),
                        "subheading" => $this->input->post('subheading'),
                        "overview" => $this->input->post('overview'),
                        "requirements" => $this->input->post('requirements'),
                        "skill_experience" => $this->input->post('skill_experience'),
                        "status" => $this->input->post('status')
                    ];
                    $this->PermissionModel->Update($id,$data,'tbl_jobs');
                    $this->session->set_flashdata('success', "Job  updated successfully.");
                    redirect('admin/job'); 
                }

            }
            
            $this->form_validation->set_rules('heading', 'Heading', 'required');
            $this->form_validation->set_rules('subheading', 'Subheading', 'required');
            if ($this->form_validation->run() != false) {
                
                $data = [
                    "job_category_id" => $this->input->post('job_category_id'),
                    "heading" => $this->input->post('heading'),
                    "subheading" => $this->input->post('subheading'),
                    "overview" => $this->input->post('overview'),
                    "requirements" => $this->input->post('requirements'),
                    "skill_experience" => $this->input->post('skill_experience'),
                    "status" => $this->input->post('status'),
                    "image" =>  $filename
                ];
                $this->PermissionModel->Update($id,$data,'tbl_jobs');
                $this->session->set_flashdata('success', "Job  updated successfully.");
                redirect('admin/job'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'job';
        $this->data['title'] = 'job';
        $this->data['categoryList'] = $this->Job_model->getJobCategoryList();
        $this->data['jopPost'] = $this->Job_model->getJobPostListById($this->uri->segment(3));
    
        $views[] = 'admin/job/edit';

        $this->admin_view($views);
    }

    public function delete(){

        $this->Common_model->delete('tbl_jobs',['id'=> $this->uri->segment(4)]);
        echo "success"; 

    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_jobs');
        echo "success"; 
    }

    
}
