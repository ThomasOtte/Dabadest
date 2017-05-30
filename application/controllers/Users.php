<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
    }
    
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('user_id'=>$this->session->userdata('userId')));

            $this->load->view ('header');
            $this->load->view('users/account', $data);
        }else{
            redirect('users/login');
        }
    }
    
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['user_id']);
                    $this->session->set_userdata('userState', $checkLogin['state']);
                    redirect('Users/home');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        
        $this->load->view ('header');
        $this->load->view('users/login', $data);
    }
    
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
            	'first_name' => strip_tags($this->input->post('fname')),
            	'last_name' => strip_tags($this->input->post('lname'))
            );
            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;

        $this->load->view ('header');
        $this->load->view('users/registration', $data);
    }
    public function home(){
    	if ($this->session->userdata ( 'userState' ) == 1 || $this->session->userdata ( 'userState' ) == 2) 
    	{
    		$this->load->view ('header');
    		$this->load->view('home');
    	}
    	else 
    	{
    		redirect ( 'users/login' );
    	}
    }
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('userState');
        $this->session->sess_destroy();
        redirect('users/login/');
    }
}