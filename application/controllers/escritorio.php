<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escritorio extends CI_Controller {
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
		$data["home"]= "";
		$data["login"]= "";
		$data["disp"]= "active";
		$data["user"] = $this->session->userdata('usuario');
		$data["alert"] = $this->session->userdata('alert');


		$this->load->model('tomas_model');
		$this->load->model('horarios_model');

		$data["horarios"] = $this->horarios_model->listar();

		$tomas = $this->tomas_model->listar();
			

		$this->load->view('cabecera-escritorio',$data);
		$this->load->view('menu');

			$this->load->view('cabecera-tomas',$data);

			if($tomas != null){

				if($data['alert'] != ""){
					$this->load->view('alert',$data);
				}
				
				foreach ($tomas as $toma){

						$data['tomas'] = $tomas;
						$data['ubicacion'] = $toma['ubicacion'];
						$data['nombreD1'] = $toma['dispositivo1']; 
						$data['nombreD2'] = $toma['dispositivo2']; 

						if($toma["estado"] == "1"){
							if(($data['nombreD1'] == ""|| $data['nombreD1'] == "tv" || $data['nombreD1'] == "stereo" || $data['nombreD1'] == "lamp" || $data['nombreD1'] == "cooler" || $data['nombreD1'] == "lavadora" || $data['nombreD1'] == "joystick" ) && ($data['nombreD2'] == "" ||$data['nombreD2'] == "tv" || $data['nombreD2'] == "stereo" || $data['nombreD2'] == "lamp" || $data['nombreD2'] == "cooler" || $data['nombreD2'] == "lavadora" || $data['nombreD2'] == "joystick" )){

								$data['imgD1'] = base_url("img/".$toma['dispositivo1']."-green.svg");
								$data['imgD2'] = base_url("img/".$toma['dispositivo2']."-green.svg");
							}else{

								$data['imgD1'] = base_url("img/flash-green.svg");
								$data['imgD2'] = base_url("img/flash-green.svg");
							}		
						}else{
							if(($data['nombreD1'] == ""|| $data['nombreD1'] == "tv" || $data['nombreD1'] == "stereo" || $data['nombreD1'] == "lamp" || $data['nombreD1'] == "cooler" || $data['nombreD1'] == "lavadora" || $data['nombreD1'] == "joystick" ) && ($data['nombreD2'] == "" ||$data['nombreD2'] == "tv" || $data['nombreD2'] == "stereo" || $data['nombreD2'] == "lamp" || $data['nombreD2'] == "cooler" || $data['nombreD2'] == "lavadora" || $data['nombreD2'] == "joystick" )){

								$data['imgD1'] = base_url("img/".$toma['dispositivo1'].".svg");
								$data['imgD2'] = base_url("img/".$toma['dispositivo2'].".svg");
							}else{

								$data['imgD1'] = base_url("img/flash.svg");
								$data['imgD2'] = base_url("img/flash.svg");
							}
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
							$this->load->view('modal-disp-1',$data);
							$this->load->view('modal-disp-2',$data);

						}
						//Toma con Dispositivo 1
						else if($toma['dispositivo1'] != "" && $toma['dispositivo2'] == ""){
							$this->load->view('cabecera-panel',$data);
							$this->load->view('toma-full-izqu',$data);
							$this->load->view('modal-disp-2',$data);
							


						}
						//Toma con Dispositivo 2
						else if($toma['dispositivo1'] == "" && $toma['dispositivo2'] != ""){
							$this->load->view('cabecera-panel',$data);
							$this->load->view('toma-full-der',$data);
							$this->load->view('modal-disp-1',$data);

						}
				}

			}else{
				$this->load->view('sinTomas',$data);
			}

			$this->load->view('modal-horarios-cabecera');

				if($data['horarios'] != null){
					$this->load->view('horarios',$data);
				}else{
					$this->load->view('sinHorarios');
				}
				
			$this->load->view('modal-horarios-pie',$data);	
			$this->load->view('modal-agregar-horario',$data);

			$this->load->view('modal-tomas',$data);
			$this->load->view('pie-tomas');
		$this->session->set_userdata('alert');
		$this->load->view('pie');
	}





}	