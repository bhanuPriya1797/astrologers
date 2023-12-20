<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Astrologer_model extends CI_Model{
    
    public function getAstrologers(){

		$this->db->select('*');
		$this->db->from('tbl_astrologers');
		$this->db->order_by('id','asc');
		$query = $this->db->get();
		return $query->result();
		
    }

	public function getAstrologerBySlug($slug){
		$this->db->where('slug', $slug);
		$result = $this->db->get('tbl_astrologers'); 

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		}
	}

	public function updatePassword($password,$id){
		$data = array(
			'password' => $password
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_astrologers', $data);
		return $this->db->affected_rows();
	}

	public function find_by_username($username) {
        $this->db->where('mobile_no', $username);
        $query = $this->db->get('tbl_astrologers');
		$row = $query->row();
		if(!empty($row)){
			return $row;
		} else {
			$this->db->where('email', $username);
        	$query = $this->db->get('tbl_astrologers');
			$row = $query->row();
			return (!empty($row)) ? $row : null; 
		}

    }

    public function validate_credentials($username, $password) {
		$user = $this->find_by_username($username);
        return md5($password) === $user->password;
    }

	public function generateSlug($username) {
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$result = $this->db->get('tbl_astrologers');

		if ($result->num_rows() > 0) {
			$last_row = $result->row();
			$last_id = $last_row->id;
		} else {
			$last_id = 000; 
		}
		$modified_username = $this->firstword(strtolower($username));
		$slug = $modified_username . $last_id;
        return $slug;
    }

	public function firstword($str) {
        $words = explode(' ', $str);
        return isset($words[0]) ? $words[0] : '';
    }
}
