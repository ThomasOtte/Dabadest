<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DeviceType extends CI_Model{
    function __construct() {
    	$this->deviceTypeTbl = 'devicetype';
    }
    
    function getRows(){
    	$result = $this->db->select('*')->from('devicetype')->get();
    	return $result->result();
    }
    
    public function insert($data = array()) {
    
    	$insert = $this->db->insert($this->deviceTypeTbl, $data);
    
    
    	if($insert){
    		return $this->db->insert_id();;
    	}else{
    		return false;
    	}
    }
}