<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dives extends Core_Admin_Controller {
    
    public $table = "tbl_dives_center";
    
    public function __construct() {
        
        parent::__construct();

        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->model('admin/Dives_model');
        $this->load->library('Uploadfiles');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['center'] = $this->Common_model->get_result($this->table,['status>='=> 0]);
        $views[] = 'admin/manage-dives/index';

        $this->admin_view($views);
    }

    public function add_dives() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('address', 'Address', 'required');
            if ($this->form_validation->run() != false) {
                $latitude=$_REQUEST['latitude'];
                $longitude=$_REQUEST['longitude'];
                $geolocation = $latitude.','.$longitude;
                $request = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCd0U-dY13CLZW2EB_By2_dIgqCJFyPMJ8&latlng='.$geolocation.'&sensor=false'; 
                //echo "<pre>";
                    
                $file_contents = file_get_contents($request);
                $json_decode = json_decode($file_contents);
                
                if(isset($json_decode->results[0])) {
                    $response = array();
                    if($json_decode->results[0]->address_components[0]->types[0] == "political"){
                        $k = 0;
                    }else{
                        $k = 1;
                    }
                    foreach($json_decode->results[$k]->address_components as $addressComponet) {
                        if(in_array('political', $addressComponet->types)) {
                                $response[] = $addressComponet->long_name; 
                        }
                    }
                    foreach($json_decode->results[$k]->address_components as $adr_node) {
                        if($adr_node->types[0] == 'postal_code') {
                            $pin[]= $adr_node->long_name;
                        }
                    }
                    
                    $add_String = "";
                    $pincode=isset($pin[0])?$pin[0]:000000;
                    if(count($response) == 1){
                        if($_FILES['main_image']['name'])
                        {
                            $this->load->library('upload');
                            $config['encrypt_name']         = TRUE;   
                            $config['upload_path']          = 'assets/uploads/service_main_image';
                            $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                            $config['max_size']             = 500000;
                            $config['file_name']            = time();
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('main_image'))
                            {                        
                                $this->session->set_flashdata('error', "Image Not Uploaded.");
                                $data = [
                                    "country" => $response[0],
                                    "state" => "NA",
                                    "city" => "NA",
                                    'created_at' => date("Y-m-d H:i:s"),
                                    "status" => 1,
                                    "added_by" => $user['id'],
                                    "email" => $user['email'],
                                    "latitude" => $this->input->post('latitude'),
                                    "longitude" => $this->input->post('longitude'),
                                    "address" => $response[0],
                                    "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                    "category_id"=> $this->input->post('category_id'),
                                    "full_address" => $response[0],
                                    "number" => 1,
                                    'location_slug' => slugify(trim($response[0].$this->input->post('latitude'))),
                                    "location_pincode"=> $pincode,
                                    "dive" =>  $this->input->post('dive'),
                                    "level" => $this->input->post('level'),
                                    "depth" => $this->input->post('depth'),
                                    "temp" => $this->input->post('temp'),
                                    "visibility" => $this->input->post('visibility'),
                                    "currents" => $this->input->post('currents'),
                                    "certification"=> $this->input->post('certification'),
                                    "description" => $this->input->post('description'),
                                    'youtube_link' => $this->input->post('youtube_link')
                                ];
                            }
                            else
                            {
                                $path =  $this->upload->data();
                                $picture = $path['file_name'];
                                $data = [
                                    "country" => $response[0],
                                    "state" => "NA",
                                    "city" => "NA",
                                    'created_at' => date("Y-m-d H:i:s"),
                                    "status" => 1,
                                    "added_by" => $user['id'],
                                    "email" => $user['email'],
                                    "latitude" => $this->input->post('latitude'),
                                    "longitude" => $this->input->post('longitude'),
                                    "address" => $response[0],
                                    "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                    "category_id"=> $this->input->post('category_id'),
                                    "full_address" => $response[0],
                                    "number" => 1,
                                    'location_slug' => slugify(trim($response[0].$this->input->post('latitude'))),
                                    "location_pincode"=> $pincode,
                                    "dive" =>  $this->input->post('dive'),
                                    "level" => $this->input->post('level'),
                                    "depth" => $this->input->post('depth'),
                                    "temp" => $this->input->post('temp'),
                                    "visibility" => $this->input->post('visibility'),
                                    "currents" => $this->input->post('currents'),
                                    "certification"=> $this->input->post('certification'),
                                    "description" => $this->input->post('description'),
                                    'youtube_link' => $this->input->post('youtube_link'),
                                    'service_thumbnail_image' => $picture
                                ];
                            }
                        }else{
                           $data = [
                                "country" => $response[0],
                                "state" => "NA",
                                "city" => "NA",
                                'created_at' => date("Y-m-d H:i:s"),
                                "status" => 1,
                                "added_by" => $user['id'],
                                "email" => $user['email'],
                                "latitude" => $this->input->post('latitude'),
                                "longitude" => $this->input->post('longitude'),
                                "address" => $response[0],
                                "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                "category_id"=> $this->input->post('category_id'),
                                "full_address" => $response[0],
                                "number" => 1,
                                'location_slug' => slugify(trim($response[0].$this->input->post('latitude'))),
                                "location_pincode"=> $pincode,
                                "dive" =>  $this->input->post('dive'),
                                "level" => $this->input->post('level'),
                                "depth" => $this->input->post('depth'),
                                "temp" => $this->input->post('temp'),
                                "visibility" => $this->input->post('visibility'),
                                "currents" => $this->input->post('currents'),
                                "certification"=> $this->input->post('certification'),
                                "description" => $this->input->post('description'),
                                'youtube_link' => $this->input->post('youtube_link')
                            ];
                        }
                        
                        $insert_id = $this->PermissionModel->insert($this->table,$data);
                        if($insert_id){
                            $vendor_id =$user['id'];
                            $location_id =$this->input->post('location_id');
                            $status = 1;
                            if (!empty($_FILES['slider']['name'][0])) {
                                $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dives_location_image');
                                if(count($response) > 0){
                                    $query ="insert into tbl_admin_service_image (service_id,image,status) values";
                                    foreach ($response as $key => $value) {
                                        $query .="('$insert_id','$value','$status'),";
                                    }
                                    $query = rtrim($query, ',');
                                    $this->Common_model->customInsert($query);
                                }
                            }
                        }
                            $this->session->set_flashdata('success', "Dive Center details Added successfully.");
                            redirect('admin/manage-dives'); 
                    }else{
                        if(count($response) > 1){
                            for ($i=0; $i < count($response); $i++) { 
                                $add_String.=$response[$i]." ";
                            }
                            $res = [
                                'full_address' => $add_String,
                                'address' => $response[0],
                                'country' => $response[count($response)-1],
                                'state' => $response[count($response)-2],
                                'city' => $response[count($response)-3]
                            ];           
                    
                            if($_FILES['main_image']['name'])
                            {
                                $this->load->library('upload');
                                $config['encrypt_name']         = TRUE;   
                                $config['upload_path']          = 'assets/uploads/service_main_image';
                                $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                                $config['max_size']             = 500000;
                                $config['file_name']            = time();
                                $this->upload->initialize($config);
                                if (!$this->upload->do_upload('main_image'))
                                {                        
                                    $this->session->set_flashdata('error', "Image Not Uploaded.");
                                    $data = [
                                        "country" => $res['country'],
                                        "state" => $res['state'],
                                        "city" => $res['city'],
                                        'created_at' => date("Y-m-d H:i:s"),
                                        "status" => 1,
                                        "added_by" => $user['id'],
                                        "email" => $user['email'],
                                        "latitude" => $this->input->post('latitude'),
                                        "longitude" => $this->input->post('longitude'),
                                        "address" => $res['address'],
                                        "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                        "category_id"=> $this->input->post('category_id'),
                                        "full_address" => $res['full_address'],
                                        "number" => 1,
                                        'location_slug' => slugify(trim($res['full_address'])),
                                        "location_pincode"=> $pincode,
                                        "dive" =>  $this->input->post('dive'),
                                        "level" => $this->input->post('level'),
                                        "depth" => $this->input->post('depth'),
                                        "temp" => $this->input->post('temp'),
                                        "visibility" => $this->input->post('visibility'),
                                        "currents" => $this->input->post('currents'),
                                        "certification"=> $this->input->post('certification'),
                                        "description" => $this->input->post('description'),
                                        'youtube_link' => $this->input->post('youtube_link')
                                    ];
                                }
                                else
                                {
                                    $path =  $this->upload->data();
                                    $picture = $path['file_name'];
                                    $data = [
                                        "country" => $res['country'],
                                        "state" => $res['state'],
                                        "city" => $res['city'],
                                        'created_at' => date("Y-m-d H:i:s"),
                                        "status" => 1,
                                        "added_by" => $user['id'],
                                        "email" => $user['email'],
                                        "latitude" => $this->input->post('latitude'),
                                        "longitude" => $this->input->post('longitude'),
                                        "address" => $res['address'],
                                        "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                        "category_id"=> $this->input->post('category_id'),
                                        "full_address" => $res['full_address'],
                                        "number" => 1,
                                        'location_slug' => slugify(trim($res['full_address'])),
                                        "location_pincode"=> $pincode,
                                        "dive" =>  $this->input->post('dive'),
                                        "level" => $this->input->post('level'),
                                        "depth" => $this->input->post('depth'),
                                        "temp" => $this->input->post('temp'),
                                        "visibility" => $this->input->post('visibility'),
                                        "currents" => $this->input->post('currents'),
                                        "certification"=> $this->input->post('certification'),
                                        "description" => $this->input->post('description'),
                                        'youtube_link' => $this->input->post('youtube_link'),
                                        'service_thumbnail_image' => $picture
                                    ];
                                }
                            }else{
                                $data = [
                                    "country" => $res['country'],
                                    "state" => $res['state'],
                                    "city" => $res['city'],
                                    'created_at' => date("Y-m-d H:i:s"),
                                    "status" => 1,
                                    "added_by" => $user['id'],
                                    "email" => $user['email'],
                                    "latitude" => $this->input->post('latitude'),
                                    "longitude" => $this->input->post('longitude'),
                                    "address" => $res['address'],
                                    "type" => $user['role_id'] > 0 ? "sub-admin":"admin",
                                    "category_id"=> $this->input->post('category_id'),
                                    "full_address" => $res['full_address'],
                                    "number" => 1,
                                    'location_slug' => slugify(trim($res['full_address'])),
                                    "location_pincode"=> $pincode,
                                    "dive" =>  $this->input->post('dive'),
                                    "level" => $this->input->post('level'),
                                    "depth" => $this->input->post('depth'),
                                    "temp" => $this->input->post('temp'),
                                    "visibility" => $this->input->post('visibility'),
                                    "currents" => $this->input->post('currents'),
                                    "certification"=> $this->input->post('certification'),
                                    "description" => $this->input->post('description'),
                                    'youtube_link' => $this->input->post('youtube_link')
                                ];
                            }

                            $insert_id = $this->PermissionModel->insert($this->table,$data);
                            if($insert_id){
                                $status = 1;
                                if (!empty($_FILES['slider']['name'][0])) {
                                    $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dives_location_image');
                                    if(count($response) > 0){
                                        $query ="insert into tbl_admin_service_image (service_id,image,status) values";
                                        foreach ($response as $key => $value) {
                                            $query .="('$insert_id','$value','$status'),";
                                        }
                                        $query = rtrim($query, ',');
                                        $this->Common_model->customInsert($query);
                                    }
                                }
                            }
                            $this->session->set_flashdata('success', "Dive Center details Added successfully.");
                            redirect('admin/manage-dives'); 
                        }else{
                            $this->session->set_flashdata('error', "This location not found");
                        }
                    }
                    
                    
                }
                else{
                    $this->session->set_flashdata('error', "This location not valid");
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['dives_category'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 0]);
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 1]);
        $this->data['dives_type'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 1]);
        $this->data['dives_location'] = $this->Common_model->get_result("tbl_dives_center",['status>='=> 1]);
        $this->data['certification_list'] = $this->Common_model->get_result("tbl_certification",['status>='=> 1]);
        $views[] = 'admin/manage-dives/add';

        $this->admin_view($views);
    }

    public function edit_dives() {

      
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('city', 'City', 'required');
            if ($this->form_validation->run() != false) {
                $id =$this->input->post('id');
                if($_FILES['main_image']['name'])
                {
                    $this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/service_main_image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('main_image'))
                    {                        
                        $this->session->set_flashdata('error', "Image Not Uploaded.");
                        $data = [
                            "category_id"       => $this->input->post('category_id'),
                            "country"           => $this->input->post('country'),
                            "city"              => $this->input->post('city'),
                            "state"             => $this->input->post('state'),
                            "full_address"      => $this->input->post('full_address'),
                            "address"           => $this->input->post('address'),
                            "latitude"          => $this->input->post('latitude'),
                            "longitude"         => $this->input->post('longitude'),
                            "location_pincode"  => $this->input->post('location_pincode'),
                            "location_slug"  => $this->input->post('location_slug'),
                            "status"            => $this->input->post('status'),
                            "dive" =>  $this->input->post('dive'),
                            "level" => $this->input->post('level'),
                            "depth" => $this->input->post('depth'),
                            "temp" => $this->input->post('temp'),
                            "visibility" => $this->input->post('visibility'),
                            "currents" => $this->input->post('currents'),
                            "certification"=> $this->input->post('certification'),
                            "description" => $this->input->post('description'),
                            'youtube_link' => $this->input->post('youtube_link')
                        ];
                    }
                    else
                    {
                        $path =  $this->upload->data();
                        $picture = $path['file_name'];
                        $data = [
                            "category_id"       => $this->input->post('category_id'),
                            "country"           => $this->input->post('country'),
                            "city"              => $this->input->post('city'),
                            "state"             => $this->input->post('state'),
                            "full_address"      => $this->input->post('full_address'),
                            "address"           => $this->input->post('address'),
                            "latitude"          => $this->input->post('latitude'),
                            "longitude"         => $this->input->post('longitude'),
                            "location_pincode"  => $this->input->post('location_pincode'),
                            "location_slug"  => $this->input->post('location_slug'),
                            "status"            => $this->input->post('status'),
                            "dive" =>  $this->input->post('dive'),
                            "level" => $this->input->post('level'),
                            "depth" => $this->input->post('depth'),
                            "temp" => $this->input->post('temp'),
                            "visibility" => $this->input->post('visibility'),
                            "currents" => $this->input->post('currents'),
                            "certification"=> $this->input->post('certification'),
                            "description" => $this->input->post('description'),
                            'youtube_link' => $this->input->post('youtube_link'),
                            'service_thumbnail_image' => $picture
                            
                        ];
                    }
                }else{
                   $data = [
                        "category_id"       => $this->input->post('category_id'),
                        "country"           => $this->input->post('country'),
                        "city"              => $this->input->post('city'),
                        "state"             => $this->input->post('state'),
                        "full_address"      => $this->input->post('full_address'),
                        "address"           => $this->input->post('address'),
                        "latitude"          => $this->input->post('latitude'),
                        "longitude"         => $this->input->post('longitude'),
                        "location_pincode"  => $this->input->post('location_pincode'),
                        "location_slug"  => $this->input->post('location_slug'),
                        "status"            => $this->input->post('status'),
                        "dive" =>  $this->input->post('dive'),
                        "level" => $this->input->post('level'),
                        "depth" => $this->input->post('depth'),
                        "temp" => $this->input->post('temp'),
                        "visibility" => $this->input->post('visibility'),
                        "currents" => $this->input->post('currents'),
                        "certification"=> $this->input->post('certification'),
                        "description" => $this->input->post('description'),
                        'youtube_link' => $this->input->post('youtube_link')
                    ];
                }
                $this->PermissionModel->Update($id,$data,$this->table);
                if (!empty($_FILES['slider']['name'][0])) {
                    $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','dives_location_image');
                    if(count($response) > 0){
                        $ids = $this->uri->segment(3);
                        $query ="insert into tbl_admin_service_image (service_id,image,status) values";
                        foreach ($response as $key => $value) {
                            $query .="('$ids','$value',1),";
                        }
                        $query = rtrim($query, ',');
                        $this->Common_model->customInsert($query);
                    }
                }
                $this->session->set_flashdata('success', "Dives Center details updated successfully.");
                redirect('admin/manage-dives'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'manage-dives';
        $this->data['title'] = 'Dives Center';
        $this->data['user'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $this->data['dives_category'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 0]);
        $this->data['dives_type'] = $this->Common_model->get_result("tbl_dives_category",['status>='=> 1]);
        $this->data['dives_location'] = $this->Common_model->get_result("tbl_dives_center",['status>='=> 1]);
        $this->data['activity_type'] = $this->Common_model->get_result("tbl_activity_type",['status>='=> 1]);
        $this->data['certification_list'] = $this->Common_model->get_result("tbl_certification",['status>='=> 1]);
        $views[] = 'admin/manage-dives/edit';

        $this->admin_view($views);
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'tbl_dives_center');
        echo "success"; 
    }

    public function delete_dives() {
        $this->Common_model->delete('tbl_dives_center',['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_admin_service_image',$id);
      echo 1;
    }

    public function getallmarker(){
        $center = $this->Common_model->get_result("tbl_dives_center",['status>='=> 0]);
        header("Content-type: text/xml");

        // Start XML file, echo parent node
        echo "<?xml version='1.0' ?>";
        echo '<markers>';
        $ind=0;
        // Iterate through the rows, printing XML nodes for each
        foreach($center as $key => $value){
          // Add to XML document node
          echo '<marker ';
          echo 'id="' . $value->id . '" ';
          echo 'name="' . $this->parseToXML($value->city) . '" ';
          echo 'address="' . $this->parseToXML($value->address) . '" ';
          echo 'lat="' . $value->latitude . '" ';
          echo 'lng="' . $value->longitude . '" ';
          echo 'type="' . $value->city . '" ';
          echo '/>';
          $ind = $ind + 1;
        }

        // End XML file
        echo '</markers>';
        
    }



    function parseToXML($htmlStr)
    {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }

    
}
