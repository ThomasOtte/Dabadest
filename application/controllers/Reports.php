<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Reports extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'Report' );
	}
	public function viewReport() {
		if ($this->session->userdata ( 'malfid' ) == 0) {
			$malfid = $this->uri->segment ( 3 );
			$this->session->set_userdata ( 'malfid', $malfid );
		}
		
		$data = array ();
		if ($this->session->userdata ( 'userState' ) == 1 || $this->session->userdata ( 'userState' ) == 2 ) {
			$data ['result'] = $this->Report->getRows ();
			if ($data ['result'] == null)
			{
				$this->session->set_userdata ('noreport', true);
				redirect ( 'Reports/addReport' );
			}
			$this->load->view ('header');
			$this->load->view ( 'reports/view', $data );
		} else {
			redirect ( 'users/login' );
		}
	}
	public function addReport() {
		if ($this->session->userdata ( 'userState' ) !=1 && $this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		if ($this->session->userdata ('noreport') == true)
		{
			$this->session->set_userdata ('noreport') == false ;
		}
		$curmalfid = $this->session->userdata ( 'malfid' );
		
		$this->form_validation->set_rules ( 'description', 'Description', 'required' );

		
		if ($this->form_validation->run () == true) {
			
			$this->Report->setReport ();
			redirect ( base_url () . 'reports/viewreport/' . $curslug );
		} else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ('header');
		$this->load->view ( 'reports/addreport' );
	}
	public function editReport() {
		if ($this->session->userdata ( 'userState' ) != 1 && $this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		$malfunction = $this->db->get ( 'malfunction' );
		$query = $malfunction->result ();
		$id = $query ['0']->id;
		$curmalfid = $this->session->userdata ( 'malfid' );
		
		$reportid = $this->uri->segment ( 3 );
		$report = $this->db->get_where ( 'report', array (
				'id' => $reportid
		) );
		$query = $report->result_array();
		$data['result']=$query['0'];
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$data ['reportname'] = $this->Report->getReportById ( $id );
		$this->form_validation->set_rules ( 'description', 'Description', 'required' );
		
		if ($this->form_validation->run () == true) {
			
			$this->Report->setReport ();
			redirect ( base_url () . 'Reports/viewReport/' . $curmalfid );
		} 

		else {
			$data ['error_msg'] = 'Some problems occured, please try again.';
		}
		
		$this->load->view ('header');
		$this->load->view ( 'reports/addreport', $data );
	}
	public function delete() {
		if ($this->session->userdata ( 'userState' ) != 1 && $this->session->userdata ( 'userState' ) != 2) {
			redirect ( 'users/login' );
		}
		
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$this->Report->delete ( $id );
		redirect ( base_url () . 'Malfunctions/viewMalfunction/');
	}
}