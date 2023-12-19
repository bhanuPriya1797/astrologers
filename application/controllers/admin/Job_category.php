<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job_category extends Core_Admin_Controller {
    
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
        
        $this->data['active'] = 'manage-job-category';
        $this->data['title'] = 'manage-job-category';
        $this->data['jobPostList'] = $this->Job_model->getJobList();
        $views[] = 'admin/job-category/index';

        $this->admin_view($views);
    }

    public function add_job(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $config['upload_path'] = './uploads/job/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){  
				
				$uploadData = $this->upload->data();  
				$filename = $uploadData['file_name'];  

			}else{

				$this->session->set_flashdata('errors', $this->upload->display_errors());
				redirect(base_url('admin/manage-job-category'));
			
			}

            $this->form_validation->set_rules('job_title', 'Job title', 'required');
            $this->form_validation->set_rules('job_category', 'Job category', 'required');
            $this->form_validation->set_rules('added_by', 'Added by', 'required');
            $this->form_validation->set_rules('total_jobs', 'total_jobs', 'required');
            if ($this->form_validation->run() != false) {
                $data = array(
                    'job_image' => $filename,
                    'job_title' => $this->input->post('job_title'),
                    'job_category' => $this->input->post('job_category'),
                    'created_at' => date("Y-m-d H:i:s"),
                    'added_by' => $this->input->post('added_by'),
                    'total_jobs' => $this->input->post('total_jobs'),
                    'status' => $this->input->post('status'),
                );

                $insert_id = $this->PermissionModel->insert('tbl_job_category',$data);
                $this->session->set_flashdata('success', "Job Post Added successfully.");
                redirect('admin/manage-job-category'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'manage-job-category';
        $this->data['title'] = 'manage-job-category';
        $views[] = 'admin/job-category/add';

        $this->admin_view($views);


    }

    public function edit_job(){

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
                    $data = array(
                        'job_title' => $this->input->post('job_title'),
                        'job_category' => $this->input->post('job_category'),
                        'added_by' => $this->input->post('added_by'),
                        'total_jobs' => $this->input->post('total_jobs'),
                        'status' => $this->input->post('status'),
                    );
                $this->PermissionModel->Update($id,$data,'tbl_job_category');
                $this->session->set_flashdata('success', "Job category details updated successfully.");
                redirect('admin/manage-job-category'); 
                }

            }
            
            $this->form_validation->set_rules('job_title', 'Job title', 'required');
            $this->form_validation->set_rules('job_category', 'Job category', 'required');
            $this->form_validation->set_rules('added_by', 'Added by', 'required');
            $this->form_validation->set_rules('total_jobs', 'total_jobs', 'required');
            if ($this->form_validation->run() != false) {
                
                $data = array(
                    'job_image' => $filename,
                    'job_title' => $this->input->post('job_title'),
                    'job_category' => $this->input->post('job_category'),
                    'added_by' => $this->input->post('added_by'),
                    'total_jobs' => $this->input->post('total_jobs'),
                    'status' => $this->input->post('status'),
                );
                $this->PermissionModel->Update($id,$data,'tbl_job_category');
                $this->session->set_flashdata('success', "Job category details updated successfully.");
                redirect('admin/manage-job-category'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'manage-job-category';
        $this->data['title'] = 'manage-job-category';
        $this->data['jobPostDetails'] = $this->Job_model->getJobCategoryPostListById($this->uri->segment(3));
    
        $views[] = 'admin/job-category/edit';

        $this->admin_view($views);
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_job_category');
        echo "success"; 
    }

    public function delete() {
        $this->Common_model->delete('tbl_job_category',['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    
}
