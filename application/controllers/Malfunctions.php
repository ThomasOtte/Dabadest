<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Malfunctions extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'Malfunction' );
	}
	public function viewMalfunction() {
		$data = array ();
		$this->session->unset_userdata('malfid');
		if ($this->session->userdata ( 'userState' ) == 1 || $this->session->userdata ( 'userState' ) == 2) {
			$data ['result'] = $this->Malfunction->getRows ();
			$this->load->view ('header');
			$this->load->view ( 'malfunctions/view', $data );
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
			redirect ( 'Malfunctions/viewMalfunction' );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
	    if ($this->session->userdata ( 'userState' ) == 1)
		{
			$this->load->view ('header');
			$this->load->view ( 'malfunctions/managementadd', $data );
		}
		if ($this->session->userdata ( 'userState' ) == 2)
		{
		$this->load->view ('header');
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
			redirect ( 'Malfunctions/viewMalfunction' );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		if ($this->session->userdata ( 'userState' ) == 1 || $this->session->userdata ( 'userState' ) == 2)
		{
			$malfid = $this->uri->segment ( 3 );
			$malfunction = $this->db->get_where ( 'malfunction', array (
					'id' => $malfid
			) );
			$query = $malfunction->result_array();
			$data['result']=$query['0'];
			
			if ($this->session->userdata ( 'userState' ) == 1)
			{
				$this->load->view ('header');
				$this->load->view ( 'malfunctions/managementadd', $data );
			}
			else
			{
			$this->load->view ('header');
			$this->load->view ( 'malfunctions/adminadd', $data );
			}
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