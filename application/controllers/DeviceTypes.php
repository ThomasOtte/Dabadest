<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class DeviceTypes extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'DeviceType' );
		
		$this->session->unset_userdata ( 'slug' );
	}
	public function viewDeviceType($slug = NULL) {
		$data = array ();
		if ($this->session->userdata ( 'userState' ) == 1) {
			$data ['result'] = $this->DeviceType->getRows ();
			
			$this->load->view ('header');
			$this->load->view ( 'devicetypes/managementview', $data );
		} else if ($this->session->userdata ( 'userState' ) == 2) {
			$data ['result'] = $this->DeviceType->getRows ();
			
			$this->load->view ('header');
			$this->load->view ( 'devicetypes/adminview', $data );
		} else {
			redirect ( 'users/login' );
		}
	}
	public function addDeviceType() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$this->form_validation->set_rules ( 'typename', 'TypeName', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->DeviceType->setType ();
			redirect ( 'DeviceTypes/viewDeviceType' );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ('header');
		$this->load->view ( 'devicetypes/adddevicetype' );
	}
	public function editDeviceType() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		
		$typeid = $this->uri->segment ( 3 );
		$type = $this->db->get_where ( 'devicetype', array (
				'id' => $typeid
		) );
		$query = $type->result_array();
		$data['result']=$query['0'];
		
		$id = $this->uri->segment ( 3 );
		if (empty ( $id )) {
			show_404 ();
		}
		
		$data ['typename'] = $this->DeviceType->getTypeById ( $id );
		$this->form_validation->set_rules ( 'typename', 'TypeName', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->DeviceType->setType ();
			redirect ( 'DeviceTypes/viewDeviceType' );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ('header');
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
		
		$this->DeviceType->delete ( $id );
		redirect ( 'DeviceTypes/viewDeviceType' );
	}
}