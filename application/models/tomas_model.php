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

		
		$this->db->select('ubicacion,estadohorario,dispositivo1,dispositivo2,estado,colorBg');
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
    	
		$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');
		foreach ($query->result() as $row)
		{
		       if($row->correo == $user){
		       	$idUsuario = $row->idusuario;
		       }
		}

			$arrayColors = array("#607D8B", "#FFC107","#FF9800","#009688","#4CAF50","#2196F3","#3F51B5","#F44336");
			$colorRandom = $arrayColors[rand(0,7)];

			$this->db->select('count(*) as cantidad');
			$this->db->from('cajasdetomas');
			$this->db->where('usuarios_idusuario', $idUsuario);
			$this->db->where('ubicacion', $ubicacion);
			$result=$this->db->get();
			$cantidad=$result->result_array();

			if($cantidad[0]["cantidad"]==0){

				$this->db->from('cajasdetomas');
				$this->db->where('usuarios_idusuario', $idUsuario);
				$this->db->insert('cajasdetomas', array("idphoton"=>$idPh,"ubicacion"=>$ubicacion, "usuarios_idusuario"=>$idUsuario,"dispositivo1"=>"","dispositivo2"=>"","colorBg"=>$colorRandom));

				$retorno=true;
			}
			
			
		
		return $retorno;
    }

    public function eliminar($ubicacion){
    	$user = $this->session->userdata('usuario');

    	$query = $this->db->get('usuarios');
		foreach ($query->result() as $row)
		{
		       if($row->correo == $user){
		       	$idUsuario = $row->idusuario;
		       }
		}
		$this->db->delete('cajasdetomas', array('ubicacion' => $ubicacion));
		$this->db->delete('horarios', array('usuarios_idusuario' => $idUsuario));
    }

    public function habilitar($ubicacion){
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
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=ced0b3245906d5967028e7c666aaa29a2dd4713b&params=on");
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
	
	public function deshabilitar($ubicacion){
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
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=ced0b3245906d5967028e7c666aaa29a2dd4713b&params=off");
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

    public function habilitar_deshabilitar($ubicacion){
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
			curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=ced0b3245906d5967028e7c666aaa29a2dd4713b&params=".$accion);
			curl_setopt($ch, CURLOPT_POST, 1);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);

	return $retorno;
			
	}


}