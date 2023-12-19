<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends Core_Admin_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->data['error']="";
        $this->data['success']="";
        $this->load->model('admin/PermissionModel');
        $this->load->model('admin/Booking_model');
        $this->load->model('admin/Login_model', 'admin');
        if(!isset($this->session->userdata['userPermissions'])){
            $this->roles->getGoUserRoles();   
        }
        
        $userPermissions            = $this->session->userdata['userPermissions'];
        $this->data['urlkey']       = $this->uri->segment(1);
    }
    
    public function index() {
        
        $this->data['active'] = 'permission';
        $this->data['title'] = 'permission';
        // echo "<pre>"; print_r($_SESSION); die;
        $this->data['total_amount'] = $this->Booking_model->getTotalAmount();
        $this->data['pending_amunt'] = $this->Booking_model->getPendingAmount();
        $this->data['paid_amount'] = $this->Booking_model->getPaidAmount();
        $this->data['vendor_booking'] = $this->Booking_model->get_booking($id=0);
        $views[] = 'admin/booking/index';

        $this->admin_view($views);
    }

    public function delete_booking() {
        $this->Common_model->delete('tbl_services_booking',['id'=> $this->input->post('id')]);
        echo "success"; 
    }

    public function view_booking(){
            
        $this->data['active'] = 'Booking';
        $this->data['title'] = 'Booking';
        $id = $this->uri->segment(3);
        $this->data['booking_id'] = $this->uri->segment(3);
        $this->data['vendor_booking'] = $this->Booking_model->getBookingDetails($id);
        $views[] = 'admin/booking/view';
        $this->admin_view($views);

    }

    public function edit_booking(){
            
        $this->data['active'] = 'Booking';
        $this->data['title'] = 'Booking';
        $id = $this->uri->segment(3);
        $this->data['booking_id'] = $this->uri->segment(3);
        $this->data['vendor_booking'] = $this->Booking_model->getBookingDetails($id);
        $this->data['statusList'] = $this->Booking_model->getStatusList();
        $this->data['slotList'] = $this->Booking_model->getSlotList();
        $views[] = 'admin/booking/edit';
        $this->admin_view($views);

    }

    public function update_booking(){

        // echo "<pre>"; print_r($_POST); die;

        $booking_date = $this->input->post('booking_date');
        $booking_status = $this->input->post('booking_status');
        $no_of_persons = $this->input->post('no_of_persons');
        $booking_id = $this->input->post('booking_id');

        $dataArr = array(

            'booking_date' => date('Y-m-d',strtotime($booking_date)),
            'booking_status' => $booking_status,
            'no_of_persons' => $no_of_persons,

        );

        $this->Booking_model->updateBookingInfo($dataArr,$booking_id);
        redirect('admin/booking-edit/'.$booking_id);


    }

    public function vendor_booking_list(){
        
        $id = $this->uri->segment(3);
        $this->data['active'] = 'vendors';
        $this->data['title'] = 'vendors';
        $this->data['vendor_name'] = $this->Booking_model->getVendorNameById($id);
        $this->data['vendor_booking'] = $this->Booking_model->get_booking($id);
        $views[] = 'admin/booking/vendor_booking';
        $this->admin_view($views);


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
        $update =  $this->Booking_model->updateStatusByBookingId($bookingId,$data);

        if($update == 1){

            echo 1;

        }else{

            echo 0;

        }
        

    }

    
}
