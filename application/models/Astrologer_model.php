<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Astrologer_model extends CI_Model{
    
    public function getAstrologers(){

		$this->db->select('*');
		$this->db->from('tbl_astrologers');
		$this->db->order_by('id','asc');
		$query = $this->db->get();
		return $query->result();
		
    }
}
