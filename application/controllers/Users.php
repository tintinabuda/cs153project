<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct()

{

parent::__construct();

#$this->load->helper('url');

$this->load->model('user');

}

public function index()

{

$data['user_list'] = $this->user->get_all_users();

$this->load->view('show_users', $data);

}

}

