<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tomas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		if(!$this->session->userdata('usuario')){
			redirect('login');
		}
		if(!isset($_SESSION['alert'])){
			$this->session->set_userdata('alert');		
		}
		
		$data['seccionSHC'] = "active";
		$data['seccionDisp'] = "";
		$data['seccionHorarios'] = "";
		$data['tipoSeccion'] = "SHC's";
		
		$data["user"] = $this->session->userdata('usuario');
		$data["alert"] = $this->session->userdata('alert');


		$this->load->model('tomas_model');
		$this->load->model('horarios_model');

		$data["horarios"] = $this->horarios_model->listar();

		$tomas = $this->tomas_model->listar();
			

		$this->load->view('cabecera',$data);
		$this->load->view('menu');
			$this->load->view('cabecera-contenido',$data);

				$this->load->view('cabecera-tomas',$data);

				if($tomas != null){

					if($data['alert'] != ""){
						$this->load->view('alert',$data);
					}
					
					foreach ($tomas as $toma){

							$data['tomas'] = $tomas;
							$data['ubicacion'] = $toma['ubicacion'];
							$data['colorBg'] = $toma['colorBg'];
							$data['nombreD1'] = $toma['dispositivo1']; 
							$data['nombreD2'] = $toma['dispositivo2']; 

							// Imagen Dispositivo 1

							if($data['nombreD1'] == ""|| $data['nombreD1'] == "tv" || $data['nombreD1'] == "estereo" || $data['nombreD1'] == "lampara" || $data['nombreD1'] == "ventilador" || $data['nombreD1'] == "lavadora" || $data['nombreD1'] == "videojuego" || $data['nombreD1'] == "micro" ){

								$data['imgD1'] = base_url("img/".$toma['dispositivo1'].".svg");
							}else{

								$data['imgD1'] = base_url("img/flash.svg");
							}


							//Imagen Dispositivo 2

							if($data['nombreD2'] == ""|| $data['nombreD2'] == "tv" || $data['nombreD2'] == "estereo" || $data['nombreD2'] == "lampara" || $data['nombreD2'] == "ventilador" || $data['nombreD2'] == "lavadora" || $data['nombreD2'] == "videojuego" || $data['nombreD2'] == "micro" ){

								$data['imgD2'] = base_url("img/".$toma['dispositivo2'].".svg");
							}else{

								$data['imgD2'] = base_url("img/flash.svg");
							}

							//Imagen del Switch

							if($toma["estado"] == "1"){

								$data['imgSwitch'] = base_url("img/switch-on.svg");
							}else{

								$data['imgSwitch'] = base_url("img/switch-off.svg");
							}
							

							//Toma Full
							if($toma['dispositivo1'] != "" && $toma['dispositivo2'] != ""){
								$this->load->view('cabecera-panel',$data);
								$this->load->view('toma-full',$data);	
							}
							//Toma vacio
							else if($toma['dispositivo1'] == "" && $toma['dispositivo2'] == ""){
								$this->load->view('cabecera-panel',$data);
								$this->load->view('toma-vacio',$data);
								

							}
							//Toma con Dispositivo 1
							else if($toma['dispositivo1'] != "" && $toma['dispositivo2'] == ""){
								$this->load->view('cabecera-panel',$data);
								$this->load->view('toma-full-izqu',$data);
								


							}
							//Toma con Dispositivo 2
							else if($toma['dispositivo1'] == "" && $toma['dispositivo2'] != ""){
								$this->load->view('cabecera-panel',$data);
								$this->load->view('toma-full-der',$data);

							}

						$this->load->view('modal-agregar-disp-1',$data);
						$this->load->view('modal-agregar-disp-2',$data);
						$this->load->view('modal-editar-disp-1',$data);
						$this->load->view('modal-editar-disp-2',$data);
					}

				}else{
					$this->load->view('sinTomas',$data);
				}
					//Modal ver Horarios   						
					$this->load->view('modal-horarios-cabecera');// Modal 3

						if($data['horarios'] != null){
							$this->load->view('horarios',$data);
						}else{
							$this->load->view('sinHorarios');
						}
					
					$this->load->view('modal-horarios-pie',$data);


				$this->load->view('modal-agregar-horario',$data); //modal 2
				$this->load->view('modal-tomas',$data); //Modal 1
			$this->load->view('pie-contenido');
		$this->session->set_userdata('alert');
		$this->load->view('pie');
	}
	
	public function agregar(){

		$this->load->model('tomas_model');

		if($this->input->post("btnaAgregarToma")){	

			if(trim($this->input->post("txtUbicacion")) == ""){

				$alert = "Debe ingresar una ubicación.";
				$this->session->set_userdata('alert', $alert);
				redirect("tomas");
			}

			if(trim($this->input->post("txtIdphoton")) == ""){

				$alert = "Debe ingresar el Id del SHC.";
				$this->session->set_userdata('alert', $alert);
				redirect("tomas");
			}
			else if($this->tomas_model->agregar($_POST['txtIdphoton'],$_POST['txtUbicacion'])){

				$alert = "SHC agregado. ";
				$this->session->set_userdata('alert', $alert);
				redirect("tomas");
			

			}else{
				
				$alert =  "No pueden existir dos ubicaciones con el mismo nombre.<br>
				 <b>Consejo:</b> Enumere sus SHC de una misma zona. Ej: Sala 1, Sala 2, etc.";
				$this->session->set_userdata('alert', $alert);
				redirect("tomas");
			}	
		}
	}
	public function deshabilitar($ubicacion){
		$this->load->model('tomas_model');
		if($this->tomas_model->deshabilitar($ubicacion)){

			$alert =  "SHC <b>" .$ubicacion ."</b> deshabilitado";
			$this->session->set_userdata('alert', $alert);
			redirect('tomas');
		}else{

			$alert =  "SHC <b>" .$ubicacion ."</b> ya se encuentra deshabilitado";
			$this->session->set_userdata('alert', $alert);
			redirect('tomas');
		}
		
				
	}
	public function habilitar($ubicacion){
		$this->load->model('tomas_model');
		if(!$this->tomas_model->habilitar($ubicacion)){
			$alert = "El dispositivo ya se encuentra habilitado";
			$this->session->set_userdata('alert',$alert);
		}
			
		redirect('tomas');
	}

	public function habilitar_deshabilitar($ubicacion){
		$this->load->model('tomas_model');

		if(!$this->tomas_model->habilitar_deshabilitar($ubicacion)){
			$alert = "Error al habilitar/deshabilitar ".$ubicacion."";
			$this->session->set_userdata('alert',$alert);
		}

		redirect('tomas');
	}
	
	public function eliminar($ubicacion){
		$this->load->model('tomas_model');
		$this->tomas_model->eliminar($ubicacion);
		$alert = "SHC Eliminado.";
			$this->session->set_userdata('alert', $alert);
		redirect('tomas');
		
	}

}