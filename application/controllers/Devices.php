<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Devices extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'Device' );
	}
	public function viewDevice() {
		if ($this->session->userdata ( 'slug' ) == 0) {
			$slug = $this->uri->segment ( 3 );
			$this->session->set_userdata ( 'slug', $slug );
		}
		
		$data = array ();
		if ($this->session->userdata ( 'userState' ) == 1) {
			$data ['result'] = $this->Device->getRows ();
			$this->load->view ( 'devices/managementview', $data );
		} else if ($this->session->userdata ( 'userState' ) == 2) {
			$data ['result'] = $this->Device->getRows ();
			
			$this->load->view ( 'devices/adminview', $data );
		} else {
			redirect ( 'users/login' );
		}
	}
	public function addDevice() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$curslug = $this->session->userdata ( 'slug' );
		
		$this->form_validation->set_rules ( 'brand', 'Brand', 'required' );
		$this->form_validation->set_rules ( 'devicename', 'DeviceName', 'required' );
		$this->form_validation->set_rules ( 'location', 'Location', 'required' );
		$this->form_validation->set_rules ( 'acqdate', 'AcqDate', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->Device->setDevice ();
			$this->session->set_userdata ( 'success_msg', 'The device has been added' );
			redirect ( base_url () . 'devices/viewdevice/' . $curslug );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ( 'devices/adddevice' );
	}
	public function editDevice() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$type = $this->db->get ( 'devicetype' );
		$query = $type->result ();
		$id = $query ['0']->id;
		$curslug = $this->session->userdata ( 'slug' );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$data ['devicename'] = $this->Device->getDeviceById ( $id );
		$this->form_validation->set_rules ( 'brand', 'Brand', 'required' );
		$this->form_validation->set_rules ( 'devicename', 'DeviceName', 'required' );
		$this->form_validation->set_rules ( 'location', 'Location', 'required' );
		$this->form_validation->set_rules ( 'acqdate', 'AcqDate', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->Device->setDevice ();
			$this->session->set_userdata ( 'success_msg', 'The device has been added' );
			redirect ( base_url () . 'Devices/viewDevice/' . $curslug );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ( 'devices/adddevice', $data );
	}
	public function delete() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		
		$curslug = $this->session->userdata ( 'slug' );
		
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$this->Device->delete ( $id );
		redirect ( base_url () . 'Devices/viewDevice/' . $curslug );
	}
}