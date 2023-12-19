<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_history extends Core_Admin_Controller {
    
    public $table = "tbl_orders";
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Payment_model','payment');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'payment';
        $this->data['title'] = 'payment';
        $this->data['payment_history'] = $this->payment->getPaymentList();
        $views[] = 'admin/payment-history/index';

        $this->admin_view($views);
    }

    public function change_status()
    {
        return $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_customer',);
    }

    public function commission(){
        
        

        $this->data['active'] = 'payment';
        $this->data['title'] = 'payment';
        $id = $this->uri->segment(3);
        $this->data['booking_id'] = $this->uri->segment(3);
        // $this->data['payment_history'] = $this->payment->getPaymentList();
        $views[] = 'admin/payment-history/edit';
        $this->admin_view($views);
    }

    public function send_payment(){


    }
    
}
