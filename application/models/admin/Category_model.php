<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

    public function getCategory(){

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('status','1');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function getCategoryById($id){

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id',$id);
        $this->db->where('status','1');
        // $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->row();

    }

}