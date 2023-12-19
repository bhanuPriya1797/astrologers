<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_ads extends Core_Admin_Controller {
    
    public $table = "tbl_dives_center";
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Google_ads_model','google_ads');
        $this->data['urlkey'] = $this->uri->segment(1);
        $this->load->library('Uploadfiles');
    }
    
    public function index() {

        $user = $this->session->userdata('vendor_login_data');
    
        
        $this->data['active'] = 'google-ads';
        $this->data['title'] = 'Google Ads';

        $this->data['google_ads'] = $this->google_ads->getGoogleAds();
        $views[] = 'admin/google-ads/index';

        $this->admin_view($views);
    }

    public function add_ads(){
       
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('google_ads_link', 'Google Ads Link', 'required');
            if($this->form_validation->run() != false) {

                $data = array(
                    'google_ads' => $this->input->post('google_ads'),
                    'google_ads_link' => $this->input->post('google_ads_link'),
                    'status' => $this->input->post('status'),
                );

                $id = $this->google_ads->addGoogleAds($data);

                if($id > 0){

                    $this->session->set_flashdata('message', "Google Ads add successfully.");
                    redirect('admin/google-ads');

                }else{

                    $this->session->set_flashdata('error', validation_errors());
                    redirect('admin/google-ads/add');
                }


            }else{

                $this->session->set_flashdata('error', validation_errors());

            }

        }

        $this->data['active'] = 'google-ads';
        $this->data['title'] = 'Google Ads';

        $views[] = 'admin/google-ads/add';

        $this->admin_view($views);

    }

    public function edit_ads(){

       

            $id = $this->uri->segment(3);

            $this->data['active'] = 'google-ads';
            $this->data['title'] = 'Google Ads';
            $this->data['google_ads_data'] = $this->google_ads->getGoogleAdsDataById($id);
            $this->data['google_ads_id'] = $id;
            
            $views[] = 'admin/google-ads/edit';

            $this->admin_view($views);
        

    }

    public function update_ads(){

        if($this->input->post('google_ads_id') !=''){

            $data = array(
                'google_ads_link' => $this->input->post('google_ads_link'),
                'status' => $this->input->post('status'),
                'google_ads' => $this->input->post('google_ads'),
            );
            $id = $this->input->post('google_ads_id');

            $this->google_ads->editGoogleAds($data,$id);
            redirect('admin/google-ads');

        }else{

            $id = $this->uri->segment(3);

            $this->data['active'] = 'google-ads';
            $this->data['title'] = 'Google Ads';
            $this->data['google_ads_data'] = $this->google_ads->getGoogleAdsDataById($id);
            $this->data['google_ads_id'] = $id;
            
            $views[] = 'admin/google-ads/edit';

            $this->admin_view($views);
        }

    }

    public function deleteGoogleAds(){

        $this->Common_model->delete('google_ads',['id'=> $this->input->post('id')]);
        echo "success";

    }

    public function change_status()
    {

        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'google_ads');
        echo "success";
        
    }

  
}
