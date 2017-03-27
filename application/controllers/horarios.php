<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horarios extends CI_Controller {


	public function index()
	{	
		
	}

	public function agregar(){
		$this->load->model('horarios_model');

		if($this->input->post("btnAgregrHorario")){

			if($this->input->post("cmbDias") == "none"){
				
					$alert = "Seleccione un día de la semana.";
				
				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
				

			}
			else{

				if($this->horarios_model->agregar($this->input->post("cmbDias"),$this->input->post("txtHoraInicio"),$this->input->post("txtHoraFin"),$this->input->post("txtUbicacionTomas"))){
					redirect("escritorio");
				}
			}
		}
	}
	public function eliminar($id){
		$this->load->model('horarios_model');

		if($this->horarios_model->eliminar($id)){
			redirect('escritorio');
		}else{
			$alert = "No se pudo eliminar";
			$this->session->set_userdata('alert', $alert);
		}
		
	}
	public function listarUbicaciones(){
		$this->load->model('horarios_model');
	}
	public function verificar($ubicacion){
		$this->load->model('horarios_model');

		if($this->horarios_model->verificar()){
			redirect('tomas/encender_apagar/'.$ubicacion);
		}
		else{
			$alert = "No hay horarios por cumplir";
			$this->session->set_userdata('alert', $alert);
			redirect('escritorio');
		}
	}

}