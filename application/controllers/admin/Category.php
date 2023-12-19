<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Core_Admin_Controller {
    
    public $table = "tbl_dives_center";
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Category_model','category');
        $this->data['urlkey'] = $this->uri->segment(1);
        $this->load->library('Uploadfiles');
    }
    
    public function index() {

        // $user = $this->session->userdata('vendor_login_data');
        
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        // echo "hi"; die;
        $this->data['category_list'] = $this->category->getCategory();
        $views[] = 'admin/category/index';

        $this->admin_view($views);
    }

    public function add_category() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() != false) {

                $data = array(

                    "category_name" => $this->input->post('name'),
                    'category_slug' => slugify(trim($this->input->post('name'))),
                    'created_at' => date("Y-m-d H:i:s"),
                    "status" => $this->input->post('status'),

                );

                      
                $insert_id = $this->PermissionModel->insert("category",$data);
                $this->session->set_flashdata('success', "Category Details Added successfully.");
                redirect('admin/category'); 
                
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'category';
        $this->data['title'] = 'Category';
       
        $views[] = 'admin/category/add';

        $this->admin_view($views);
    }

    public function edit_category() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {
                
                $data = array(

                    "category_name" => $this->input->post('name'),
                    'category_slug' => slugify(trim($this->input->post('name'))),
                    // 'created_at' => date("Y-m-d H:i:s"),
                    "status" => $this->input->post('status'),

                );
                
                //print_r($data);die;
                $id =$this->input->post('id');

                $this->PermissionModel->Update($id,$data,'category');
                

                $this->session->set_flashdata('success', "Category details Updated successfully.");
                redirect('admin/category'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'category';
        $this->data['title'] = 'category';
        $this->data['category'] = $this->category->getCategoryById($this->uri->segment(3));       
        $views[] = 'admin/category/edit';
        $this->admin_view($views);
    }

    public function delete_category() {

        $this->data['vendors'] = $this->Common_model->delete('category',['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_vendor_dives_center_images',$id);
      echo 1;
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'category');
        echo "success";

        
    }
}
