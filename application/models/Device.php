<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Device extends CI_Model{
    function __construct() {
    	$this->load->database();
    }
    
    function getRows(){
    	
    	$curslug = $this->session->userdata('slug');
    	$type = $this->db->get_where('devicetype', array('slug' => $curslug));
    	$query = $type->result();
    	$id = $query['0']->id;
    	$result = $this->db->get_where('device', array('devicetypeid' => $id));
    	return $result->result();
    }
    
    function getdevicebyid($id)
    {
    	if ($id == 0)
    	{
    		$result = $this->db->get('device');
    		return $result->result();
    	}
    	$result = $this->db->get_where('device', array('id' => $id));
    	return $result->result();
    }
    
    public function setDevice($id) {
    
    	$curslug = $this->session->userdata('slug');
    	$type = $this->db->get_where('devicetype', array('slug' => $curslug));
    	$query = $type->result();
    	$typeid = $query['0']->id;
    	$id = $this->uri->segment(3);
    	
    	$data = array(
    			'devicetypeid' => $typeid,
    			'devicename' => $this->input->post('devicename'),
    			'brand' => $this->input->post('brand'),
    			'location' => $this->input->post('location'),
    			'acqdate' => $this->input->post('acqdate')
    	);
    	
    	if($id == false){
    		return $this->db->insert('device', $data);;
    	}else{
    		$this->db->where('id', $id);
            return $this->db->update('device', $data);
    	}
    }
    
    public function delete($id) {
    	
    	$this->db->where('id', $id);
    	 return $this->db->delete('device');    	
    }
}