<?php
class Common_model extends CI_Model{

	public function insert($table, $data)
	{
		$insert = $this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
		return $insert?$insert_id:FALSE;
	}

	public function get_result($table, $where)
	{
		$query = $this->db->select("*")->where($where)->order_by('id','desc')->get($table);
		return $query->result();
	}

	public function update($data, $where, $table)
	{
		$update = $this->db->where($where)->update($table, $data);
		return $update?TRUE:FALSE;
	}

	public function delete($table, $data)
	{
		$delete = $this->db->delete($table, $data);
		return $delete?TRUE:FALSE;
	}

	public function count($table,$where)
	{
		$query = $this->db->select("id")->where($where)->get($table);
		$count = $query->num_rows();
		return $count;
	}
    
    public function get_result_array($data, $where, $table, $order = "DESC", $by = "id")
    {
        $query = $this->db->select($data)->where($where)->order_by($by , $order)->get($table);
        return $query->result_array();
    }
    
    public function get_row($data, $where, $table)
    {
        $query = $this->db->select($data)->where($where)->get($table);
        return $query->row_array();
    }

	public function row_array($data, $where, $table)
	{
		$query = $this->db->select($data)->where($where)->get($table);
		return $query->row_array();
	}

	public function result($data, $where, $table, $order = "DESC", $by = "id")
	{
		$query = $this->db->select($data)->where($where)->order_by($by , $order)->get($table);
		$result = $query->result();
		return $result;
	}
	
	public function row($data, $where, $table)
	{
		$query = $this->db->select($data)->where($where)->get($table);
		$result = $query->row();
		return $result;
	}

	public function customInsert($query)
    {
        $data = $this->db->query($query);
    }

    public function getCountries() {
        $this->db->select('geoId,geoName');
        $this->db->where('geoType', 2);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->from('tbl_geography');
        $this->db->order_by('geoName', 'asc');
        $result = $this->db->get();
        $country = $result->result();
        return $country;
    }

    /**
     * @ Function Name		: allstateList
     * @ Function Params		: 
     * @ Function Purpose 	: fetch list of state
     * @ Function Returns	: 
     */
    public function allstateList() {
        $this->db->select('*');
        $this->db->where('geoType', 3);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->order_by('geoName', 'asc');
        $this->db->from('tbl_geography');
        $result = $this->db->get();
        $allstateList = $result->result();
        return $allstateList;
    }

    /* all city list */

    public function allcityList($statId = '') {
        $this->db->select('*');
        $this->db->where('geoType', 4);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->order_by('geoName', 'asc');
        $this->db->from('tbl_geography');
        $result = $this->db->get();
        $allcitylist = $result->result();
        return $allcitylist;
    }

    /* all city list by state id */

    public function allcityListByid($statId) {
        $this->db->select('*');
        $this->db->where('geoType', 4);
        $this->db->where('geoPid', $statId);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->order_by('geoName', 'asc');
        $this->db->from('tbl_geography');
        $result = $this->db->get();
        $allcitylist = $result->result();
        return $allcitylist;
    }

    /**
     * @ Function Name		: getConutryId
     * @ Function Params		: 
     * @ Function Purpose 	: fetch list of country
     * @ Function Returns	: 
     */
    public function getConutryId($id) {
        $this->db->select('geoPid');
        $this->db->where('geoType', 3);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->where('geoId', $id);
        $this->db->from('tbl_geography');
        $result = $this->db->get();
        $country = $result->row();
        return $country;
    }

    /**
     * @ Function Name		: stateList
     * @ Function Params		: 
     * @ Function Purpose 	: fetch list of states
     * @ Function Returns	: 
     */
    public function stateList($countryId = '') {
        if (isset($countryId) && $countryId != '') {
            $val = $countryId;
        } else {
            $val = '';
        }
        $this->db->select('geoId,geoName');
        $this->db->where('geoPid', $val);
        $this->db->where('geoType', 3);
        $this->db->where('geoIsActive', 'y');
        $this->db->where('geoIsTrash', 'n');
        $this->db->order_by('geoName', 'asc');
        $this->db->from('tbl_geography');
        $result = $this->db->get();
        $slctstateList = $result->result();
        return $slctstateList;
    }


    public function getcurrnecy() {
        $this->db->select('*');
        $this->db->from('tbl_currency');
        $result = $this->db->get();
        $currency = $result->result();
        return $currency;
    }

    function checkPasswordIsCorrect($id){

        $this->db->select('password');
        $this->db->from('tbl_customer');
        $this->db->where('id',$id);
        $result = $this->db->get()->row();
        // echo "<pre>"; print_r($result->password); die;
        $currency = $result->password;
        return $currency;

    }
	
}