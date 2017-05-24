<?php
class Register extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('CI_menu', 'CI_encrypt'));
		$this->load->helper(array('form', 'url'));
		$this->load->database();
	}

	function index(){
		if($this->CI_auth->check_logged()=== true)
			redirect(base_url());

		$data['title'] = 'CodeIgniter Registration System';
		$data['menu_top'] = $this->CI_menu->menu_top();
		if($this->input->post('submit')) {
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'User name', 'trim|required|alpha_dash|min_length[3]|max_length[16]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]|matches[passconf]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[3]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean');
		$this->form_validation->set_rules('terms', 'Terms of Sevices', 'trim|required|xss_clean');

		// Set Custom messages
		//$this->form_validation->set_message('required', 'Your custom message here');


		if ($this->form_validation->run() == FALSE){
			$data['body']  = $this->load->view('_add_user_form', true);
		}
		else{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$address = $this->input->post('address');
				$check_query = "SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email'";
				$query = $this->db->query($check_query);

				if ($query->num_rows() > 0){

					$data['body']  = $this->load->view('_add_user_form', $sub_data, true);
				}
				else{
					$rand_salt = $this->CI_encrypt->genRndSalt();
					$encrypt_pass = $this->CI_encrypt->encryptUserPwd( $this->input->post('password'),$rand_salt);
					$input_data = array(
					'name' => $name,
					'username' => $username,
					'password' => $encrypt_pass,
					'address' => $address,
					'salt' => $rand_salt
					);
					if($this->db->insert('users', $input_data)){
						$data['body']  = "Registration success, please login<br/>";
					}
					else
						$data['body']  = "error on query";
				}

		}

		}
		else{
			$data['body']  = $this->load->view('_add_user_form', true);
		}
		$this->load->view('crud_users', $data);

	}
}
?>