<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_puja_model extends CI_Model
{
  function getOnlinePujaList(){

    $this->db->select('*');
    $this->db->from('tbl_puja');
    $this->db->where('status','1');
    $this->db->order_by('id','DESC');
    $q = $this->db->get()->result();
    return $q;

  }

  function getOnlinePujaDetails($pujaSlug){

    $this->db->select('*');
    $this->db->from('tbl_puja');
    $this->db->where('status','1');
    $this->db->where('puja_slug',$pujaSlug);
    $q = $this->db->get()->row();
    // echo "<pre>"; print_r($q); die;
    return $q;

  }
}