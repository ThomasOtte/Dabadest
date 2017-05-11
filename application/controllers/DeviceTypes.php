<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class DeviceTypes extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'devicetype' );
		
		$this->session->unset_userdata ( 'slug' );
	}
	public function viewDeviceType($slug = NULL) {
		$data = array ();
		if ($this->session->userdata ( 'userState' ) == 1) {
			$data ['result'] = $this->devicetype->getRows ();
			
			$this->load->view ( 'devicetypes/managementview', $data );
		} else if ($this->session->userdata ( 'userState' ) == 2) {
			$data ['result'] = $this->devicetype->getRows ();
			
			$this->load->view ( 'devicetypes/adminview', $data );
		} else {
			redirect ( 'users/login' );
		}
	}
	public function adddevicetype() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$this->form_validation->set_rules ( 'typename', 'TypeName', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->devicetype->setType ();
			$this->session->set_userdata ( 'success_msg', 'The device has been added' );
			redirect ( 'devicetypes/viewdevicetype' );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ( 'devicetypes/adddevicetype' );
	}
	public function editDeviceType() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$id = $this->uri->segment ( 3 );
		if (empty ( $id )) {
			show_404 ();
		}
		
		$data ['typename'] = $this->devicetype->getTypeById ( $id );
		$this->form_validation->set_rules ( 'typename', 'TypeName', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->devicetype->setType ();
			$this->session->set_userdata ( 'success_msg', 'The device has been added' );
			redirect ( 'devicetypes/viewDeviceType' );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ( 'devicetypes/adddevicetype', $data );
	}
	public function delete() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$devicetype = $this->devicetype->getTypeById ( $id );
		
		$this->devicetype->delete ( $id );
		redirect ( 'devicetypes/viewDeviceType' );
	}
}