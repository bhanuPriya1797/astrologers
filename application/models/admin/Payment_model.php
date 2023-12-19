<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model{

    function getPaymentList(){

        $this->db->select('tbl_orders.*,tbl_vendors.first_name as vfname,tbl_vendors.last_name as vlname,tbl_booking_status.status_name');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_vendors','tbl_orders.vendor_id = tbl_vendors.id','left');
        $this->db->join('tbl_booking_status','tbl_orders.booking_status = tbl_booking_status.id','left');
        $this->db->where('tbl_orders.booking_status',5);
        $q = $this->db->get()->result();
        return $q;

    }

}