<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin_model extends CI_Model {
	
	public function signin($correo, $password, $password2){
		$retorno=false;
		
		if($password === $password2){
			
			$this->db->select('count(*) as cantidad');
			$this->db->from('usuarios');
			$this->db->where('correo', $correo);
			$result=$this->db->get();
			$cantidad=$result->result_array();
			if($cantidad[0]["cantidad"]==0){
				$this->db->insert('usuarios', array("correo"=>$correo,"password"=>$password));

				$retorno=true;
			}
		}
		return $retorno;
	}
}