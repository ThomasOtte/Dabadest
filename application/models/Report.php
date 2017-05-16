<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Report extends CI_Model {
	function __construct() {
		$this->load->database ();
	}
	function getRows() {
		$curmalfid = $this->session->userdata ( 'malfid' );
		$malfunction = $this->db->get_where ( 'malfunction', array (
				'id' => $curmalfid 
		) );
		$query = $malfunction->result ();
		$id = $query ['0']->id;
		$result = $this->db->get_where ( 'report', array (
				'malfunctionid' => $id 
		) );
		return $result->result ();
	}
	function getReportById($id) {
		if ($id == 0) {
			$result = $this->db->get ( 'report' );
			return $result->result ();
		}
		$result = $this->db->get_where ( 'report', array (
				'id' => $id 
		) );
		return $result->result ();
	}
	public function setReport($id) {
		$curmalfid = $this->session->userdata ( 'malfid' );
		$malfunction = $this->db->get_where ( 'malfunction', array (
				'id' => $curmalfid
		) );
		$query = $malfunction->result ();
		$malfid = $query ['0']->id;
		$id = $this->uri->segment ( 3 );
		
		$data = array (
				'malfunctionid' => $malfid,
				'description' => $this->input->post ( 'description' ),
				'cause' => $this->input->post ( 'cause' ),
				'solution' => $this->input->post ( 'solution' ),
				'date' => $this->input->post ( 'date' ),
				'time' => $this->input->post ( 'time' )
		);
		
		if ($id == false) {
			return $this->db->insert ( 'report', $data );
			;
		} else {
			$this->db->where ( 'id', $id );
			return $this->db->update ( 'report', $data );
		}
	}
	public function delete($id) {
		$this->db->where ( 'id', $id );
		return $this->db->delete ( 'report' );
	}
}