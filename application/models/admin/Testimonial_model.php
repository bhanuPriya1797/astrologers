<?php
	class Testimonial_model extends CI_Model{

		public function getTestimonial(){

			$this->db->select('*');
			$this->db->from('tbl_testimonial');
			$this->db->where('status',1);
			$q = $this->db->get()->result_array();
			return $q;

		}

		public function getTestimonialId($id){

			$this->db->select('*');
			$this->db->from('tbl_testimonial');
			$this->db->where('id',$id);
			$q = $this->db->get()->row_array();
			return $q;

		}

	}


?>
