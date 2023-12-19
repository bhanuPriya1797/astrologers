<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Core_Admin_Controller {
    
    public $table = "products";
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Subadmin_model');
        $this->load->model('admin/Login_model', 'admin');
        $this->load->model('admin/Product_model', 'product');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'products';
        $this->data['title'] = 'products';
        $this->data['products'] = $this->product->getProductList();
        $views[] = 'admin/products/index';

        $this->admin_view($views);
    }

    public function add_product() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            $this->form_validation->set_rules('product_price', 'MRP', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('weight', 'Weight', 'required');
            $this->form_validation->set_rules('sku', 'SKU', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {
                $this->load->library('upload');
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/product_image';
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

                            "product_name" => $this->input->post('product_name'),
                            'product_slug' => slugify(trim($this->input->post('product_name'))),
                            'category_id' => $this->input->post('category_id'),
                            "product_description" => $this->input->post('description'),
                            "product_price" => $this->input->post('product_price'),
                            "weight" => $this->input->post('weight'),
                            "discount" => $this->input->post('discount'),
                            "discount_type" => $this->input->post('discount_type'),
                            "product_sku" => $this->input->post('sku'),
                            "delivery" => $this->input->post('delivery'),
                            "status" => $this->input->post('status'),
                            "product_image" => $picture,
                            'created_at' => date("Y-m-d H:i:s"),                            
                        ];

                        $this->PermissionModel->insert('products',$data);
                        $this->session->set_flashdata('success', "Products details updated successfully.");
                        redirect('admin/products'); 
                    }
                }
                else
                {
                    // $category_name = implode(',', $this->input->post('category_id'));
                    $data = [

                        "product_name" => $this->input->post('product_name'),
                        'product_slug' => slugify(trim($this->input->post('product_name'))),
                        'category_id' => $this->input->post('category_id'),
                        "product_description" => $this->input->post('description'),
                        "product_price" => $this->input->post('product_price'),
                        "weight" => $this->input->post('weight'),
                        "discount" => $this->input->post('discount'),
                        "discount_type" => $this->input->post('discount_type'),
                        "product_sku" => $this->input->post('sku'),
                        "delivery" => $this->input->post('delivery'),
                        "status" => $this->input->post('status'),
                        // "product_image" => $picture,
                        // 'created_at' => date("Y-m-d H:i:s"),
                        
                    ];
                    $this->PermissionModel->insert('products',$data);
                    $this->session->set_flashdata('success', "Products details updated successfully.");
                    redirect('admin/products'); 
                }
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['get_category'] = $this->Common_model->get_result("category",['status>='=> 0]);
        $views[] = 'admin/products/add';

        $this->admin_view($views);
    }

    public function edit_product() {
        $user = $this->session->userdata('admin_login_data');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            // echo "<pre>"; print_r($_POST); die;

            
            $this->form_validation->set_rules('weight', 'Weight', 'required');
            $this->form_validation->set_rules('mrp', 'MRP', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('sku', 'SKU', 'required');
            $this->form_validation->set_rules('weight', 'Weight', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() != false) {

                $this->load->library('upload');
                if($_FILES['file']['name']){
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'assets/uploads/product_image';
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
                            "product_name" => $this->input->post('product_name'),
                            'product_slug' => slugify(trim($this->input->post('product_name'))),
                            'category_id' => $this->input->post('category_id'),
                            'product_price' => $this->input->post('mrp'),
                            "product_description" => $this->input->post('description'),
                            "product_sku" => $this->input->post('sku'),
                            "weight" => $this->input->post('weight'),
                            "discount" => $this->input->post('discount'),
                            "discount_type" => $this->input->post('discount_type'),
                            "delivery" => $this->input->post('delivery'),
                            "status" => $this->input->post('status'),
                            "product_image" => $picture,
                        ];
                        $id =$this->input->post('id');
                        
                        $this->PermissionModel->Update($id,$data,'products');
                        $this->session->set_flashdata('success', "Products details updated successfully.");
                        redirect('admin/products'); 
                    }
                }
                else
                {
                        // $category_name = implode(',', $this->input->post('category_id'));
                        $data = [
                            "product_name" => $this->input->post('product_name'),
                            'product_slug' => slugify(trim($this->input->post('product_name'))),
                            'category_id' => $this->input->post('category_id'),
                            'product_price' => $this->input->post('mrp'),
                            "product_description" => $this->input->post('description'),
                            "weight" => $this->input->post('weight'),
                            "product_sku" => $this->input->post('sku'),
                            "discount" => $this->input->post('discount'),
                            "discount_type" => $this->input->post('discount_type'),
                            "delivery" => $this->input->post('delivery'),
                            "status" => $this->input->post('status'),
                        ];
                        $id =$this->input->post('id');
                    
                    $this->PermissionModel->Update($id,$data,'products');
                    $this->session->set_flashdata('success', "Products details updated successfully.");
                    redirect('admin/products'); 
                }
            }
            else
            {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        $this->data['products'] = $this->Common_model->get_result($this->table,['id'=>$this->uri->segment(3)]);
        $this->data['get_category'] = $this->Common_model->get_result("tbl_category",['status>='=> 0]);
        $views[] = 'admin/products/edit';

        $this->admin_view($views);
    }

    public function delete_products() {

        $this->Common_model->delete($this->table,['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    public function change_status()
    {
        $this->PermissionModel->Update($this->input->post('id'),['status' => $this->input->post('status')],'products',);
        echo "success"; 

        
    }

    
}
