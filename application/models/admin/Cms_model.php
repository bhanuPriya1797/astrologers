<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_model extends CI_Model{

	function getpages(){
		$this->db->select('*');
		$this->db->from('tbl_cms');
		$this->db->where('tbl_cms.cms_id >',0);
		$query = $this->db->get();
		return $query->result();
	}

	function get_page_by_id($page_id){
		$this->db->select()->from('tbl_cms');
		$this->db->where('cms_id', $page_id);
		$query = $this->db->get();
		return $query->result();
	}

	function edit_page($post){
		$data = array(
			'meta_title' => $post['meta_title'],
			'meta_description' => $post['meta_description'],
			'meta_keywords' => $post['meta_keywords'],
		);
		$this->db->where('cms_id', $post['page_id']);
		$this->db->update('cms', $data);

	}

	public function Update($id, $data,$tablename){
        $this->db->where('cms_id', $id);
        $this->db->update($tablename, $data);
        return true;
    }

}