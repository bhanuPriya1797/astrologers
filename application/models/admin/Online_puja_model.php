<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_puja_model extends CI_Model{

    public function getPujaDetails(){

        $this->db->select('*');
        $this->db->from('tbl_puja');
        // $this->db->where('status','1');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function getPujaDetailsById($id){

        $this->db->select('*');
        $this->db->from('tbl_puja');
        $this->db->where('status','1');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();

    }
   

}