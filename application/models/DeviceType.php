<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DeviceType extends CI_Model{
    function __construct() {
    	$this->load->database();
    }
    
    function getRows($slug = false){
    	
    	if ($slug == false)
    	{
    	$result = $this->db->get('devicetype');
    	return $result->result();
    	}
    	
    	$result = $this->db->get_where('devicetype', array('slug' => $slug));
    	return $result->result();
    }
    
    function gettypebyid($id)
    {
    	if ($id == 0)
    	{
    		$result = $this->db->get('devicetype');
    		return $result->result();
    	}
    	$result = $this->db->get_where('devicetype', array('id' => $id));
    	return $result->result();
    }
    
    public function setType($id) {
    
    	$slug = url_title($this->input->post('typename'), 'dash', TRUE);
    	$id = $this->uri->segment(3);
    	
    	$data = array(
    			'typename' => $this->input->post('typename'),
    			'slug' => $slug
    	);
    	
    	if($id == false){
    		return $this->db->insert('devicetype', $data);;
    	}else{
    		$this->db->where('id', $id);
            return $this->db->update('devicetype', $data);
    	}
    }
    
    public function delete($id) {
    	
    	$this->db->where('id', $id);
    	 return $this->db->delete('devicetype');    	
    }
}