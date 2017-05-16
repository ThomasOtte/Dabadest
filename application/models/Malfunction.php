<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Malfunction extends CI_Model {
	function __construct() {
		$this->load->database ();
	}
	function getRows() {
		$result = $this->db->get ( 'malfunction' );
		return $result->result ();
	}
	function getMalfunctionById($id) {
		if ($id == 0) {
			$result = $this->db->get ( 'malfunction' );
			return $result->result ();
		}
		$result = $this->db->get_where ( 'malfunction', array (
				'id' => $id 
		) );
		return $result->result ();
	}
	public function addMalfunction($id) {
		$deviceid = $this->uri->segment ( 3 );
		
		$device = $this->db->get_where ( 'device', array (
				'id' => $deviceid
		) );
		$query = $device->result ();
		$deviceid = $query ['0']->id;
		$devicebrand = $query ['0']->brand;
		$devicelocation = $query ['0']->location;
		$devicename = $query ['0']->devicename;
		
		$data = array (
				'deviceid' => $deviceid,
				'devicebrand' => $devicebrand,
				'devicelocation' => $devicelocation,
				'devicename' => $devicename,
				'date' => $this->input->post ( 'date' ),
				'time' => $this->input->post ( 'time' ),
				'fixed' => $this->input->post ( 'fixed' ),
				'priority' => $this->input->post ( 'priority' )
		);
		
		return $this->db->insert ( 'malfunction', $data );

	}
	public function editMalfunction($id) {
		$id = $this->uri->segment ( 3 );
	
		$malfunction = $this->db->get_where ( 'malfunction', array (
				'id' => $id
		) );
		$query = $malfunction->result ();
		$deviceid = $query ['0']->deviceid;
		$devicebrand = $query ['0']->devicebrand;
		$devicelocation = $query ['0']->devicelocation;
		$devicename = $query ['0']->devicename;
	
		$data = array (
				'deviceid' => $deviceid,
				'devicebrand' => $devicebrand,
				'devicelocation' => $devicelocation,
				'devicename' => $devicename,
				'date' => $this->input->post ( 'date' ),
				'time' => $this->input->post ( 'time' ),
				'fixed' => $this->input->post ( 'fixed' ),
				'priority' => $this->input->post ( 'priority' )
		);
	
		$this->db->where ( 'id', $id );
		return $this->db->update ( 'malfunction', $data );
		
	}
	public function delete($id) {
		$this->db->where ( 'id', $id );
		return $this->db->delete ( 'malfunction' );
	}
}