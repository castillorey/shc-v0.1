<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tomas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->load->view('tomas',$data);
	}
	
	public function agregar(){

		$this->load->model('tomas_model');

		if($this->input->post("btnaAgregarToma")){	

			if(trim($this->input->post("txtUbicacion")) == " "){

				$alert = "Debe ingresar una ubicación.";
				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
			}

			if(trim($this->input->post("txtIdphoton")) == ""){

				$alert = "Debe ingresar el Id del SHC.";
				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
			}
			else if($this->tomas_model->agregar($_POST['txtIdphoton'],$_POST['txtUbicacion'])){

				$alert = "SHC agregado exitosamente.";
				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
			

			}else{
				
				$alert =  "No pueden existir dos ubicaciones con el mismo nombre.<br>
				 <b>Consejo:</b> Enumere sus SHC de una misma zona. Ej: Sala 1, Sala 2, etc.";
				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
			}	
		}
	}
	public function encender_apagar($ubicacion){
		$this->load->model('dispositivos_model');
		$this->dispositivos_model->encender_apagar($ubicacion);
		redirect('escritorio');
	}
	public function encender($ubicacion){
		$this->load->model('dispositivos_model');
		if(!$this->dispositivos_model->encender($ubicacion)){
			$alert = "El dispositivo ya se encuentra encendido";
			$this->session->set_userdata('alert',$alert);
		}
			
		redirect('escritorio');
	}
	public function apagar($ubicacion){
		$this->load->model('dispositivos_model');
		if(!$this->dispositivos_model->apagar($ubicacion)){
			$alert = "El dispositivo ya se encuentra apagado";
			$this->session->set_userdata('alert',$alert);
		}
		
		redirect('escritorio');
	}
	public function eliminar($ubicacion){
		$this->load->model('tomas_model');
		$this->tomas_model->eliminar($ubicacion);
		redirect('escritorio');
		
	}

}