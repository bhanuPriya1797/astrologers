<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_code extends Core_Admin_Controller {
    
    public $table = "tbl_coupon";
    
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
        
        $this->data['active'] = 'promo code';
        $this->data['title'] = 'Manage Promo Code';
        $this->data['dives_category'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/manage-promo/index';

        $this->admin_view($views);
    }

    public function add() {

        $user = $this->session->userdata('admin_login_data');

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
            $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
            $this->form_validation->set_rules('coupon_value', 'Coupon Value', 'required');
            $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');

            if ($this->form_validation->run() != false) {

                $data = [
                    "coupon_name" => $this->input->post('coupon_name'),
                    "coupon_code" => $this->input->post('coupon_code'),
                    "coupon_value" => $this->input->post('coupon_value'),
                    "type" => $this->input->post('type'),
                    "start_date" => date("Y-m-d",strtotime($this->input->post('start_date'))),
                    "end_date" => date("Y-m-d",strtotime($this->input->post('end_date'))),
                    "status" => $this->input->post('status')
                ];

                // echo "<pre>"; print_r($_POST); die;
                $insert_id = $this->PermissionModel->insert($this->table,$data);
                // echo $id; die;

                $services_list = $this->input->post('services');
                $vendor_id = $this->input->post('vendors');

                for($i=0; $i<count($services_list); $i++){

                    $data_2 =array('service_id' => $services_list[$i],'vendor_id'=> $vendor_id,'coupon_id' => $insert_id);        
                    
                    // $this->db->insert('tbl_vendor_service_coupon', $data_2);
                    // $last_id =  $this->db->insert_id();
                    $insert_id = $this->PermissionModel->insert('tbl_vendor_service_coupon',$data_2);
                            
                }      

                $this->session->set_flashdata('success', "Promo Code added successfully.");
                redirect('admin/promo-code'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }

        }

        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['vendor_list'] = $this->Common_model->get_result('tbl_vendors',['status>='=> 1]);
       // echo "<pre>"; print_r($this->data['vendor_list']); die;
        $views[] = 'admin/manage-promo/add';

        $this->admin_view($views);
    }

    public function edit() {

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
            $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
            $this->form_validation->set_rules('coupon_value', 'Coupon Value', 'required');
            $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
            if ($this->form_validation->run() != false) {
                $data = [
                    "coupon_name" => $this->input->post('coupon_name'),
                    "coupon_code" => $this->input->post('coupon_code'),
                    "coupon_value" => $this->input->post('coupon_value'),
                    "type" => $this->input->post('type'),
                    "start_date" => date("Y-m-d",strtotime($this->input->post('start_date'))),
                    "end_date" => date("Y-m-d",strtotime($this->input->post('end_date'))),
                    "status" => $this->input->post('status')
                ];
                $id =$this->input->post('id');
                
                $this->PermissionModel->Update($id,$data,$this->table);
                $this->session->set_flashdata('success', "Promo Code updated successfully.");
                redirect('admin/promo-code'); 
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'edit-promo-code';
        $this->data['title'] = 'Add Promo Code';
        $this->data['promo_code'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $views[] = 'admin/manage-promo/edit';

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

    public function getServicesByVendorId(){

        $vendorId = $this->input->post('vendorId');

        $serviceData = $this->Common_model->get_result('tbl_vendor_dives_location',['vendor_id' => $vendorId]);

        // echo json_encode($this->data['serviceData']);
        $style = array();
        foreach ($serviceData as $key => $serviceVal) {

           $style[]  =  '<option value="'.$serviceVal->id.'">'.$serviceVal->dives_name.'</option>';

            
        }

        // $this->table->set_template($style);

        // $style = array('table_open'  => '<table class="table table-striped table-hover">');
        // echo $this->table->generate($this->db->get('customers'));
        print_r($style);



    }

    
}
