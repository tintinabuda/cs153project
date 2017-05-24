<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		#$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('user');
	}

	public function index()

	{

		$data['user_list'] = $this->user->get_all_users();

		$this->load->view('crud_users', $data);

	}
	public function register(){
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[16]|strip_tags');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|strip_tags');
            $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|strip_tags');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|strip_tags');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|matches[password]');

            $userData = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'address' => $this->input->post('address'),
                'birthday' => $this->input->post('birthday'),
                'password' =>  md5($this->input->post('password')),
                'type' => 0 //default is typical user
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successful. Please login to your account.');
                    redirect('users/');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
		$this->load->view('_register');
		$data = array();
		$user_data = array();

	}
    public function login(){
        $data = array();
        $user_info = array();
        if($this->session->userdata('LoggedIn')){
            //insert redirect here
            redirect('/');
        }

        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'username'=>$this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                );
                $checkLogin = $this->user->get_user_row($con);
                if($checkLogin){
                    $this->session->set_userdata('LoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);

                    $user_info['username'] = $this->session->userdata('username');
                    $user_info['name'] = $this->session->userdata('name'); 
                    $user_info['address'] = $this->session->userdata('address');
                    $user_info['birthday'] = $this->session->userdata('birthday');

                    $this->load->view('_home', $data);
                    //redirect('/');
                }else{
                    $data['error_msg'] = 'Wrong username or password, please try again.';
                }
            }
        }
        //load the view: views/users/login
        $this->load->view('_login', $data);


    }
    public function logout(){
        $this->session->unset_userdata('LoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }
	public function delete($id){
		$this->user->delete($id);
        redirect('users/');
	}
    public function update(){

    }
}
