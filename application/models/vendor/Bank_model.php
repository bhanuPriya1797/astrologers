<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model{

    public function getBankInfo($vendorId){

        $this->db->select('*');
        $this->db->from('tbl_vendor_bank_info_and_files');
        $this->db->where('vendor_id',$vendorId);
        $q = $this->db->get()->row_array();
        return $q;
       
    }

    

}