<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_ads_model extends CI_Model{

    public function getGoogleAds(){

        $this->db->select('*');
        $this->db->from('google_ads');
        // $this->db->where('status',1);
        $q = $this->db->get()->result();
        // echo "<pre>"; print_r($q); die;
        return $q;

    }

    public function addGoogleAds($data){

        if($this->db->insert('google_ads', $data)){

           return  $this->db->insert_id();

        }else{

            return 0;

        }



    }

    public function getGoogleAdsDataById($id){

        $this->db->select('*');
        $this->db->from('google_ads');
        $this->db->where('id',$id);
        $q = $this->db->get()->row();
        return $q;
    }

    public function editGoogleAds($data,$id){

        $this->db->where('id',$id);
        $this->db->update('google_ads', $data);

    }
    
}