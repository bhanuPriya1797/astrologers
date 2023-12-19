<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends Core_Admin_Controller {
    
    public $table = "tbl_users";
    
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
        
        $this->data['active'] = 'users';
        $this->data['title'] = 'users';
        $this->data['customers'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/customer/index';

        $this->admin_view($views);
    }

    public function add_customer() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'required');
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
            $this->form_validation->set_rules('time_of_birth', 'Time of Birth', 'required');
            $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
            $this->form_validation->set_rules('occupation', 'Occupation', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() != false) {

                    $data = [
                        "name" => $this->input->post('name'),
                        "gender" => $this->input->post('gender'),
                        "place_of_birth" => $this->input->post('place_of_birth'),
                        "date_of_birth" => $this->input->post('date_of_birth'),
                        "time_of_birth" => $this->input->post('time_of_birth'),
                        "marital_status" => $this->input->post('marital_status'),
                        "occupation" => $this->input->post('occupation'),
                        "status" => $this->input->post('status'),
                        'created_at' => date("Y-m-d H:i:s"),
                    ];
                    $this->PermissionModel->insert('tbl_users',$data);
                    $this->session->set_flashdata('success', "User details added successfully.");
                    redirect('admin/user'); 
                
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['roles'] = $this->roles->getRoles();
        $views[] = 'admin/customer/add';

        $this->admin_view($views);
    }

    public function edit_customer() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'required');
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
            $this->form_validation->set_rules('time_of_birth', 'Time of Birth', 'required');
            $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
            $this->form_validation->set_rules('occupation', 'Occupation', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() != false) {

                    $data = [
                        "name" => $this->input->post('name'),
                        "gender" => $this->input->post('gender'),
                        "place_of_birth" => $this->input->post('place_of_birth'),
                        "date_of_birth" => $this->input->post('date_of_birth'),
                        "time_of_birth" => $this->input->post('time_of_birth'),
                        "marital_status" => $this->input->post('marital_status'),
                        "occupation" => $this->input->post('occupation'),
                        "status" => $this->input->post('status'),
                    ];
                    $id =$this->input->post('id');
                    
                    $this->PermissionModel->Update($id,$data,'tbl_users');
                    $this->session->set_flashdata('success', "User details updated successfully.");
                    redirect('admin/user'); 
                // }
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['user'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $views[] = 'admin/customer/edit';

        $this->admin_view($views);
    }

    public function delete_customer() {

        $this->data['customers'] = $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function change_status()
    {
        return $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_users',);

        
    }

    
}
