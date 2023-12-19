<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_details extends Core_Vendor_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('vendor/Bank_model','bank');
		$this->load->model('admin/PermissionModel');

	}

	public function index(){

		$vendor = $this->session->userdata('vendor_login_data');

		$this->data['active'] = 'bank-info';
		$this->data['title'] = 'Bank Details';
		$this->data['bankDetails'] = $this->bank->getBankInfo($vendor['id']);
		// $this->data['bankDetailsNum'] = $this->bank->getBankInfo($vendor['id']);
		$views[] = 'vendor/manage-bank-info/add';
		$this->vendor_view($views);
	}

	public function add_bank_info(){

		$vendor = $this->session->userdata('vendor_login_data');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			// echo "<pre>"; print_r($_POST); die;

			$this->form_validation->set_rules('beneficiary_name', 'Beneficiary Name', 'required');
            $this->form_validation->set_rules('iban', 'IBAN', 'required');
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
            $this->form_validation->set_rules('account_number', 'Account Number', 'required');
            $this->form_validation->set_rules('bic', 'BIC', 'required');

			if ($this->form_validation->run() != false) {

				if($_FILES['company_registration']['name'])
                {
					$this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'uploads/documents';
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);

					
                    if (!$this->upload->do_upload('company_registration'))
                    {                 
                        $this->session->set_flashdata('error', "file Not Uploaded.");
                    }
                    else
                    {
                        $path1 =  $this->upload->data(); 						
                        $companyRegistration = $path1['file_name'];
					}
				}

				if($_FILES['business_insurance']['name'])
                {
					$this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'uploads/documents';
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);

					if (!$this->upload->do_upload('business_insurance'))
                    {                 
                        $this->session->set_flashdata('error', "file Not Uploaded.");
                    }
                    else
                    {
                        $path2 =  $this->upload->data(); 						
                        $businessInsurance = $path2['file_name'];
					}
				}
				if($_FILES['company_logo']['name'])
                {
					$this->load->library('upload');
                    $config['encrypt_name']         = TRUE;   
                    $config['upload_path']          = 'uploads/documents';
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 500000;
                    $config['file_name']            = time();
                    $this->upload->initialize($config);

					if (!$this->upload->do_upload('company_logo'))
                    {                 
                        $this->session->set_flashdata('error', "file Not Uploaded.");
                    }
                    else
                    {
                        $path3 =  $this->upload->data(); 						
                        $companyLogo = $path3['file_name'];
					}
				}	

					$bankId = $this->input->post('bank_id');
					if($bankId!=''){

						$data = [

							"company_registration" => $companyRegistration,
							"business_insurance" => $businessInsurance,
							"company_logo" => $companyLogo,
							"beneficiary_name" => $this->input->post('beneficiary_name'),
							"iban" => $this->input->post('iban'),
							"account_number" => $this->input->post('account_number'),
							"bank_name" => $this->input->post('bank_name'),
							"bic" => $this->input->post('bic'),
							'vendor_id' => $vendor['id'],

						];

						
						$id = $this->PermissionModel->Update($bankId,$data,'tbl_vendor_bank_info_and_files');

					}else{				

						$data = [

							"company_registration" => $companyRegistration,
							"business_insurance" => $businessInsurance,
							"company_logo" => $companyLogo,
							"beneficiary_name" => $this->input->post('beneficiary_name'),
							"iban" => $this->input->post('iban'),
							"account_number" => $this->input->post('account_number'),
							"bank_name" => $this->input->post('bank_name'),
							"bic" => $this->input->post('bic'),
							'vendor_id' => $vendor['id'],

						];

						$insert_id = $this->PermissionModel->insert("tbl_vendor_bank_info_and_files",$data); 

					}	
					$this->session->set_flashdata('success', "Bank Details Added successfully.");
					redirect('vendor/bank-info'); 
					

			}else{

				$this->session->set_flashdata('error', validation_errors());

			}
			
		}else{

			
			$views[] = 'vendor/manage-bank-info/add';
			$this->vendor_view($views);

		}
	}

}


