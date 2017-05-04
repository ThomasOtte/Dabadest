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
		if($this->input->post('regisSubmit')){
			$this->form_validation->set_rules('typename', 'TypeName', 'required');
			
			$userData = array(
					'typename' => strip_tags($this->input->post('typename')),
			);
		
		}
	}
	
}