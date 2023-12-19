<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dives extends Core_Vendor_Controller {
    public $table = "tbl_dives_center";
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('vendor/Dives_model');
        $this->data['urlkey'] = $this->uri->segment(1);
        $this->load->library('Uploadfiles');
    }
    
    public function index() {
        $user = $this->session->userdata('vendor_login_data');
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['center'] = $this->Dives_model->getCategoryDefaultById($user['id']);
        $views[] = 'vendor/manage-dives/index';

        $this->vendor_view($views);
    }

    public function add_dives() {
        $user = $this->session->userdata('vendor_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('price_per_person', 'Price Per Person', 'required');
            $this->form_validation->set_rules('group_size', 'Group Size', 'required');
            // $this->form_validation->set_rules('slots', 'slots', 'required');
            // $this->form_validation->set_rules('dive', 'Dive Type', 'required');
            // $this->form_validation->set_rules('level', 'Level', 'required');
            // $this->form_validation->set_rules('depth', 'Depth', 'required');
            // $this->form_validation->set_rules('temp', 'Temp', 'required');
            // $this->form_validation->set_rules('visibility', 'Temp', 'required');
            // $this->form_validation->set_rules('currents', 'Currents', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('dives_name', 'Dives Name', 'required');
            // $this->form_validation->set_rules('product_id', 'Product', 'required');
            // $this->form_validation->set_rules('rental_price', 'Rental Price', 'required');
            // $this->form_validation->set_rules('stock', 'Stock', 'required');
            if ($this->form_validation->run() != false) {

                
                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/dive_main_image';
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

                            "vendor_id" => $user['id'],
                            "location_id" => $this->input->post('location_id'),
                            "price_per_person" => $this->input->post('price_per_person'),
                            "start_date" => $this->input->post('start_date'),
                            "end_date" => $this->input->post('end_date'),
                            "description" => $this->input->post('description'),
                            "dives_name" => $this->input->post('dives_name'),
                            'dives_slug' => slugify(trim($this->input->post('dives_name')).' '.trim($this->input->post('price_per_person'))),
                            "group_size" => $this->input->post('group_size'),
                            'created_at' => date("Y-m-d H:i:s"),
                            'dives_thumbnail_image' => $picture,
                            "status" => $this->input->post('status'),
                            "youtube_link"=> $this->input->post('youtube_link'),
                            "activity_type"=> $this->input->post('activity_type'),

                        ];
                    }

                }else{
                    $data = [
                            "vendor_id" => $user['id'],
                            "location_id" => $this->input->post('location_id'),
                            "price_per_person" => $this->input->post('price_per_person'),
                            "slots" => $this->input->post('slots'),
                            "start_date" => $this->input->post('start_date'),
                            "end_date" => $this->input->post('end_date'),
                            "description" => $this->input->post('description'),
                            "dives_name" => $this->input->post('dives_name'),
                            'dives_slug' => slugify(trim($this->input->post('dives_name')).' '.trim($this->input->post('price_per_person'))),
                            "group_size" => $this->input->post('group_size'),
                            'created_at' => date("Y-m-d H:i:s"),
                            "status" => $this->input->post('status'),
                            "youtube_link"=> $this->input->post('youtube_link'),
                            "activity_type"=> $this->input->post('activity_type'),
                        ];
                }       

                // echo "<pre>"; print_r($data);die;
                $insert_id = $this->PermissionModel->insert("tbl_vendor_dives_location",$data);
                if($insert_id){
                    $vendor_id =$user['id'];
                    $location_id =$this->input->post('location_id');
                    $status = 1;
                    if (!empty($_FILES['slider']['name'][0])) {
                        $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dives_location_image');
                        if(count($response) > 0){
                            $query ="insert into tbl_vendor_dives_center_images (vendor_id,location_id,image,status) values";
                            foreach ($response as $key => $value) {
                                $query .="('$vendor_id','$insert_id','$value','$status'),";
                            }
                            $query = rtrim($query, ',');
                            $this->Common_model->customInsert($query);
                        }
                    }
                        $productId = $this->input->post('product_id');
                        $rentalPrice = $this->input->post('rental_price');
                        $stock = $this->input->post('stock');
                        $edit = "No";


                   $last_id =  $this->Dives_model->addProductDetails($insert_id,$vendor_id,$productId,$rentalPrice,$stock,$edit);

                   $slots = $this->input->post('slots');
                   $edit1 = "No";
                   $this->Dives_model->addSlots($insert_id,$slots,$edit1);


                }
                $this->session->set_flashdata('success', "Dive Center details Added successfully.");
                redirect('vendor/manage-dives'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['slotList'] = $this->Common_model->get_result('tbl_slots',['status="Active"']);
        $this->data['productList'] = $this->Dives_model->getRentalProduct();
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 1]);
        $this->data['dives_type'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 1]);
        $this->data['dives_location'] = $this->Common_model->get_result("tbl_dives_center",['status>='=> 1]);
        $this->data['certification_list'] = $this->Common_model->get_result("tbl_certification",['status>='=> 1]);
        $views[] = 'vendor/manage-dives/add';

        $this->vendor_view($views);
    }

    public function edit_dives() {
        $user = $this->session->userdata('vendor_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {
                // echo "<pre>"; print_r($_POST);die;
                // echo $this->input->post('start_date'); 
                // echo $this->input->post('end_date'); die;
                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/dive_main_image';
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
                            "vendor_id" => $user['id'],
                            "location_id" => $this->input->post('location_id'),
                            "price_per_person" => $this->input->post('price_per_person'),
                            "description" => $this->input->post('description'),
                            "dives_name" => $this->input->post('dives_name'),
                            'dives_slug' => slugify(trim($this->input->post('dives_name')).' '.trim($this->input->post('price_per_person'))),
                            "group_size" => $this->input->post('group_size'),
                            "certification"=> $this->input->post('certification'),
                            "start_date" => date('Y-m-d h:i:s',strtotime($this->input->post('start_date'))),
                            "end_date" => date('Y-m-d h:i:s',strtotime($this->input->post('end_date'))),
                            'dives_thumbnail_image' => $picture,
                            "status" => $this->input->post('status'),
                            "youtube_link"=> $this->input->post('youtube_link'),
                            "activity_type"=> $this->input->post('activity_type'),
                        ];
                    }

                }else{
                    $data = [
                            "vendor_id" => $user['id'],
                            "location_id" => $this->input->post('location_id'),
                            "price_per_person" => $this->input->post('price_per_person'),
                            "start_date" => date('Y-m-d h:i:s',strtotime($this->input->post('start_date'))),
                            "end_date" => date('Y-m-d h:i:s',strtotime($this->input->post('end_date'))),
                            "description" => $this->input->post('description'),
                            "dives_name" => $this->input->post('dives_name'),
                            'dives_slug' => slugify(trim($this->input->post('dives_name')).' '.trim($this->input->post('price_per_person'))),
                            "group_size" => $this->input->post('group_size'),
                            "certification"=> $this->input->post('certification'),
                            "status" => $this->input->post('status'),
                            "youtube_link"=> $this->input->post('youtube_link'),
                            "activity_type"=> $this->input->post('activity_type'),
                        ];
                }
                
                
                 $id =$this->input->post('id'); 
                // echo "<pre>"; print_r($data);die;
                $this->PermissionModel->Update($id,$data,'tbl_vendor_dives_location');
            
                $vendor_id =$user['id'];
                $status = 1;
                if (!empty($_FILES['slider']['name'][0])) {
                    $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dive_main_image');
                   // var_dump($response);die;
                    if(count($response) > 0){
                        $ids = $this->uri->segment(3);
                        $query ="insert into tbl_vendor_dives_center_images (vendor_id,location_id,image,status) values";
                        foreach ($response as $key => $value) {
                            $query .="('$vendor_id','$ids','$value','$status'),";
                        }
                        $query = rtrim($query, ',');
                        $this->Common_model->customInsert($query);
                    }
                }

                $productId = $this->input->post('product_id');
                $rentalPrice = $this->input->post('rental_price');
                $stock = $this->input->post('stock');
                $edit = "Yes";


                $last_id =  $this->Dives_model->addProductDetails($id,$vendor_id,$productId,$rentalPrice,$stock,$edit);

                $this->session->set_flashdata('success', "Dive Center details Updated successfully.");
                redirect('vendor/manage-dives'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        // echo $this->uri->segment(3); die;

        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['dives_type'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 1]);
        $this->data['dives_location'] = $this->Common_model->get_result("tbl_dives_center",['status>='=> 1]);
        $this->data['rental_product'] = $this->Dives_model->get_rental_product($this->uri->segment(3));
        $this->data['productList'] = $this->Dives_model->getRentalProduct();
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 1]);
        $this->data['center'] = $this->Dives_model->getlocationById($this->uri->segment(3));
        $this->data['certification_list'] = $this->Common_model->get_result("tbl_certification",['status>='=> 1]);
        $views[] = 'vendor/manage-dives/edit';
        $this->vendor_view($views);
    }

    public function delete_dives() {

        $this->data['vendors'] = $this->Common_model->delete('tbl_vendor_dives_location',['id'=> $this->uri->segment(4)]);
        $this->session->set_flashdata('success', "Dives Center Deleted successfully.");
        redirect('vendor/manage-dives'); 
    }

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_vendor_dives_center_images',$id);
      echo 1;
    }

    public function change_status()
    {
        return $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_vendor_dives_location',);

        
    }
}
