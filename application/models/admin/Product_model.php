<?php
	class Product_model extends CI_Model{

		function getProductList(){

			$this->db->select('*');
			$this->db->from('products');
			// $this->db->where('status','1');
			$q = $this->db->get()->result();
			return $q; 

		}
		
	
	}


?>
