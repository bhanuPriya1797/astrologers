<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Certification extends Core_Admin_Controller {
    
    public $table = "tbl_certification";
    
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
        
        $this->data['active'] = 'certification';
        $this->data['title'] = 'Manage certification type';
        $this->data['certification'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/manage-certification/index';

        $this->admin_view($views);
    }

    public function add() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('name', 'Certification Name', 'required');

            if ($this->form_validation->run() != false) {
                $data = [
                    "name" => $this->input->post('activity'),
                    "status" => $this->input->post('status'),
                    'add_date' => date("Y-m-d H:i:s"),
                ];
                $this->PermissionModel->insert($this->table,$data);
                $this->session->set_flashdata('success', "Certification added successfully.");
                redirect('admin/certification'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }

        }
        $this->data['active'] = 'manage-certification';
        $this->data['title'] = 'Manage Certification';
        $views[] = 'admin/manage-certification/add';

        $this->admin_view($views);
    }

    public function edit() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('name', 'Certification Name', 'required');
            if ($this->form_validation->run() != false) {
                $data = [
                    "name" => $this->input->post('certification'),
                    "status" => $this->input->post('status'),
                ];
                $id =$this->input->post('id');
                
                $this->PermissionModel->Update($id,$data,$this->table);
                $this->session->set_flashdata('success', "Certification updated successfully.");
                redirect('admin/certification');
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'edit-activity';
        $this->data['title'] = 'Add activity';
        $this->data['user'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $views[] = 'admin/manage-certification/edit';

        $this->admin_view($views);
    }

    public function delete() {

        $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],$this->table);
        echo "success";

        
    }

    
}
