<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_dives extends Core_Admin_Controller {
    
    public $table = "tbl_dives_center";
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Dives_model');
        $this->data['urlkey'] = $this->uri->segment(1);
        $this->load->library('Uploadfiles');
    }
    
    public function index() {

        $user = $this->session->userdata('vendor_login_data');
        
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        // echo "hi"; die;
        $this->data['center'] = $this->Dives_model->getCategoryDefaultById();
        $views[] = 'admin/all-manage-dives/index';

        $this->admin_view($views);
    }

    public function add_dives() {
        // $user = $this->session->userdata('vendor_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_FILES); die;

            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('dives_name', 'Dives Name', 'required');
            if ($this->form_validation->run() != false) {
                // echo "hi"; die;                
                if($_FILES['main_image']['name'])
                {
                    // echo "hi"; die;
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/service_image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('main_image'))
                    {     
                        // echo "not";                    
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        // echo "his"; die;
                        $data = [

                            // "vendor_id" => $this->input->post('vendor_id'),
                            // "location_id" => $this->input->post('location_id'),
                            // "price_per_person" => $this->input->post('price_per_person'),
                            // "dive" => $this->input->post('dive'),
                            // "level" => $this->input->post('level'),
                            // "depth" => $this->input->post('depth'),
                            // "temp" => $this->input->post('temp'),
                            // "visibility" => $this->input->post('visibility'),
                            // "currents" => $this->input->post('currents'),
                            // "description" => $this->input->post('description'),
                            "service_name" => $this->input->post('dives_name'),
                            'service_slug' => slugify(trim($this->input->post('dives_name'))),
                            //  "featured" => $this->input->post('featured')?1:0,
                            // "special" => $this->input->post('special')?1:0,
                            // "best_seller" => $this->input->post('best_seller')?1:0,
                            // "new_in" => $this->input->post('new_in')?1:0,
                            // "group_size" => $this->input->post('group_size'),
                            'created_at' => date("Y-m-d H:i:s"),
                            'service_image' => $picture,
                            "status" => $this->input->post('status'),
                            // "youtube_link"=> $this->input->post('youtube_link'),
                            // "activity_type"=> $this->input->post('activity_type'),
                            // "certification"=> $this->input->post('certification'),

                        ];
                    }

                }else{
                    $data = [
                            //"vendor_id" => $this->input->post('vendor_id'),
                            // "location_id" => $this->input->post('location_id'),
                            // "price_per_person" => $this->input->post('price_per_person'),
                            // "dive" => $this->input->post('dive'),
                            // "level" => $this->input->post('level'),
                            // "depth" => $this->input->post('depth'),
                            // "temp" => $this->input->post('temp'),
                            // "visibility" => $this->input->post('visibility'),
                            // "currents" => $this->input->post('currents'),
                            // "description" => $this->input->post('description'),
                            "service_name" => $this->input->post('dives_name'),
                            'service_slug' => slugify(trim($this->input->post('dives_name'))),
                            //  "featured" => $this->input->post('featured')?1:0,
                            // "special" => $this->input->post('special')?1:0,
                            // "best_seller" => $this->input->post('best_seller')?1:0,
                            // "new_in" => $this->input->post('new_in')?1:0,
                            // "group_size" => $this->input->post('group_size'),
                            'created_at' => date("Y-m-d H:i:s"),
                            "status" => $this->input->post('status'),
                            // "youtube_link"=> $this->input->post('youtube_link'),
                            // "activity_type"=> $this->input->post('activity_type'),
                            // "certification"=> $this->input->post('certification'),
                        ];
                }       
                // echo "<pre>"; print_r($data); die;

                $insert_id = $this->PermissionModel->insert("tbl_services",$data);
                // echo $insert_id; die;
                if($insert_id){
                    // $vendor_id =$user['id'];
                    // $location_id =$this->input->post('location_id');
                    // $status = 1;
                    // if (!empty($_FILES['slider']['name'][0])) {
                    //     $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dives_location_image');
                    //     if(count($response) > 0){
                    //         $query ="insert into tbl_vendor_dives_center_images (vendor_id,location_id,image,status) values";
                    //         foreach ($response as $key => $value) {
                    //             $query .="('$vendor_id','$insert_id','$value','$status'),";
                    //         }
                    //         $query = rtrim($query, ',');
                    //         $this->Common_model->customInsert($query);
                    //     }
                    // }



                        // $productId = $this->input->post('product_id');
                        // $rentalPrice = $this->input->post('rental_price');
                        // $stock = $this->input->post('stock');
                        // $edit = "No";


                //    $last_id =  $this->Dives_model->addProductDetails($insert_id,$vendor_id,$productId,$rentalPrice,$stock,$edit);


                }
                $this->session->set_flashdata('success', "Service details Added successfully.");
                redirect('admin/services'); 
                
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
        $views[] = 'admin/all-manage-dives/add';

        $this->admin_view($views);
    }

    public function edit_dives() {
        $user = $this->session->userdata('vendor_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {
                
                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/service_image';
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
                            // "vendor_id" => $this->input->post('vendor_id'),
                            // "location_id" => $this->input->post('location_id'),
                            // "price_per_person" => $this->input->post('price_per_person'),
                            // "dive" => $this->input->post('dive'),
                            // "level" => $this->input->post('level'),
                            // "depth" => $this->input->post('depth'),
                            // "temp" => $this->input->post('temp'),
                            // "visibility" => $this->input->post('visibility'),
                            // "currents" => $this->input->post('currents'),
                            // "description" => $this->input->post('description'),
                            "service_name" => $this->input->post('dives_name'),
                            'service_slug' => slugify(trim($this->input->post('dives_name'))),
                            // "group_size" => $this->input->post('group_size'),
                            // "featured" => $this->input->post('featured')?1:0,
                            // "special" => $this->input->post('special')?1:0,
                            // "best_seller" => $this->input->post('best_seller')?1:0,
                            // "new_in" => $this->input->post('new_in')?1:0,
                            'service_image' => $picture,
                            "status" => $this->input->post('status'),
                            // "youtube_link"=> $this->input->post('youtube_link'),
                            // "activity_type"=> $this->input->post('activity_type'),
                            // "certification"=> $this->input->post('certification'),
                        ];
                    }

                }else{
                    $data = [
                            // "vendor_id" => $this->input->post('vendor_id'),
                            // "location_id" => $this->input->post('location_id'),
                            // "price_per_person" => $this->input->post('price_per_person'),
                            // "dive" => $this->input->post('dive'),
                            // "level" => $this->input->post('level'),
                            // "depth" => $this->input->post('depth'),
                            // "temp" => $this->input->post('temp'),
                            // "visibility" => $this->input->post('visibility'),
                            // "currents" => $this->input->post('currents'),
                            // "description" => $this->input->post('description'),
                            "service_name" => $this->input->post('dives_name'),
                            'service_slug' => slugify(trim($this->input->post('dives_name'))),
                            // "group_size" => $this->input->post('group_size'),
                            // "featured" => $this->input->post('featured')?1:0,
                            // "special" => $this->input->post('special')?1:0,
                            // "best_seller" => $this->input->post('best_seller')?1:0,
                            // "new_in" => $this->input->post('new_in')?1:0,
                            "status" => $this->input->post('status'),
                            // "youtube_link"=> $this->input->post('youtube_link'),
                            // "activity_type"=> $this->input->post('activity_type'),
                            // "certification"=> $this->input->post('certification'),
                        ];
                }
                
                //print_r($data);die;
                $id =$this->input->post('id');

                $this->PermissionModel->Update($id,$data,'tbl_services');
                // $vendor_id =$this->input->post('vendor_id');
                // $status = 1;
                // if (!empty($_FILES['slider']['name'][0])) {
                //     $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dive_main_image');
                //    // var_dump($response);die;
                //     if(count($response) > 0){
                //         $ids = $this->uri->segment(3);
                //         $query ="insert into tbl_vendor_dives_center_images (vendor_id,location_id,image,status) values";
                //         foreach ($response as $key => $value) {
                //             $query .="('$vendor_id','$ids','$value','$status'),";
                //         }
                //         $query = rtrim($query, ',');
                //         $this->Common_model->customInsert($query);
                //     }
                // }

                // $productId = $this->input->post('product_id');
                // $rentalPrice = $this->input->post('rental_price');
                // $stock = $this->input->post('stock');
                // $edit = "Yes";


                // $last_id =  $this->Dives_model->addProductDetails($id,$vendor_id,$productId,$rentalPrice,$stock,$edit);

                $this->session->set_flashdata('success', "Service details Updated successfully.");
                redirect('admin/services'); 
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
        $views[] = 'admin/all-manage-dives/edit';
        $this->admin_view($views);
    }

    public function delete_dives() {

        $this->data['vendors'] = $this->Common_model->delete('tbl_services',['id'=> $this->input->post('id')]);
        echo "success";
    }

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_vendor_dives_center_images',$id);
      echo 1;
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_services');
        echo "success";

        
    }
}
