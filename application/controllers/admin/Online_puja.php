<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_puja extends Core_Admin_Controller {
    
    public $table = "tbl_dives_center";
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Online_puja_model');
        $this->load->model('admin/Dives_model');
        $this->data['urlkey'] = $this->uri->segment(1);
        $this->load->library('Uploadfiles');
    }
    
    public function index() {

        $user = $this->session->userdata('vendor_login_data');
        
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        // echo "hi"; die;
        $this->data['center'] = $this->Online_puja_model->getPujaDetails();
        $views[] = 'admin/puja/index';

        $this->admin_view($views);
    }

    public function add_puja() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('puja_name', 'Puja Name', 'required');
            if ($this->form_validation->run() != false) {

                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/puja_image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('main_image'))
                    {                         
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [

                            "price" => $this->input->post('price'),
                            "description" => $this->input->post('description'),
                            "puja_name" => $this->input->post('puja_name'),
                            'puja_slug' => slugify(trim($this->input->post('puja_name'))),
                            'created_at' => date("Y-m-d H:i:s"),
                            'puja_image' => $picture,
                            "status" => $this->input->post('status'),

                        ];
                    }

                }else{
                    $data = [
                        "price" => $this->input->post('price'),
                        "description" => $this->input->post('description'),
                        "puja_name" => $this->input->post('puja_name'),
                        'puja_slug' => slugify(trim($this->input->post('puja_name'))),
                        'created_at' => date("Y-m-d H:i:s"),
                        "status" => $this->input->post('status'),
                        ];
                }       
                $insert_id = $this->PermissionModel->insert("tbl_puja",$data);
                $this->session->set_flashdata('success', "Puja Details Added successfully.");
                redirect('admin/online_puja'); 
                
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['productList'] = $this->Dives_model->getRentalProduct();
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 1]);
        $this->data['dives_type'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 1]);
        $this->data['dives_location'] = $this->Common_model->get_result("tbl_dives_center",['status>='=> 1]);
        $this->data['certification_list'] = $this->Common_model->get_result("tbl_certification",['status>='=> 1]);
        $views[] = 'admin/puja/add';

        $this->admin_view($views);
    }

    public function edit_puja() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {
                
                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/puja_image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('main_image'))
                    {                        
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [
                            "price" => $this->input->post('price'),
                            "description" => $this->input->post('description'),
                            "puja_name" => $this->input->post('puja_name'),
                            'puja_slug' => slugify(trim($this->input->post('puja_name'))),
                            'puja_image' => $picture,
                            "status" => $this->input->post('status'),
                        ];
                    }

                }else{
                    $data = [
                        "price" => $this->input->post('price'),
                        "description" => $this->input->post('description'),
                        "puja_name" => $this->input->post('puja_name'),
                        'puja_slug' => slugify(trim($this->input->post('puja_name'))),
                        "status" => $this->input->post('status'),
                        ];
                }
                
                //print_r($data);die;
                $id =$this->input->post('id');

                $this->PermissionModel->Update($id,$data,'tbl_puja');
                

                $this->session->set_flashdata('success', "Puja details Updated successfully.");
                redirect('admin/online_puja'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'Puja';
        $this->data['title'] = 'Online Puja';
        $this->data['center'] = $this->Online_puja_model->getPujaDetailsById($this->uri->segment(3));       
        $views[] = 'admin/puja/edit';
        $this->admin_view($views);
    }

    public function delete_puja() {

        $this->data['vendors'] = $this->Common_model->delete('tbl_puja',['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_vendor_dives_center_images',$id);
      echo 1;
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_puja');
        echo "success";

        
    }
}
