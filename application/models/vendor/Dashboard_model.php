<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	public function products_count($table,$where){
		$query = $this->db->select("id")->where($where)->group_by('product_id')->get($table);
		$count = $query->num_rows();
        return $count;
	}

	public function booking_count($where){
		$query = $this->db->select('t1.*,t2.service_price as vendor_price,t2.created_date as booking_time,t3.first_name,t3.last_name,t3.email,t3.mobile,t3.address,t4.full_address,t5.name as dives_category_name');
        $this->db->from('tbl_vendor_dives_location t1');
        $this->db->join('tbl_services_booking t2', 't1.id = t2.service_id', 'inner');
        $this->db->join('tbl_customer t3', 't3.id = t2.user_id', 'inner');
        $this->db->join('tbl_dives_center t4', 't4.id = t1.location_id', 'inner');
        $this->db->join('tbl_dives_category t5', 't5.id = t4.category_id', 'inner');
        $this->db->where('t1.vendor_id', $where);
        $query = $this->db->get();
		$count = $query->num_rows();
        return $count;
	}

		
}	