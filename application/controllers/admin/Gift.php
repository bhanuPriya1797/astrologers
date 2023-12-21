<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift extends Core_Admin_Controller {
    
    public $table = "gifts";
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->model('Gift_model', 'gift');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'gifts';
        $this->data['title'] = 'gifts';
        $this->data['gifts'] = $this->gift->getGiftList();
        $views[] = 'admin/gift/index';

        $this->admin_view($views);
    }

    public function add_gift() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            // $this->form_validation->set_rules('file', 'Image', 'required');
            if ($this->form_validation->run() != false) {
                $this->load->library('upload');
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/gift_image';
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

                            "title" => $this->input->post('title'),
                            "price" => $this->input->post('price'),
                            "status" => $this->input->post('status'),
                            "image" => $picture,
                            'created_at' => date("Y-m-d H:i:s"),                            
                        ];

                        $this->PermissionModel->insert('gifts',$data);
                        $this->session->set_flashdata('success', "Gift details updated successfully.");
                        redirect('admin/gifts'); 
                    }
                }
                else
                {
                    // $category_name = implode(',', $this->input->post('category_id'));
                    $data = [

                        "title" => $this->input->post('title'),
						"price" => $this->input->post('price'),
						"status" => $this->input->post('status'),
						'created_at' => date("Y-m-d H:i:s"),
                        
                    ];
					$this->PermissionModel->insert('gifts',$data);
					$this->session->set_flashdata('success', "Gift details updated successfully.");
					redirect('admin/gifts');
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['get_category'] = $this->Common_model->get_result("category",['status>='=> 0]);
        $views[] = 'admin/gift/add';

        $this->admin_view($views);
    }

    public function edit_gift() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() != false) {

                $this->load->library('upload');
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/gift_image';
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
                        // $category_name = implode(',', $this->input->post('category_id'));
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [
                            "title" => $this->input->post('title'),
                            "price" => $this->input->post('price'),
                            "status" => $this->input->post('status'),
                            "image" => $picture,
                        ];
                        $id =$this->input->post('id');
                        
                        $this->PermissionModel->Update($id,$data,'gifts');
                        $this->session->set_flashdata('success', "Gift details updated successfully.");
                        redirect('admin/gifts'); 
                    }
                }
                else
                {
                        // $category_name = implode(',', $this->input->post('category_id'));
                        $data = [
                            "title" => $this->input->post('title'),
                            "price" => $this->input->post('price'),
                            "status" => $this->input->post('status'),
                        ];
                        $id =$this->input->post('id');
                    
                    $this->PermissionModel->Update($id,$data,'gifts');
                    $this->session->set_flashdata('success', "Gift details updated successfully.");
                    redirect('admin/gifts'); 
                }
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['gifts'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $this->data['get_category'] = $this->Common_model->get_result("tbl_category",['status>='=> 0]);
        $views[] = 'admin/gift/edit';

        $this->admin_view($views);
    }

    public function delete_gift() {

        $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'gifts',);
        echo "success"; 
		
    }

    
}
