<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dive_details_model extends CI_Model{

    function getServiceDiveDetails($slug){

        $this->db->select("t1.*,t2.country,t2.state,t2.city,t2.address,t2.latitude,t2.longitude,t3.name,t4.activity");
        $this->db->from('tbl_vendor_dives_location t1');
        $this->db->join('tbl_dives_center t2','t1.location_id = t2.id','inner');
        $this->db->join('tbl_dives_category t3','t2.category_id = t3.id','inner');
        $this->db->join('tbl_activity_type t4','t1.activity_type = t4.id','inner');
        $this->db->where('t1.status','1');
        $this->db->where('t1.dives_slug',$slug);
        $result = $this->db->get()->row_array();
        return $result;

    }

    function getDiveDetails($slug){

        $this->db->select("t1.*,t2.name as dive_type");
        $this->db->from('tbl_dives_center t1');
        $this->db->join('tbl_dives_category t2','t1.category_id = t2.id','inner');
        $this->db->where('t1.status','1');
        $this->db->where('t1.id',$slug);
        $result = $this->db->get()->row_array();
        // echo $this->db->last_query(); die;
        return $result;

    }



    function getLocationId($slug){

        $this->db->select('*');
        $this->db->from('tbl_vendor_dives_location');
        $this->db->where('location_id',$slug);
        $q = $this->db->get()->row();
        // echo $this->db->last_query();
        return $q;

    }

    function getLocationIdBylocations($id){

        $this->db->select('*');
        $this->db->from('tbl_dives_center');
        $this->db->where('id',$id);
        $q = $this->db->get()->row();
        // echo $this->db->last_query();
        return $q;

    }

    function getVendorLocationId($slug){

        $this->db->select('*');
        $this->db->from('tbl_vendor_dives_location');
        $this->db->where('dives_slug',$slug);
        $q = $this->db->get()->row();
        // echo $this->db->last_query();
        return $q;

    }

    function getServiceSliderImages($locationId){

        $this->db->select('*');
        $this->db->from('tbl_vendor_dives_center_images');
        $this->db->where('location_id',$locationId);
        $q = $this->db->get()->result_array();
        // echo $this->db->last_query(); die;
        return $q;

    }

    function getSliderImages($locationId){

        $this->db->select('*');
        $this->db->from('tbl_admin_service_image');
        $this->db->where('service_id',$locationId);
        $q = $this->db->get()->result_array();
        // echo $this->db->last_query(); die;
        return $q;

    }

    function getVendorDetails(){

        $this->db->select('*');
        $this->db->from('tbl_vendors');
        $this->db->where('location_id',$locationId);
        $q = $this->db->get()->result_array();
        return $q;

    }

    function getVendorList($locationId){

        $this->db->select('t2.*');
        $this->db->from('tbl_vendor_dives_location t1');
        $this->db->join('tbl_vendors t2','t1.vendor_id = t2.id','inner');
        $this->db->where('t1.location_id',$locationId);
        $this->db->where('t1.status','1');
        $this->db->group_by('t2.id');
        $result = $this->db->get()->result_array();
        // echo $this->db->last_query(); die;
        return $result;

    }

    function diveList($locationId,$vendor_id,$vendorLocationId){

        $this->db->select("t1.*,t2.country,t2.state,t2.city,t2.address,t2.latitude,t2.longitude,t3.name as dive_type,t4.activity");
        $this->db->from('tbl_vendor_dives_location t1');
        $this->db->join('tbl_dives_center t2','t1.location_id = t2.id','inner');
        $this->db->join('tbl_dives_category t3','t2.category_id = t3.id','inner');
        $this->db->join('tbl_activity_type t4','t1.activity_type = t4.id','inner');
        $this->db->where('t1.status','1');
        $this->db->where('t1.location_id',$locationId);
        // $this->db->where('t1.vendor_id',$vendor_id);
        $this->db->where('t1.id!=',$vendorLocationId);
        $result = $this->db->get()->result_array();
        return $result;

    }

    function checkAvailability($noOfPersons,$booking_date,$service_id){
        // echo $service_id; die;
        $this->db->select('*');
        $this->db->from('tbl_services_booking');
        $this->db->where('service_id',$service_id);
        $q = $this->db->get()->num_rows();
        // echo $this->db->last_query(); die;
        return $q;

    }

    function getAvailableSlotsLists($serviceId){

        $this->db->where('service_id',$serviceId);
        $q = $this->db->get('tbl_service_slots')->result_array();
        return $q;       

    }

    function getBookedSlotsLists($serviceId){

        $this->db->where('service_id',$serviceId);
        $q = $this->db->get('tbl_services_booking')->result_array();
        return $q;       

    }

    function getRentalProductsList($vendor_id,$service_id){

        $this->db->select('tbl_rental_products.id,tbl_rental_products.product_name,tbl_vendor_rental_products.rental_price');
        $this->db->from('tbl_vendor_rental_products');
        $this->db->join('tbl_rental_products','tbl_vendor_rental_products.product_id = tbl_rental_products.id','left');
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('vendor_location_id',$service_id);
        $result = $this->db->get()->result_array();
        // echo $this->db->last_query(); die;
        return $result;

    }

    function getServiceIdByServiceSlug($slug){

        $this->db->where('dives_slug',$slug);
        $q = $this->db->get('tbl_vendor_dives_location')->row_array();
        return $q['id'];
    }
    
}