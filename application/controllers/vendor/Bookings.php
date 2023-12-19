<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends Core_Vendor_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('vendor/Booking_model','booking');

	}

	public function index(){

		$user = $this->session->userdata('vendor_login_data');
		$this->data['active'] = 'bookings';
		$this->data['title'] = 'Bookings';
		$this->data['vendor_booking'] = $this->booking->get_booking($user['id']);
		$this->data['total_amount'] = $this->booking->getTotalAmount($user['id']);
        $this->data['pending_amunt'] = $this->booking->getPendingAmount($user['id']);
        $this->data['paid_amount'] = $this->booking->getPaidAmount($user['id']);
		$views[] = 'vendor/booking/index';
		$this->vendor_view($views);

	}

	public function view_booking(){
        
        $this->data['active'] = 'Booking';
        $this->data['title'] = 'Booking';
        $id = $this->uri->segment(3);
		$this->data['booking_id'] = $this->uri->segment(3);
        $this->data['vendor_booking'] = $this->booking->getBookingDetails($id);
        $views[] = 'vendor/booking/view';
        $this->vendor_view($views);

    }
	public function edit_booking(){
        
        $this->data['active'] = 'Booking';
        $this->data['title'] = 'Booking';
        $id = $this->uri->segment(3);
		$this->data['booking_id'] = $this->uri->segment(3);
        $this->data['vendor_booking'] = $this->booking->getBookingDetails($id);
		$this->data['statusList'] = $this->booking->getStatusList();
        $views[] = 'vendor/booking/edit';
        $this->vendor_view($views);

    }

	public function send_email(){

		$user = $this->session->userdata('vendor_login_data');
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $config['upload_path'] = './uploads/booking/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf|doc|docm|docx';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('file')){  
				
				$uploadData = $this->upload->data();  
				$filename = $uploadData['file_name'];  

			}else{

				$subject = $this->input->post('subject');
		        $mail_data['name'] = $this->input->post('first_name')." ".$this->input->post('last_name');
		        $mail_data['description'] = $this->input->post('description');
		        $mail_data['email'] = $this->input->post('email');
				$mail_data['mail_attachment'] = "none";
		        $message = $this->load->view('front/mailer/booking-after-email', $mail_data, true);
				send_mail($this->input->post('email'), $subject, $message);
				$this->session->set_flashdata('success', "Email sent to ".$this->input->post('email')." successfully.");
                redirect('vendor/bookings'); 
				 
			
			}

            $this->form_validation->set_rules('subject', 'Email Subject', 'required');
            $this->form_validation->set_rules('description', 'Email Description', 'required');
            if ($this->form_validation->run() != false) {
                $attachemnt_path = base_url('uploads/booking/'.$filename);
                $subject = $this->input->post('subject');
		        $mail_data['name'] = $this->input->post('first_name')." ".$this->input->post('last_name');
		        $mail_data['description'] = $this->input->post('description');
		        $mail_data['email'] = $this->input->post('email');
				$mail_data['mail_attachment'] = $attachemnt_path;
		        $message = $this->load->view('front/mailer/booking-after-email', $mail_data, true);
				send_mail($this->input->post('email'), $subject, $message, array($attachemnt_path));
				$this->session->set_flashdata('success', "Email sent to ".$this->input->post('email')." successfully.");
                redirect('vendor/bookings'); 
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }
		$this->data['active'] = 'bookings';

		$this->data['title'] = 'Bookings';

		$this->data['vendor_booking'] = $this->booking->get_booking($user['id']);

		$views[] = 'vendor/booking/send_email.php';

		$this->vendor_view($views);
	}

	function updateStatus(){
        

		// echo "<pre>"; print_r($_POST); die;
		$bookingId = $this->input->post('bookingId');
		$bookingStatusId = $this->input->post('bookingStatusID');
		$reason = $this->input->post('reason');
		

		if($reason==''){

			$data = array('booking_status' => $bookingStatusId);

		}else{

			$data = array('booking_status' => $bookingStatusId,'reason' => $reason);

		}

		// echo "<pre>"; print_r($data); die;
		$update =  $this->booking->updateStatusByBookingId($bookingId,$data);

		if($update == 1){

			echo 1;

		}else{

			echo 0;

		}
		

	}
}


