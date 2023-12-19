<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
  function getProductList(){

    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('status','1');
    $this->db->order_by('id','DESC');
    $q = $this->db->get()->result();
    return $q;

  }

  function getProductDetails($proSlug){

    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('status','1');
    $this->db->where('product_slug',$proSlug);
    $q = $this->db->get()->row();
    return $q;

  }

}