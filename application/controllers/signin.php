<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		if($this->session->userdata('usuario')){
			redirect('escritorio');
		}
		if(!isset($_SESSION['alert'])){
			$this->session->set_userdata('alert');		
		}

		$data["login"]= "";
		$data["signin"]= "active";
		$data["alert"] = $this->session->userdata('alert');

		$this->load->view('cabecera-log-sign',$data);
			if($data['alert'] != ""){
				$this->load->view('alert',$data);
			}
			$this->load->view('signin',$data);
			$this->session->set_userdata('alert');
		$this->load->view('pie-log-sign');
		
	}
	public function registrar(){
		$this->load->model('signin_model');

		if($this->input->post("btnRegistrar")){

			if(trim($this->input->post("txtCodigo")) == ""){

				$alert = "Debe ingresar un Codigo valido.";
				$this->session->set_userdata('alert', $alert);
				redirect("signin");
			}else

			if(trim($this->input->post("txtCorreo")) == ""){

				$alert = "Debe ingresar un correo electrónico.";
				$this->session->set_userdata('alert', $alert);
				redirect("signin");
			}else

			if(trim($this->input->post("txtPassword")) == ""){

				$alert = "Debe ingresar una contraseña.";
				$this->session->set_userdata('alert', $alert);
				redirect("signin");
			}else

			if(trim($this->input->post("txtPassword2")) == ""){

				$alert = "Debe confirmar la contraseña.";
				$this->session->set_userdata('alert', $alert);
				redirect("signin");
			}else

			

			if(!($this->input->post("txtPassword") === $this->input->post("txtPassword2"))){

					$alert = "Las contraseñas no coinciden";
					$this->session->set_userdata('alert', $alert);
					redirect("signin");		
			}

			

			else if($this->signin_model->validarCodigo($this->input->post("txtCodigo"))){

				if($this->signin_model->signin($this->input->post("txtCorreo"),md5($this->input->post("txtPassword")),md5($this->input->post("txtPassword2")))){

					$alert = "Usuario creado exitosamente. Ya puedes iniciar sesión <a href='login' class='alert-link'>aquí</a>";
					$this->session->set_userdata('alert', $alert);
					redirect("signin");

				}
				else {
					
					$alert = "Este correo ya se encuentra registrado, porfavor ingrese uno diferente.";
					$this->session->set_userdata('alert', $alert);
					redirect("signin");
				}

			}else{

					$alert = "El codigo ingresado no es valido, porfavor intente de nuevo.";
					$this->session->set_userdata('alert', $alert);
					redirect("signin");	
				
			}
		}
	}
}