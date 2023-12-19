<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends Core_Admin_Controller {
    
    public $table = "tbl_vendors";
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->model('vendor/Booking_model','booking');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'vendors';
        $this->data['title'] = 'vendors';
        $this->data['vendors'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/vendor/index';

        $this->admin_view($views);
    }

    public function add_vendor() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
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
                            "first_name" => $this->input->post('first_name'),
                            "last_name" => $this->input->post('last_name'),
                            "email" => $this->input->post('email'),
                            "mobile" => $this->input->post('mobile'),
                             "legal_status" => $this->input->post('legal_status')?$this->input->post('legal_status'): "off",
                            "status" => $this->input->post('status'),
                            "country" => $this->input->post('country'),
                            "state" => $this->input->post('state'),
                            "city" => $this->input->post('city'),
                            "address" => $this->input->post('address'),
                            "password" => md5(trim($this->input->post('password'))),
                            "activity_type" => $this->input->post('activity_type'),
                            "activity_area" => $this->input->post('activity_area'),
                            "social_media" => implode(",", $this->input->post('social_media')),
                            'created_at' => date("Y-m-d H:i:s"),
                            "zip_code" => $this->input->post('zip_code'),
                            "description" => $this->input->post('description'),
                            "gender" => $this->input->post('gender'),
                            "company_name" => $this->input->post('company_name'),
                            "currency" => $this->input->post('currency'),
                            "profile_pic" => $picture
                        ];

                        $insert_id = $this->PermissionModel->insert('tbl_vendors',$data);
                        if($insert_id){
                            foreach ($_POST['m_first_name'] as $key => $value) {
                                $this->db->insert('tbl_managing_director', array(
                                    'vendor_id' => $insert_id,
                                    'first_name' => $value,
                                    'last_name' => $_POST['m_last_name'][$key],
                                    'status' =>1
                                ));
                            }

                            $this->session->set_flashdata('success', "Vendors details updated successfully.");
                            redirect('admin/vendors'); 
                        }
                        
                    }
                }
                else
                {
                    $data = [
                        "first_name" => $this->input->post('first_name'),
                        "last_name" => $this->input->post('last_name'),
                        "email" => $this->input->post('email'),
                        "mobile" => $this->input->post('mobile'),
                         "legal_status" => $this->input->post('legal_status')?$this->input->post('legal_status'): "off",
                        "status" => $this->input->post('status'),
                        "country" => $this->input->post('country'),
                        "state" => $this->input->post('state'),
                        "city" => $this->input->post('city'),
                        "address" => $this->input->post('address'),
                        "password" => md5(trim($this->input->post('password'))),
                        "activity_type" => $this->input->post('activity_type'),
                        "activity_area" => $this->input->post('activity_area'),
                        "social_media" => implode(",", $this->input->post('social_media')),
                        'created_at' => date("Y-m-d H:i:s"),
                        "zip_code" => $this->input->post('zip_code'),
                        "description" => $this->input->post('description'),
                        "gender" => $this->input->post('gender'),
                        "company_name" => $this->input->post('company_name'),
                        "currency" => $this->input->post('currency'),

                    ];
                    $insert_id = $this->PermissionModel->insert('tbl_vendors',$data);
                    if($insert_id){
                        foreach ($_POST['m_first_name'] as $key => $value) {
                            $this->db->insert('tbl_managing_director', array(
                                'vendor_id' => $insert_id,
                                'first_name' => $value,
                                'last_name' => $_POST['m_last_name'][$key],
                                'status' =>1
                            ));
                        }

                        $this->session->set_flashdata('success', "Vendors details updated successfully.");
                        redirect('admin/vendors'); 
                    } 
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 0]);
        $this->data['countries'] = $this->Common_model->getCountries();
        $this->data['currency'] = $this->Common_model->getcurrnecy();
        $this->data['roles'] = $this->roles->getRoles();
        $views[] = 'admin/vendor/add';

        $this->admin_view($views);
    }

    public function edit_vendor() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            if ($this->form_validation->run() != false) {
                $id =$this->input->post('id');
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
                            "first_name" => $this->input->post('first_name'),
                            "last_name" => $this->input->post('last_name'),
                            "email" => $this->input->post('email'),
                            "mobile" => $this->input->post('mobile'),
                             "legal_status" => $this->input->post('legal_status')?$this->input->post('legal_status'): "off",
                            "status" => $this->input->post('status'),
                            "country" => $this->input->post('country'),
                            "state" => $this->input->post('state'),
                            "city" => $this->input->post('city'),
                            "address" => $this->input->post('address'),
                            "password" => md5(trim($this->input->post('password'))),
                            "activity_type" => $this->input->post('activity_type'),
                            "activity_area" => $this->input->post('activity_area'),
                            "social_media" => implode(",", $this->input->post('social_media')),
                            'created_at' => date("Y-m-d H:i:s"),
                            "zip_code" => $this->input->post('zip_code'),
                            "description" => $this->input->post('description'),
                            "gender" => $this->input->post('gender'),
                            "company_name" => $this->input->post('company_name'),
                            "currency" => $this->input->post('currency'),
                            "profile_pic" => $picture
                            
                        ];
                        if(!empty($this->input->post('password'))){
                            $data['password'] = md5(trim($this->input->post('password')));
                        }
                        $this->PermissionModel->Update($id,$data,'tbl_vendors');
                        $this->Common_model->delete('tbl_managing_director',['vendor_id'=> $id]);
                        foreach ($_POST['m_first_name'] as $key => $value) {
                            $this->db->insert('tbl_managing_director', array(
                                'vendor_id' => $id,
                                'first_name' => $value,
                                'last_name' => $_POST['m_last_name'][$key],
                                'status' =>1
                            ));
                        }
                        $this->session->set_flashdata('success', "Vendors details updated successfully.");
                        redirect('admin/vendors'); 
                    }
                }
                else
                {
                    $data = [
                        "first_name" => $this->input->post('first_name'),
                            "last_name" => $this->input->post('last_name'),
                            "email" => $this->input->post('email'),
                            "mobile" => $this->input->post('mobile'),
                             "legal_status" => $this->input->post('legal_status')?$this->input->post('legal_status'): "off",
                            "status" => $this->input->post('status'),
                            "country" => $this->input->post('country'),
                            "state" => $this->input->post('state'),
                            "city" => $this->input->post('city'),
                            "address" => $this->input->post('address'),
                            "password" => md5(trim($this->input->post('password'))),
                            "activity_type" => $this->input->post('activity_type'),
                            "activity_area" => $this->input->post('activity_area'),
                            "social_media" => implode(",", $this->input->post('social_media')),
                            'created_at' => date("Y-m-d H:i:s"),
                            "zip_code" => $this->input->post('zip_code'),
                            "description" => $this->input->post('description'),
                            "gender" => $this->input->post('gender'),
                            "company_name" => $this->input->post('company_name'),
                            "currency" => $this->input->post('currency')
                    ];
                    if(!empty($this->input->post('password'))){
                            $data['password'] = md5(trim($this->input->post('password')));
                    }
                    
                    
                    $this->PermissionModel->Update($id,$data,'tbl_vendors');
                    $this->Common_model->delete('tbl_managing_director',['vendor_id'=> $id]);
                    foreach ($_POST['m_first_name'] as $key => $value) {
                            $this->db->insert('tbl_managing_director', array(
                                'vendor_id' => $id,
                                'first_name' => $value,
                                'last_name' => $_POST['m_last_name'][$key],
                                'status' =>1
                            ));
                    }
                    $this->session->set_flashdata('success', "Vendors details updated successfully.");
                    redirect('admin/vendors'); 
                }
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['vendor_id'] = $this->uri->segment(3);
        $this->data['totalAmount'] = $this->booking->getTotalAmountByVendor($this->uri->segment(3));
        $this->data['totalBooking'] = $this->booking->getTotalBookingsByVendor($this->uri->segment(3));
        $this->data['user'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 0]);
        $this->data['countries'] = $this->Common_model->getCountries();
        $this->data['currency'] = $this->Common_model->getcurrnecy();
        $this->data['roles'] = $this->roles->getRoles();
        $views[] = 'admin/vendor/edit';

        $this->admin_view($views);
    }

    public function delete_vendor() {

        $this->data['vendors'] = $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    public function delete_management_name(){
        $id = $this->input->post('id');
        $this->db->delete('tbl_managing_director', array('id'=>$id));
    }

    public function change_status()
    {
        $where = array();
        $where['id'] = $this->input->post('id');
        $data = array('status' => $this->input->post('status'),'email'=> $this->input->post('email'));
        $mail_data['email'] = $this->input->post('email');
        $subject = "Confirmation Email for Vendor Account Activation";
        $message = $this->load->view('backend/mailer/vendor-account-activation', $mail_data, true);
        send_mail($this->input->post('email'), $subject, $message);
        return $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_vendors',);

        
    }

  

    
}
