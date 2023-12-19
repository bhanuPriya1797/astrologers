<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends Core_Admin_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Cms_model', 'cms');
	}

	public function index(){
		$this->data['active'][] = 'pages';
		$this->data['cms'] = $this->cms->getpages();
		$this->data['title'] = 'Pages';
		$views[] = 'admin/cms/index';
		$this->admin_view($views);
	}

	public function edit_inner_pages(){
		$post = $this->input->post();
		if($post){
			$this->load->library('upload');
            if($_FILES['file']['name']){
                $config['encrypt_name']         = TRUE;   
                $config['upload_path']          = 'assets/admin/cms/';
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
                    $category_name = implode(',', $this->input->post('category_id'));
                    $path =  $this->upload->data();
                    $picture = $path['file_name'];
                    $data = [
                        "page" => $this->input->post('page'),
                        'page_slug' => slugify(trim($this->input->post('page')).' '.trim($this->input->post('page_id'))),
                        'PageTitle' => $this->input->post('pagetitle'),
                        'meta_title' => $this->input->post('meta_title'),
                        "meta_description" => $this->input->post('meta_description'),
                        "meta_keywords" => $this->input->post('meta_keywords'),
                        "status" => $this->input->post('status'),
                        "page_description" => $this->input->post('page_description'),
                        "header_image" => $picture,
                    ];

                    $this->cms->Update($post['page_id'],$data,'tbl_cms');
                    $this->session->set_flashdata('success', "Page details updated successfully.");
                    redirect('admin/cms');
                }
            }
            else
            {
                $data = [
                    "page" => $this->input->post('page'),
                    'page_slug' => slugify(trim($this->input->post('page')).' '.trim($this->input->post('page_id'))),
                    'PageTitle' => $this->input->post('pagetitle'),
                    'meta_title' => $this->input->post('meta_title'),
                    "meta_description" => $this->input->post('meta_description'),
                    "meta_keywords" => $this->input->post('meta_keywords'),
                    "status" => $this->input->post('status'),
                    "page_description" => $this->input->post('page_description'),
                ];
                $this->cms->Update($post['page_id'],$data,'tbl_cms');
                $this->session->set_flashdata('success', "Page details updated successfully.");
                redirect('admin/cms'); 
            }
		} 
		else {
			$this->data['active'][] = 'pages';
			$this->data['title'] = 'Edit Page';
			$this->data['page'] = $this->cms->get_page_by_id($this->uri->segment(3));
			
			
			$views[] = 'admin/cms/edit';
			$this->admin_view($views);
		}
	}


    public function edit_about_us(){
        $post = $this->input->post();
        if($post){
            redirect('admin/cms'); 
        }
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->cms->get_page_by_id($this->uri->segment(3));
            
            
            $views[] = 'admin/cms/edit';
            $this->admin_view($views);
        }
    }

    public function edit_banner(){
        $post = $this->input->post();
        if($post){
            $this->load->library('upload');
            if($_FILES['file']['name']){
                $config['encrypt_name']         = TRUE;   
                $config['upload_path']          = 'assets/admin/cms/banner/';
                $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                $config['max_size']             = 500000;
                $config['file_name']            = time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file'))
                {                        
                    $this->session->set_flashdata('error', "Banner Image Not Uploaded.");
                }
                else
                {
                    $path =  $this->upload->data();
                    $picture = $path['file_name'];
                    $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        'subheading_2' => $this->input->post('subheading_2'),
                        "status" => $this->input->post('status'),
                        "banner_image" => $picture,
                    ];

                    $this->Common_model->update($data,['id'=>1],'tbl_home_banner');
                    $this->session->set_flashdata('success', "Banner updated successfully.");
                    redirect('admin/cms');
                }
            }
            else
            {
                $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        'subheading_2' => $this->input->post('subheading_2'),
                        "status" => $this->input->post('status'),
                ];
                $this->Common_model->update($data,['id'=>1],'tbl_home_banner');
                $this->session->set_flashdata('success', "Banner updated successfully.");
                redirect('admin/cms'); 
            }
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_home_banner",['status'=> 1]);
            
            
            $views[] = 'admin/cms/home/edit_banner';
            $this->admin_view($views);
        }
    }

    public function edit_dive_training(){
        $post = $this->input->post();
        if($post){

            if (isset($_FILES['file']) && $_FILES['file']['name'] != ''){
                $file1 = $this->duo_upload('file');
            }
            if (isset($_FILES['file1']) && $_FILES['file1']['name'] != ''){
                $file2 = $this->duo_upload('file1');
            }
            
            $data = [
                "section_1_title" => $this->input->post('section_1_title'),
                'section_1_description' => $this->input->post('section_1_description'),
                "section_2_title" => $this->input->post('section_2_title'),
                "section_2_description" => $this->input->post('section_2_description')
            ];

            if($_FILES['file']['name'] != ''){
                $data['section_1_image'] = $file1;
            }
            if($_FILES['file1']['name'] != ''){
                $data['section_2_image'] = $file2;
            }
                
            $this->Common_model->update($data,['cms_id'=>8],'tbl_home_banner');
            $this->session->set_flashdata('success', "Section 1 updated successfully.");
            redirect('admin/cms/1');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_home_banner",['status'=> 1]);
            
            
            $views[] = 'admin/cms/home/section-1';
            $this->admin_view($views);
        }
    }


    public function section_1(){
        $post = $this->input->post();
        if($post){
            $data = [
                "section1_title" => $this->input->post('section1_title'),
                "section1_description" => $this->input->post('section1_description'),
                "testimonial_title" => $this->input->post('testimonial_title')
            ];

            $this->Common_model->update($data,['cms_id'=>8],'tbl_about_us');
            $this->session->set_flashdata('success', "Section 1 updated successfully.");
            redirect('admin/cms/8');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_about_us",['status'=> 1]);
            
            
            $views[] = 'admin/cms/about/section-1';
            $this->admin_view($views);
        }
    }
    public function section_2(){
        $post = $this->input->post();
        if($post){

            if (isset($_FILES['file']) && $_FILES['file']['name'] != ''){
                $file1 = $this->duo_upload('file');
            }
            if (isset($_FILES['file1']) && $_FILES['file1']['name'] != ''){
                $file2 = $this->duo_upload('file1');
            }
            
            $data = [
                "section2_heading" => $this->input->post('section2_heading'),
                'section2_subheading' => $this->input->post('section2_subheading'),
                "section2_description" => $this->input->post('section2_description')
            ];

            if($_FILES['file']['name'] != ''){
                $data['section2_image1'] = $file1;
            }
            if($_FILES['file1']['name'] != ''){
                $data['section2_image2'] = $file2;
            }
                
            $this->Common_model->update($data,['cms_id'=>8],'tbl_about_us');
            $this->session->set_flashdata('success', "Section2 updated successfully.");
            redirect('admin/cms/8');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_about_us",['status'=> 1]);
            
            
            $views[] = 'admin/cms/about/section-2';
            $this->admin_view($views);
        }
    }
    public function section_3(){
        $post = $this->input->post();
        if($post){


            if (isset($_FILES['file']) && $_FILES['file']['name'] != ''){
                $file1 = $this->duo_upload('file');
            }
            
            $data = [
                "section3_heading1" => $this->input->post('section3_heading1'),
                'section3_description1' => $this->input->post('section3_description1'),
                "section3_heading2" => $this->input->post('section3_heading2'),
                "section3_description2" => $this->input->post('section3_description2')
            ];

            if($_FILES['file']['name'] != ''){
                $data['section3_image1'] = $file1;
            }
            $this->Common_model->update($data,['cms_id'=>8],'tbl_about_us');
            $this->session->set_flashdata('success', "Section3 updated successfully.");
            redirect('admin/cms/8');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_about_us",['status'=> 1]);
            
            
            $views[] = 'admin/cms/about/section-3';
            $this->admin_view($views);
        }
    }
    public function section_4(){
        $post = $this->input->post();
        if($post){


            $data = [
                "section4_heading" => $this->input->post('section4_heading'),
                'section4_subheading' => $this->input->post('section4_subheading'),
                "section4_description" => $this->input->post('section4_description'),
                "section4_youtubelink" => $this->input->post('section4_youtubelink')
            ];

            $this->Common_model->update($data,['cms_id'=>8],'tbl_about_us');
            $this->session->set_flashdata('success', "Section4 updated successfully.");
            redirect('admin/cms/8');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_about_us",['status'=> 1]);
            
            
            $views[] = 'admin/cms/about/section-4';
            $this->admin_view($views);
        }
    }
    public function section_5(){
        $post = $this->input->post();
        if($post){

            if (isset($_FILES['file']) && $_FILES['file']['name'] != ''){
                $file = $this->duo_upload('file');
            }
            if (isset($_FILES['file1']) && $_FILES['file1']['name'] != ''){
                $file1 = $this->duo_upload('file1');
            }

            if (isset($_FILES['file2']) && $_FILES['file2']['name'] != ''){
                $file2 = $this->duo_upload('file2');
            }
            
            $data = [
                "section5_title" => $this->input->post('section5_title'),
                'section5_subtitle' => $this->input->post('section5_subtitle'),
                "section5_heading1" => $this->input->post('section5_heading1'),
                "section5_subheading1" => $this->input->post('section5_subheading1'),
                'section5_heading2' => $this->input->post('section5_heading2'),
                "section5_subheading2" => $this->input->post('section5_subheading2'),
                'section5_heading3' => $this->input->post('section5_heading3'),
                "section5_subheading3" => $this->input->post('section5_subheading3')
            ];

            if($_FILES['file']['name'] != ''){
                $data['section5_image'] = $file;
            }
            if($_FILES['file1']['name'] != ''){
                $data['section5_image1'] = $file1;
            }
            if($_FILES['file2']['name'] != ''){
                $data['section5_image2'] = $file2;
            }
                
            $this->Common_model->update($data,['cms_id'=>8],'tbl_about_us');
            $this->session->set_flashdata('success', "Section5 updated successfully.");
            redirect('admin/cms/8');
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['page'] = $this->Common_model->get_result("tbl_about_us",['status'=> 1]);
            
            
            $views[] = 'admin/cms/about/section-5';
            $this->admin_view($views);
        }
    }


    public function offer_list(){
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['offer'] = $this->Common_model->get_result("tbl_home_offer",['status>='=> 0]);
            $views[] = 'admin/cms/offer/index';
            $this->admin_view($views);
    }

    public function add_offer(){
            $post = $this->input->post();
        if($post){
            $this->load->library('upload');
            if($_FILES['file']['name']){
                $config['encrypt_name']         = TRUE;   
                $config['upload_path']          = 'assets/admin/cms/offer/';
                $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                $config['max_size']             = 500000;
                $config['file_name']            = time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file'))
                {                        
                    $this->session->set_flashdata('error', "Offer Image Not Uploaded.");
                }
                else
                {
                    $path =  $this->upload->data();
                    $picture = $path['file_name'];
                    $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        "status" => $this->input->post('status'),
                        "offer_image" => $picture,
                    ];

                    $this->Common_model->insert('tbl_home_offer',$data);
                    $this->session->set_flashdata('success', "Offer updated successfully.");
                    redirect('admin/cms/offer_list/1');
                }
            }
            else
            {
                $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        "status" => $this->input->post('status'),
                ];
                $this->Common_model->insert('tbl_home_offer',$data);
                $this->session->set_flashdata('success', "Offer updated successfully.");
                redirect('admin/cms/offer_list/1'); 
            }
        } 
        else {
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Add Page';
            $views[] = 'admin/cms/offer/add';
            $this->admin_view($views);
        }
    }


    public function edit_offer(){
        $post = $this->input->post();
        if($post){
            $this->load->library('upload');
            if($_FILES['file']['name']){
                $config['encrypt_name']         = TRUE;   
                $config['upload_path']          = 'assets/admin/cms/banner/';
                $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
                $config['max_size']             = 500000;
                $config['file_name']            = time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file'))
                {                        
                    $this->session->set_flashdata('error', "Offer Image Not Uploaded.");
                }
                else
                {
                    $path =  $this->upload->data();
                    $picture = $path['file_name'];
                    $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        "status" => $this->input->post('status'),
                        "offer_image" => $picture,
                    ];

                    $this->Common_model->update($data,['id'=>$post['offer_id']],'tbl_home_offer');
                    $this->session->set_flashdata('success', "Offer updated successfully.");
                    redirect('admin/cms/offer_list/1');
                }
            }
            else
            {
                $data = [
                        "title" => $this->input->post('title'),
                        'subheading' => $this->input->post('subheading'),
                        "status" => $this->input->post('status'),
                ];
                $this->Common_model->update($data,['id'=>$post['offer_id']],'tbl_home_offer');
                $this->session->set_flashdata('success', "Offer updated successfully.");
                redirect('admin/cms/offer_list/1'); 
            }
        } 
        else {
            $this->data['active'][] = 'offer';
            $this->data['title'] = 'Edit Offer';
            $this->data['offer'] = $this->Common_model->get_result("tbl_home_offer",['status'=> 1,'id'=> $this->uri->segment(5)]);
            
            
            $views[] = 'admin/cms/offer/edit';
            $this->admin_view($views);
        }
    }

    public function help_topic(){
            $this->data['active'][] = 'pages';
            $this->data['title'] = 'Edit Page';
            $this->data['help_topic'] = $this->Common_model->get_result("tbl_help_topic",['status>='=> 0]);
            $views[] = 'admin/cms/help/index';
            $this->admin_view($views);
    }

    public function add_help_topic(){
        $post = $this->input->post();
        if($post){
            $data = [
                "topic" => $this->input->post('topic'),
                'answer' => $this->input->post('answer'),
                "add_date" => date("Y-m-d"),
                "status" => $this->input->post('status'),
            ];
            $this->Common_model->insert('tbl_help_topic',$data);
            $this->session->set_flashdata('success', "Topic added successfully.");
            redirect('admin/cms/help_topic/4');
        } 
        else {
            $this->data['active'][] = 'Help Topic';
            $this->data['title'] = 'Help Topic';
            $views[] = 'admin/cms/help/add';
            $this->admin_view($views);
        }
    }


    public function edit_help_topic(){
        $post = $this->input->post();
        if($post){
            $data = [
                "topic" => $this->input->post('topic'),
                'answer' => $this->input->post('answer'),
                "add_date" => date("Y-m-d"),
                "status" => $this->input->post('status'),
            ];
                $this->Common_model->update($data,['id'=>$post['id']],'tbl_help_topic');
                $this->session->set_flashdata('success', "Topic updated successfully.");
                redirect('admin/cms/help_topic/4'); 
        } 
        else {
            $this->data['active'][] = 'Help Topic';
            $this->data['title'] = 'Help Topic';
            $this->data['help_topic'] = $this->Common_model->get_result("tbl_help_topic",['status>='=> 0,'id'=> $this->uri->segment(5)]);
            $views[] = 'admin/cms/help/edit';
            $this->admin_view($views);
        }
    }


    public function delete_help_topic(){

        $this->Common_model->delete('tbl_help_topic',['id'=> $this->uri->segment('5')]);
        redirect('admin/cms/help_topic/4'); 

    }


    function duo_upload($filename){
        $config['upload_path']          = './uploads/about/';
        $config['encrypt_name']         = TRUE;   
        $config['allowed_types']        = 'jpg|png|GIF|gif|jpeg';
        $config['max_size']             = 500000;
        $config['file_name']            = time();

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($filename)) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        } else {
            $path =  $this->upload->data();
            $picture = $path['file_name'];
            return $picture;
        }
    }
    
}