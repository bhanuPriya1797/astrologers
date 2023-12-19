<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends Core_Admin_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Blog_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->library('Uploadfiles');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['blogPostList'] = $this->Blog_model->getBlogPostList();
        $views[] = 'admin/blog/index';

        $this->admin_view($views);
    }

    public function add_blog(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $config['upload_path'] = './uploads/blog/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){  
				
				$uploadData = $this->upload->data();  
				$filename = $uploadData['file_name'];  

			}else{

				$this->session->set_flashdata('errors', $this->upload->display_errors());
				redirect(base_url('manage-blog'));
			
			}

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('posting_date', 'Posting Date', 'required');
            $this->form_validation->set_rules('posted_by', 'Posted By', 'required');
            $this->form_validation->set_rules('posting', 'Posting', 'required');
            if ($this->form_validation->run() != false) {
                $id =$this->input->post('id');
                $data = [
                    "title" => $this->input->post('title'),
                    "category_id" => $this->input->post('category'),
                    "posting_date" => $this->input->post('posting_date'),
                    "posted_by" => $this->input->post('posted_by'),
                    "posting" => $this->input->post('posting'),
                    "posting_1" => $this->input->post('posting_1'),
                    "status" => $this->input->post('status'),
                    "blog_image" =>  $filename
                ];

                // echo "<pre>"; print_r($data); die;

                $insert_id = $this->PermissionModel->insert('blog_posting',$data);
                if($insert_id){
                    $status = 1;
                    if (!empty($_FILES['slider']['name'][0])) {
                        $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','blog_inside_image');
                        if(count($response) > 0){
                            $query ="insert into tbl_blog_inside_image (blog_id,image,status) values";
                            foreach ($response as $key => $value) {
                                $query .="('$insert_id','$value','1'),";
                            }
                            $query = rtrim($query, ',');
                            $this->Common_model->customInsert($query);
                        }
                    }
                }
                $this->session->set_flashdata('success', "Blog Post Added successfully.");
                redirect('admin/manage-blog'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['categoryList'] = $this->Blog_model->getCategoryList();
        $views[] = 'admin/blog/add';

        $this->admin_view($views);


    }

    public function edit_blog(){

        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $where = array();
            $config['upload_path'] = './uploads/blog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!empty($_FILES)){
                
                if($this->upload->do_upload('file')){  
                    $uploadData = $this->upload->data();  
                    $filename = $uploadData['file_name'];  
                }else{
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect(base_url('admin/manage-blog'));
                }

            }
            
            $postingDate = date("Y-m-d", strtotime($this->input->post('posting_date')));
             
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('category', 'category', 'required');
            $this->form_validation->set_rules('posting_date', 'posting_date', 'required');
            $this->form_validation->set_rules('posted_by', 'posted_by', 'required');
            $this->form_validation->set_rules('posting', 'posting', 'required');
            $this->form_validation->set_rules('status', 'Statis', 'required');
            if ($this->form_validation->run() != false) {
                $id =$this->input->post('id');
                $data = array(
                    'blog_image' => $filename,
                    'title' => $this->input->post('title'),
                    'category_id' => $this->input->post('category'),
                    'posting_date' => $postingDate,
                    'posted_by' => $this->input->post('posted_by'),
                    'posting' => $this->input->post('posting'),
                    'posting_1' => $this->input->post('posting_1'),
                    'status' => $this->input->post('status'),
                );
                // echo "<pre>"; print_r($data); die;
                $this->PermissionModel->Update($id,$data,'blog_posting');
                $this->session->set_flashdata('success', "Posting details updated successfully.");
                if (!empty($_FILES['slider']['name'][0])) {
                        $query1 = "delete from tbl_blog_inside_image where blog_id ='".$id."'";
                        $this->Common_model->customInsert($query1);
                        $response = $this->uploadfiles->do_uploadImage($_FILES['slider'], 'slider','blog_inside_image');
                        if(count($response) > 0){
                            $query ="insert into tbl_blog_inside_image(blog_id,image,status) values";
                            foreach ($response as $key => $value) {
                                $query .="('$id','$value','1'),";
                            }
                            $query = rtrim($query, ',');
                            $this->Common_model->customInsert($query);
                        }
                    }
                redirect('admin/manage-blog'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }

        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['categoryList'] = $this->Blog_model->getCategoryList();
        $this->data['blogPostDetails'] = $this->Blog_model->getBlogPostListById($this->uri->segment(3));
    
        $views[] = 'admin/blog/edit';

        $this->admin_view($views);
    }

    public function delete(){

        $this->Common_model->delete('blog_posting',['id'=> $this->input->post('id')]);
        echo "success"; 

    }

    
}
