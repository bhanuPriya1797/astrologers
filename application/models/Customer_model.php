<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model{
    
    public function checkMobileNo($mobile){

        $this->db->select('mobile');
        $this->db->from('tbl_users');
        $this->db->where('mobile',$mobile);
        $this->db->where('status',1);
        $q = $this->db->get()->num_rows();
        return $q;
       

    }
    public function checkOTPMobileNo($mobile,$otp){

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('mobile',$mobile);
        $this->db->where('otp',$otp);
        $this->db->where('status',1);
        $q = $this->db->get()->num_rows();
        // echo $this->db->last_query(); die;
        return $q;
       

    }
    public function updateCustomerInfo($data,$mobile){

        $this->db->where('mobile',$mobile);
        $this->db->update('tbl_users',$data);
        
    }

    public function getProfileDataById($mobile){       

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('mobile',$mobile);
        $this->db->where('status',1);
        $q = $this->db->get()->row();
        // echo $this->db->last_query(); die;
        return $q;
    }


}