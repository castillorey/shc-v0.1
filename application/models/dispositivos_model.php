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
    public function encender_apagar($ubicacion){
		$retorno = false;

		$user = $this->session->userdata('usuario');
    	$usuarios = $this->db->get('usuarios');

		foreach ($usuarios->result() as $usuario)
		{
		        if($usuario->correo === $user ){
		        	$idUser = $usuario->idusuario;
		        }
		}


	
		$tomas = $this->db->get_where('cajasdetomas', array('usuarios_idusuario' => $idUser));

			foreach ($tomas->result() as $toma)
			{
			       if($toma->ubicacion == $ubicacion){
			       	$idPh =  $toma->idphoton;  
			       	$estado = $toma->estado;   
			       }
			}

		if(!$estado){
			
			$this->db->set('estado', '1');
			$this->db->where('idPhoton', $idPh);
			$this->db->update('cajasdetomas'); 

			$accion = "on";
			$retorno = true;
		}
		else{

			$this->db->set('estado', '0');
			$this->db->where('idPhoton', $idPh);
			$this->db->update('cajasdetomas'); 

			$accion = "off";
			$retorno = true;	
		}

		$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://api.particle.io/v1/devices/".$idPh."/led");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=0ca5fbbf3cc734789750146ddfe0c73c46e0863b&params=".$accion);
			curl_setopt($ch, CURLOPT_POST, 1);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);

	return $retorno;
			
	}

	public function encender($ubicacion){
		$retorno = false;

		$user = $this->session->userdata('usuario');

    	$usuarios = $this->db->get('usuarios');

		foreach ($usuarios->result() as $usuario)
		{
		        if($usuario->correo === $user ){
		        	$idUser = $usuario->idusuario;
		        }
		}


	
		$tomas = $this->db->get_where('cajasdetomas', array('usuarios_idusuario' => $idUser));

		foreach ($tomas->result() as $toma)
		{
		       if($toma->ubicacion == $ubicacion){
		       	$idPh =  $toma->idphoton;  
		       	$estado = $toma->estado;   
		       }
		}

		if(!$estado){
			
			$this->db->set('estado', '1');
			$this->db->where('idPhoton', $idPh);
			$this->db->update('cajasdetomas'); 

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://api.particle.io/v1/devices/".$idPh."/led");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=0ca5fbbf3cc734789750146ddfe0c73c46e0863b&params=on");
			curl_setopt($ch, CURLOPT_POST, 1);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);

			$retorno = true;
		}
		
		return $retorno;
	}
	public function apagar($ubicacion){
		$retorno = false;

		$user = $this->session->userdata('usuario');

    	$usuarios = $this->db->get('usuarios');

		foreach ($usuarios->result() as $usuario)
		{
		        if($usuario->correo === $user ){
		        	$idUser = $usuario->idusuario;
		        }
		}


	
		$tomas = $this->db->get_where('cajasdetomas', array('usuarios_idusuario' => $idUser));

		foreach ($tomas->result() as $toma)
		{
		       if($toma->ubicacion == $ubicacion){
		       	$idPh =  $toma->idphoton;  
		       	$estado = $toma->estado;   
		       }
		}

		if($estado){
			
			$this->db->set('estado', '0');
			$this->db->where('idPhoton', $idPh);
			$this->db->update('cajasdetomas'); 

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://api.particle.io/v1/devices/".$idPh."/led");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=0ca5fbbf3cc734789750146ddfe0c73c46e0863b&params=on");
			curl_setopt($ch, CURLOPT_POST, 1);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);

			$retorno = true;
		}
		
		return $retorno;
	}

}