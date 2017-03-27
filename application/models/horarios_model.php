<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horarios_model extends CI_Model {
	
	public function listar(){
    	$horarios = array();

		
		$this->db->select('idhorario,dia , hora_encendido , hora_apagado , ubicacionCajadetomas');
		$query = $this->db->get('horarios');
		
		$horarios=$query->result_array();
		

		return $horarios;
    }
    public function listarUbicaciones(){
    	$ubicTomas = array();

		
		$this->db->select('ubicacion');
		$query = $this->db->get('cajasdetomas');
		
		$ubicTomas=$query->result_array();
		

		return $ubicTomas;
    }
    public function verificar(){
		date_default_timezone_set('America/Bogota');
		setlocale(LC_ALL,"es_CO");	
		$HA=date("H:i:s");	
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
		$D=$dias[date("w")];
		$this->db->select('*');
		$this->db->from('horarios as h');
		$this->db->where('h.dia', $D);
		$this->db->where('h.hora_encendido <', $HA);
		$this->db->where('h.hora_apagado >', $HA);
		$q = $this->db->get();
		if($q->num_rows()>0){
			return true;
		}else{
			return false;
		}	
	}
	public function agregar($dia,$horaInicio,$horaFin,$ubicacion){
    	$retorno = false;
		
			
			$query = $this->db->get_where('cajasdetomas', array("ubicacion" => $ubicacion));

			foreach ($query->result() as $row)
				{
				       if($row->ubicacion == $ubicacion){
				       	$idCT = $row->idcajasdetomas;
				       }
				}

			if($this->db->insert('horarios', array("dia"=>$dia,"hora_encendido"=>$horaInicio, "hora_apagado"=>$horaFin,"cajasdetomas_idcajasdetomas"=>$idCT,"ubicacionCajadetomas"=>$ubicacion))){
				$retorno=true;
			}

			
		
		return $retorno;
    }
    public function eliminar($idhorario){
    	
    	$this->db->delete('horarios', array('idhorario' => $idhorario));
    	return true;
    }
}