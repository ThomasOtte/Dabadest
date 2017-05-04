<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DeviceType extends CI_Model{
    function __construct() {
    }
    
    function getRows(){
    	$result = $this->db->select('*')->from('devicetype')->get();
    	return $result->result();
    }
}