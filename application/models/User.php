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

}

?>

