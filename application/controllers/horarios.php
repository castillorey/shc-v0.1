<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horarios extends CI_Controller {


	public function index()
	{	

	if(!$this->session->userdata('usuario')){
		redirect('login');
	}
	if(!isset($_SESSION['alert'])){
		$this->session->set_userdata('alert');		
	}
	
	$data['seccionSHC'] = "";
	$data['seccionDisp'] = "";
	$data['seccionHorarios'] = "active";
	$data['tipoSeccion'] = 'Horarios';

	$data["user"] = $this->session->userdata('usuario');
	$data["alert"] = $this->session->userdata('alert');

	$this->load->model('horarios_model');

	$this->load->view('cabecera',$data);
		$this->load->view('menu');

		$this->load->view('cabecera-contenido',$data);

			$data["horarios"] = $this->horarios_model->listar();

			if($data['horarios'] != null){
				$this->load->view('horarios',$data);
			}else{
				$this->load->view('sinHorarios');
			}

			$this->load->view('modal-horarios-cabecera');		
			$this->load->view('modal-horarios-pie',$data);	
			$this->load->view('modal-agregar-horario',$data);
			
		$this->load->view('pie-contenido');
		
		$this->session->set_userdata('alert');
	$this->load->view('pie');
	}

	public function agregar(){
		$this->load->model('horarios_model');

		if($this->input->post("btnAgregrHorario")){

			if($this->input->post("cmbDias") == "none"){
				
					$alert = "Seleccione un día de la semana.";
				
				$this->session->set_userdata('alert', $alert);
				redirect("tomas");
				

			}
			else{

				if($this->horarios_model->agregar($this->input->post("cmbDias"),$this->input->post("txtHoraInicio"),$this->input->post("txtHoraFin"),$this->input->post("txtUbicacionTomas"))){
					$alert = "Horario agregado";
					$this->session->set_userdata('alert', $alert);
					redirect("tomas");
				}
			}
		}
	}
	public function eliminar($id){
		$this->load->model('horarios_model');

		if($this->horarios_model->eliminar($id)){
			redirect('tomas');
		}else{
			$alert = "No se pudo eliminar";
			$this->session->set_userdata('alert', $alert);
		}
		
	}
	public function listarUbicaciones(){
		$this->load->model('horarios_model');
	}
	public function validarHorario($ubicacion){
		$this->load->model('horarios_model');

		if($this->horarios_model->verificar()){
			redirect('tomas/deshabilitar/'.$ubicacion);
		}
		else{
			$alert = "No hay horarios por cumplir para <b>" .$ubicacion."</b>";
			$this->session->set_userdata('alert', $alert);
			redirect('tomas');
		}
	}

}