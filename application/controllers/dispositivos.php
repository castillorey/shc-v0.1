<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispositivos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
	}
	public function agregar(){
		$this->load->model('dispositivos_model');

		if($this->input->post("btnagregarDisp")){

			if($this->input->post('selTipoDisp') == "none"){
				
					$alert = "Debe seleccionar un tipo de dispositivo.";

				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
			}

			if($this->input->post('selTipoDisp') == "otro"){

				if(trim($this->input->post("txtAgregarOtro")) == ""){
					
					$alert ="Digite un nombre para el dispositivo.";

				$this->session->set_userdata('alert', $alert);
				redirect("escritorio");
				

				}else{

					if($this->dispositivos_model->agregar($this->input->post("txtAgregarOtro"),$this->input->post("txtTipoD"),$this->input->post("txtUbic"))){
					redirect("escritorio");
					}

				}
				

			}

			else{

				if($this->dispositivos_model->agregar($_POST['selTipoDisp'],$_POST['txtTipoD'],$_POST['txtUbic'])){
					redirect("escritorio");
				}
			}
		}
	}
	
	
}