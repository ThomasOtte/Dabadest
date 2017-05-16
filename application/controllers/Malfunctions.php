<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Malfunctions extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'Malfunction' );
	}
	public function viewMalfunction() {
		$data = array ();
		if ($this->session->userdata ( 'userState' ) == 1) {
			$data ['result'] = $this->Malfunction->getRows ();
			
			$this->load->view ( 'malfunctions/managementview', $data );
		} else if ($this->session->userdata ( 'userState' ) == 2) {
			$data ['result'] = $this->Malfunction->getRows ();
			
			$this->load->view ( 'malfunctions/adminview', $data );
		} else {
			redirect ( 'users/login' );
		}
	}
	public function addMalfunction() {
		if ($this->session->userdata ( 'userState' ) != 2 && $this->session->userdata ( 'userState' ) != 1) {
			redirect ( 'users/login' );
		}
		$this->form_validation->set_rules ( 'date', 'Date', 'required' );
		$this->form_validation->set_rules ( 'time', 'Time', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->Malfunction->addMalfunction ();
			$this->session->set_userdata ( 'success_msg', 'The device has been added' );
			redirect ( 'Malfunctions/viewMalfunction' );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
	    if ($this->session->userdata ( 'userState' ) == 1)
		{
			$this->load->view ( 'malfunctions/managementadd', $data );
		}
		if ($this->session->userdata ( 'userState' ) == 2)
		{
		$this->load->view ( 'malfunctions/adminadd', $data );
		}
	}
	public function editMalfunction() {
		if ($this->session->userdata ( 'userState' ) != 2 && $this->session->userdata ( 'userState' ) != 1) {
			redirect ( 'users/login' );
		}
		$id = $this->uri->segment ( 3 );
		if (empty ( $id )) {
			show_404 ();
		}
		
		$data ['id'] = $this->Malfunction->getMalfunctionById ( $id );
		$this->form_validation->set_rules ( 'date', 'Date', 'required' );
		$this->form_validation->set_rules ( 'time', 'Time', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->Malfunction->editMalfunction ();
			$this->session->set_userdata ( 'success_msg', 'The malfunction has been added' );
			redirect ( 'Malfunctions/viewMalfunction' );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		if ($this->session->userdata ( 'userState' ) == 1)
		{
			$this->load->view ( 'malfunctions/managementadd', $data );
		}
		if ($this->session->userdata ( 'userState' ) == 2)
		{
		$this->load->view ( 'malfunctions/adminadd', $data );
		}
	}
	public function delete() {
		if ($this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$this->Malfunction->delete ( $id );
		redirect ( 'Malfunctions/viewMalfunction' );
	}
}