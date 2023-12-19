<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends Core_Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Job_model');
        $this->load->model('admin/Testimonial_model', 'testimonial');
        $this->load->library('Uploadfiles');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'testimonial';
        $this->data['title'] = 'testimonial';
        $this->data['getList'] = $this->testimonial->getTestimonial();
        $views[] = 'admin/testimonial/index';

        $this->admin_view($views);
    }

    public function add(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $config['upload_path'] = './uploads/testimonial/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){  
				
				$uploadData = $this->upload->data();  
				$filename = $uploadData['file_name'];  

			}else{

				$this->session->set_flashdata('errors', $this->upload->display_errors());
				redirect(base_url('admin/testimonial'));
			
			}

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('heading', 'Heading', 'required');
            if ($this->form_validation->run() != false) {
                
                $data = array(
                    'image' => $filename,
                    'title' => $this->input->post('title'),
                    'heading' => $this->input->post('heading'),
                    'subheading' => $this->input->post('subheading'),
                    'created_at' => date("Y-m-d H:i:s"),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                );

                $insert_id = $this->PermissionModel->insert('tbl_testimonial',$data);
                $this->session->set_flashdata('success', "Testimonial Added successfully.");
                redirect('admin/testimonial'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'testimonial';
        $this->data['title'] = 'testimonial';
        $views[] = 'admin/testimonial/add';

        $this->admin_view($views);


    }

    public function edit(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $id =$this->input->post('id');
            $where = array();
            $config['upload_path'] = './uploads/testimonial/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';

            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!empty($_FILES)){
                
                if($this->upload->do_upload('file')){  
                    $uploadData = $this->upload->data();  
                    $filename = $uploadData['file_name'];  
                }else{
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    $data = array(
                    'title' => $this->input->post('title'),
                    'heading' => $this->input->post('heading'),
                    'subheading' => $this->input->post('subheading'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status')
                );
                
                $this->PermissionModel->Update($id,$data,'tbl_testimonial');
                    redirect(base_url('admin/testimonial'));
                }

            }
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('heading', 'Heading', 'required');
            if ($this->form_validation->run() != false) {
                
                $data = array(
                    'image' => $filename,
                    'title' => $this->input->post('title'),
                    'heading' => $this->input->post('heading'),
                    'subheading' => $this->input->post('subheading'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status')
                );
                
                $this->PermissionModel->Update($id,$data,'tbl_testimonial');
                $this->session->set_flashdata('success', "Testimonial updated successfully.");
                redirect('admin/testimonial'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'testimonial';
        $this->data['title'] = 'testimonial';
        $this->data['jobPostDetails'] = $this->testimonial->getTestimonialId($this->uri->segment(3));
    
        $views[] = 'admin/testimonial/edit';

        $this->admin_view($views);
    }

    public function delete(){

        $this->Common_model->delete('tbl_testimonial',['id'=> $this->input->post('id')]);
        echo "success";  

    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_testimonial');
        echo "success"; 
    }

    
}
