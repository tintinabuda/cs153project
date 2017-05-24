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
}
?>

