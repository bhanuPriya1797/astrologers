<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends Core_Vendor_Controller{

    public function __construct(){

		parent::__construct();

		$this->load->model('vendor/Login_model', 'vendor');
        $this->load->model('vendor/Dives_model');
		$this->load->library('form_validation');
        $this->load->model('admin/PermissionModel');
        $this->load->library('Uploadfiles');
    }


	public function profile(){

		$user = $this->session->userdata('vendor_login_data');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$id =$this->input->post('id');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            if ($this->form_validation->run() != false) {
            	
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/admin/image';
                    $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('file'))
                    {               
                        //echo $this->upload->display_errors();die;        
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
                            "youtube_link" => implode(",", $this->input->post('youtube_link')),
                            "description_video_link" => $this->input->post('description_video_link'),
                            "profile_pic" => $picture
                        ];
                        
                        $this->PermissionModel->Update($id,$data,'tbl_vendors');
                        if (!empty($_FILES['slider']['name'][0])) {
                            $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','image');
                            if(count($response) > 0){
                                $query ="insert into tbl_vendor_description_images (vendor_id,image,status) values";
                                foreach ($response as $key => $value) {
                                    $query .="('$id','$value',1),";
                                }
                                $query = rtrim($query, ',');
                                $this->Common_model->customInsert($query);
                            }
                        }
                        $this->session->set_flashdata('success', "Vendor Profile details updated successfully.");
                        redirect('vendor/profile'); 
                    }
                }
                else
                {
                    $data = [
                        "first_name" => $this->input->post('first_name'),
                        "last_name" => $this->input->post('last_name'),
                        "email" => $this->input->post('email'),
                        "youtube_link" => implode(",", $this->input->post('youtube_link')),
                        "mobile" => $this->input->post('mobile'),
                        "description_video_link" => $this->input->post('description_video_link'),
                    ];
                    if (!empty($_FILES['slider']['name'][0])) {
                        $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','image');
                        if(count($response) > 0){
                            $query ="insert into tbl_vendor_description_images (vendor_id,image,status) values";
                            foreach ($response as $key => $value) {
                                $query .="('$id','$value',1),";
                            }
                            $query = rtrim($query, ',');
                            $this->Common_model->customInsert($query);
                        }
                    }
                    $this->PermissionModel->Update($id,$data,'tbl_vendors');
                    $this->session->set_flashdata('success', "Vendor Profile details updated successfully.");
                    redirect('vendor/profile'); 
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

		$this->data['active'] = 'dashboard';

		$this->data['title'] = 'Dashboard';

		$this->data['user'] = $this->vendor->get_vendor_member_data($user['id']);

		$views[] = 'vendor/profile';

		$this->vendor_view($views);		

	}

    public function deleteImage($id){

      $this->Dives_model->deleteRecord('tbl_vendor_description_images',$id);
      echo 1;
    }

}