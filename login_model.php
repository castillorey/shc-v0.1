<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function login($correo,$password){
		$this->db->where('correo', $correo);
		$this->db->where('password', $password);	
		$q = $this->db->get('usuarios');
		if($q->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}