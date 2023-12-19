<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_category extends Core_Admin_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Blog_model');
        $this->load->model('admin/Login_model', 'admin');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['categoryList'] = $this->Blog_model->getCategoryList();
        $views[] = 'admin/blog_category/index';

        $this->admin_view($views);

    }    
    
    public function add_blog_category(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('name', 'Category Name', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() != false) {

                $data = [
                    "blog_category" => $this->input->post('name'),
                    "status" => $this->input->post('status'),
                ];

                $this->PermissionModel->insert('blog_category',$data);
                $this->session->set_flashdata('success', "Blog Category Added successfully.");
                redirect('admin/manage-blog-category'); 

            }

        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['roles'] = $this->roles->getRoles();
        $views[] = 'admin/blog_category/add';

        $this->admin_view($views);

    }               

    public function edit_blog(){
        
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('name', 'Category Name', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');

            if ($this->form_validation->run() != false) {

                $id =$this->input->post('id');
                $data = [
                    "blog_category" => $this->input->post('name'),
                    "status" => $this->input->post('status')
                ];
                $this->PermissionModel->Update($id,$data,'blog_category');
                $this->session->set_flashdata('success', "Blog Category updated successfully.");
                redirect('admin/manage-blog-category'); 

            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        
        }

        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['categoryList'] = $this->Blog_model->getBlogCategoryListById($this->uri->segment(3));
        $views[] = 'admin/blog_category/edit';

        $this->admin_view($views);

    }

    public function delete(){

        $this->Common_model->delete('blog_category',['id'=> $this->input->post('id')]);
        echo "success";

    }


}