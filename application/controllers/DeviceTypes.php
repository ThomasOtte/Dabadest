<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DeviceTypes extends CI_Controller {
 
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('devicetype');
	}
	
	public function viewdevicetype() {
		$data = array();
		if($this->session->userdata('userState') == 1)
		{
			$this->load->model('devicetype');
   		    $data['result'] = $this->devicetype->getRows();   
				
			$this->load->view('devicetypes/managementview', $data);
		}
		else if($this->session->userdata('userState') == 2)
		{
			$this->load->model('devicetype');
			$data['result'] = $this->devicetype->getRows();
			
			$this->load->view('devicetypes/adminview', $data);
		}
		else
		{
			redirect('users/login');
		}
	}
	public function adddevicetype()
	{
		$data = array();
		$deviceTypeData = array();
		if($this->input->post('addTypeSubmit')){
			$this->form_validation->set_rules('typename', 'TypeName', 'required');
			
			$deviceTypeData = array(
					'typename' => strip_tags($this->input->post('typename')),
			);
			
			if($this->form_validation->run() == true){
				$insert = $this->devicetype->insert($deviceTypeData);
				if($insert){
					$this->session->set_userdata('success_msg', 'The device has been added');
					redirect('devicetypes/viewdevicetype');
				}else{
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}
		
		$data['devicetye'] = $deviceTypeData;
		
		$this->load->view('devicetypes/adddevicetype', $data);
	}
	
}