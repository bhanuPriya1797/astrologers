<?php
	class Gift_model extends CI_Model{

		function getGiftList(){

			$this->db->select('*');
			$this->db->from('gifts');
			// $this->db->where('status','1');
			$q = $this->db->get()->result();
			return $q;
		}

		public function getGifts(){
			$this->db->select('*');
			$this->db->from('gifts');
			$this->db->where('status','1');
			$this->db->order_by('id','asc');
			$query = $this->db->get();
			return $query->result();
		}
	}


?>
