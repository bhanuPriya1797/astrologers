<?php
	class Job_model extends CI_Model{

		public function getJobPostList(){

			$this->db->select('t1.*,t2.job_category');
			$this->db->from('tbl_jobs t1');
			$this->db->join('tbl_job_category t2','t1.job_category_id = t2.id','inner');
			//$this->db->where('t1.status',1);
			$q = $this->db->get()->result_array();
			// echo "<pre>"; print_r($q); die;
			return $q;

		}

		public function getJobPostList_by_id($id){
			$this->db->select('t1.*,t2.job_category');
			$this->db->from('tbl_jobs t1');
			$this->db->join('tbl_job_category t2','t1.job_category_id = t2.id','inner');
			$this->db->where('t1.status',1);
			$this->db->where('t1.id',$id);
			$q = $this->db->get()->row_array();
			return $q;
		}

		public function getJobList(){

			$this->db->select('*');
			$this->db->from(' tbl_job_category');
			//$this->db->where('status',1);
			$q = $this->db->get()->result_array();
			return $q;

		}

		public function getJobCategoryPostListById($id){

			$this->db->select('*');
			$this->db->from('tbl_job_category');
			$this->db->where('id',$id);
			$q = $this->db->get()->row_array();
			return $q;

		}

		public function getJobPostListById($id){

			$this->db->select('t1.*,t2.job_category');
			$this->db->from('tbl_jobs t1');
			$this->db->join('tbl_job_category t2','t1.job_category_id = t2.id','inner');
			$this->db->where('t1.id',$id);
			$q = $this->db->get()->row_array();
			return $q;

		}

		public function getJobCategoryList(){

			$this->db->select('id as category_id,job_category');
			$this->db->from('tbl_job_category');
			$this->db->where('status','1');
			$q = $this->db->get()->result_array();
			return $q;

		}

	}


?>
