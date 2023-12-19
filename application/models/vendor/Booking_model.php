<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model{

    public function get_booking($id){
        $this->db->select('tbl_orders.*,tbl_vendor_dives_location.dives_name,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.address,tbl_customer.mobile,tbl_customer.email,tbl_booking_status.status_name,tbl_vendors.first_name as vendor_fname,tbl_vendors.last_name as vendor_lname');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_vendor_dives_location','tbl_orders.service_id=tbl_vendor_dives_location.id','left');
        $this->db->join('tbl_vendors','tbl_orders.vendor_id = tbl_vendors.id','left');
        $this->db->join('tbl_customer', 'tbl_orders.user_id = tbl_customer.id', 'left');
        $this->db->join('tbl_booking_status', 'tbl_orders.booking_status = tbl_booking_status.id', 'left');      
        $this->db->where('tbl_orders.vendor_id',$id);        
        $q = $this->db->get()->result(); 
        return $q;
    }

    public function getBookingDetails($id){

        $this->db->select('tbl_orders.*,tbl_booking_status.status_name,tbl_vendor_dives_location.dives_name,tbl_vendor_dives_location.price_per_person,tbl_rental_products.product_name,tbl_service_booking_rental_products.product_price,tbl_vendors.first_name,tbl_vendors.last_name,tbl_vendors.address,tbl_vendors.city,tbl_vendors.state,tbl_vendors.country,tbl_vendors.zip_code');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_booking_status','tbl_orders.booking_status = tbl_booking_status.id','left');
        $this->db->join('tbl_vendor_dives_location','tbl_orders.service_id = tbl_vendor_dives_location.id','left');
        $this->db->join('tbl_vendors','tbl_orders.vendor_id = tbl_vendors.id','left');
        $this->db->join('tbl_service_booking_rental_products','tbl_orders.service_id = tbl_service_booking_rental_products.service_id','left');
        $this->db->join('tbl_rental_products','tbl_service_booking_rental_products.rental_products_id = tbl_rental_products.id','left');
        $this->db->where('tbl_orders.id',$id);
        $q = $this->db->get()->row_array();
        return $q;

    }

    public function getTotalAmountByVendor($id){

        $this->db->select_sum('paid_amount');
        $this->db->from('tbl_orders');
        $this->db->where('vendor_id',$id);
        $query = $this->db->get();
        return $query->row()->paid_amount; 

    }

    public function getTotalBookingsByVendor($id){

        $this->db->select('COUNT(id)');
        $this->db->from('tbl_orders');
        $this->db->where('vendor_id',$id);
        $query = $this->db->count_all_results();
        return $query; 

    }

    public function getStatusList(){

        $this->db->select('*');
        $this->db->from('tbl_booking_status');
        $q = $this->db->get()->result();
        return $q;
    }

    public function updateStatusByBookingId($bookingId,$data){

        $this->db->where('id',$bookingId);
        if($this->db->update('tbl_orders',$data)){

            return 1;

        }else{

            return 0;
        }

    }

    public function getTotalAmount($id){

        $this->db->select_sum('paid_amount');
        $this->db->from('tbl_orders');
        $this->db->where('tbl_orders.vendor_id',$id);
        $query = $this->db->get();
        return $query->row()->paid_amount; 

    }

    public function getPendingAmount($id){

        $this->db->select_sum('paid_amount');
        $this->db->from('tbl_orders');
        $this->db->where('tbl_orders.booking_status','2');
        $this->db->where('tbl_orders.vendor_id',$id);
        $query = $this->db->get();
        return $query->row()->paid_amount;
    }

    public function getPaidAmount($id){

        $this->db->select_sum('paid_amount');
        $this->db->from('tbl_orders');
        $this->db->where('tbl_orders.booking_status','5');
        $this->db->where('tbl_orders.vendor_id',$id);
        $query = $this->db->get();
        return $query->row()->paid_amount;
    }
    

}