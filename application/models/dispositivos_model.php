<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispositivos_model extends CI_Model {
	
	public function estado($ubicacion){

    	$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');

		foreach ($query->result() as $row)
		{
		        if($row->correo === $user ){
		        	$idUser = $row->idusuario;
		        }
		}


	
		$retorno = $this->db->get_where('cajasdetomas', array('usuarios_idusuario' => $idUser));

		foreach ($retorno->result() as $row2)
		{
		       if($row2->ubicacion == $ubicacion){
		       	return $row2->estado;
		       }
		}
    }
	public function agregar($nombreD,$tipo,$ubicacion){
		$retorno = false;
		$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');

		foreach ($query->result() as $row)
		{
		        if($row->correo === $user ){
		        	$idUser = $row->idusuario;
		        }
		}
		
		if($nombreD != ""){

			$dato = array($tipo => $nombreD);
	    	$this->db->where('usuarios_idusuario', $idUser);
	    	$this->db->where('ubicacion', $ubicacion);
			$this->db->update('cajasdetomas', $dato);
			$retorno = true ;
		}
		return $retorno;
    }

    public function eliminar($tipoD, $nombreDisp,$ubicacion){
    	$retorno = false;
		$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');

		foreach ($query->result() as $row)
		{
		        if($row->correo === $user ){
		        	$idUser = $row->idusuario;
		        }
		}
		
		if($tipoD != ""){

			$dato = array($tipoD => "");
	    	$this->db->where('usuarios_idusuario', $idUser);
	    	$this->db->where('ubicacion', $ubicacion);
	    	$this->db->where( $tipoD, $nombreDisp);
			$this->db->update('cajasdetomas', $dato);
			$retorno = true ;
		}
		return $retorno;
    }
    public function editar($nombreD,$tipo,$ubicacion){
    	$retorno = false;
		$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');

		foreach ($query->result() as $row)
		{
		        if($row->correo === $user ){
		        	$idUser = $row->idusuario;
		        }
		}
		
		if($nombreD != ""){

			$dato = array($tipo => $nombreD);
	    	$this->db->where('usuarios_idusuario', $idUser);
	    	$this->db->where('ubicacion', $ubicacion);
			$this->db->update('cajasdetomas', $dato);
			$retorno = true ;
		}
		return $retorno;
    }

}