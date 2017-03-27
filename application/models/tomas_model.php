<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tomas_model extends CI_Model {

	public function listar(){
    	$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');

		foreach ($query->result() as $row)
		{
		        if($row->correo === $user ){
		        	$idUser = $row->idusuario;
		        }
		}

    	
    	$tomas = array();

		
		$this->db->select('ubicacion,estadohorario,dispositivo1,dispositivo2,estado');
		$retorno = $this->db->get_where('cajasdetomas', array('usuarios_idusuario' => $idUser));
		
		$tomas=$retorno->result_array();
		

		return $tomas;
    }
    public function listarUbicacion(){
    	$ubicTomas = array();

		
		$this->db->select('ubicacion');
		$query = $this->db->get('cajasdetomas');
		
		$ubicTomas=$query->result_array();
		

		return $ubicTomas;
    }
	public function agregar($idPh,$ubicacion){
    	$retorno=false;
		
			$this->db->select('count(*) as cantidad');
			$this->db->from('cajasdetomas');
			$this->db->where('ubicacion', $ubicacion);
			$result=$this->db->get();
			$cantidad=$result->result_array();

			if($cantidad[0]["cantidad"]==0){

				$user = $this->session->userdata('usuario');
				$query = $this->db->get_where('usuarios', array("correo" => $user));

				foreach ($query->result() as $row)
				{
				       if($row->correo == $user){
				       	$idUsuario = $row->idusuario;
				       }
				}



				$this->db->from('cajasdetomas');
				$this->db->where('usuarios_idusuario', $idUsuario);
				$this->db->insert('cajasdetomas', array("idphoton"=>$idPh,"ubicacion"=>$ubicacion, "usuarios_idusuario"=>$idUsuario,"dispositivo1"=>"","dispositivo2"=>""));

				$retorno=true;
			}
			
			
		
		return $retorno;
    }
    public function eliminar($ubicacion){
    		$this->db->delete('cajasdetomas', array('ubicacion' => $ubicacion));
    }


}