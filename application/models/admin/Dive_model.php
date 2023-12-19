<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dive_model extends CI_Model{
	function get_result(){
		$this->db->select('*');
		$this->db->from('tbl_dives_center');
		$this->db->order_by('id','asc');
		$query = $this->db->get();
		return $query->result();
	}
}