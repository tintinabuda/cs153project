<?php

class User extends CI_Model {

	function __construct()
	{

		parent::__construct();

		$this->load->database("users");

	}

	public function get_all_users()

	{

		$query = $this->db->get('users');

		return $query->result();

	}
    public function insert($data = array()) 
    {
        //insert user data to users table
        $insert = $this->db->insert('users', $data);

    }
    public function delete($id) 
    {
    	$this->db->where('id', $id);
    	return $this->db->delete('users');
    }
    public function update($id, $data)
    {
    	$this->db->where('id',$id);
    	return $this->db->update('users', $data);
    }
    public function get_user_row($params = array()){
        $this->db->select('*');
        $this->db->from('users');

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    public function get_user_info($id){
        $query = $this->db->get_where('users',array('id'=>$id));
        return $query->result();

    }
}
?>