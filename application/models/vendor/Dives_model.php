<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dives_model extends CI_Model{

    public function getCategoryDefaultById($id){
        $query = $this->db->select('t1.category_id,t2.featured,t2.special,t2.best_seller,t2.new_in,t1.country,t1.state,t1.city,t1.latitude,t1.longitude,t1.address,t2.created_at,t2.status,t2.id,t2.price_per_person,t2.group_size,t2.dives_name,t2.dives_slug,t2.description,t2.dives_thumbnail_image,t2.dive,t2.level,t2.depth,t2.temp,t2.visibility,t2.currents,t2.certification,t2.duration');
        $this->db->from('tbl_dives_center t1');
        $this->db->join('tbl_vendor_dives_location t2', 't1.id = t2.location_id', 'inner');
        $this->db->where('t2.vendor_id', $id);
        $this->db->order_by('t1.id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getlocationById($id){
        $query = $this->db->select('t1.category_id,t2.featured,t2.special,t2.best_seller,t2.new_in,t1.country,t1.state,t1.city,t1.latitude,t1.longitude,t1.address,t2.created_at,t1.status,t2.id,t2.location_id,t2.price_per_person,t2.group_size,t2.dives_name,t2.dives_slug,t2.description,t2.dives_thumbnail_image,t2.dive,t2.level,t2.depth,t2.temp,t2.visibility,t2.currents,t2.youtube_link,t2.dives_name,t2.activity_type,t2.certification');
        $this->db->from('tbl_dives_center t1');
        $this->db->join('tbl_vendor_dives_location t2', 't1.id = t2.location_id', 'inner');
        $this->db->where('t2.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getImageById($id){
        $this->db->select('id,image');
        $this->db->where('location_id', $id);
        $this->db->order_by("id", "ASC");
        $query = $this->db->get('tbl_vendor_dives_center_images');
        $result   = $query->result();
        return $result;
    }

    public function deleteRecord($tablename,$id){
      $this->db-> where('id', $id);
      $this->db-> delete($tablename);
      return true;
    }

    /* get rental product by bhanu (04-05-2023) */

   function getRentalProduct(){

        $this->db->select('*');
        $this->db->from('tbl_rental_products');
        $this->db->where('status','1');
        $result = $this->db->get()->result();
        return $result; 

   }

   function addProductDetails($insert_id,$vendor_id,$productId,$rentalPrice,$stock,$edit){

        if($edit == 'Yes'){ 

            $this->db->where('vendor_location_id', $insert_id);
            $this->db->delete('tbl_vendor_rental_products');

        }
        for($i=0; $i<count($productId); $i++){

            $data_2 =array('product_id' => $productId[$i],'vendor_id'=> $vendor_id,'vendor_location_id' => $insert_id,'rental_price' => $rentalPrice[$i],'stock' => $stock[$i]);        
            
            $this->db->insert('tbl_vendor_rental_products', $data_2);
            $last_id =  $this->db->insert_id();
                    
        }      

   }

   function get_rental_product($vendor_location_id){

        $this->db->select('*');
        $this->db->from('tbl_vendor_rental_products');
        $this->db->where('vendor_location_id',$vendor_location_id);
        $this->db->where('stock',1);
        $result = $this->db->get()->result_array();
        return $result;


    }

   function addSlots($insert_id,$slots,$edit1){

        if($edit1 == 'Yes'){ 

            $this->db->where('vendor_location_id', $insert_id);
            $this->db->delete('tbl_vendor_rental_products');

        }

        for($i=0; $i<count($slots); $i++){

            $data_2 =array('slots_id' => $slots[$i],'service_id' => $insert_id);        
            
            $this->db->insert('tbl_service_slots', $data_2);
            $last_id =  $this->db->insert_id();
                    
        }      

   }

}