<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
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
		$data["home"]= "";
		$data["login"]= "active";
		$data["signin"]= "";
		$data["disp"]= "";
		$data["alert"] = $this->session->userdata('alert');

		$this->load->view('cabecera',$data);
		
		if($data['alert'] != ""){
			$this->load->view('alert',$data);
		}
		$this->load->view('login',$data);
		$this->session->set_userdata('alert');
		$this->load->view('pie');
	}
	public function ingresar(){
		if($this->input->post("btnEntrar")){	

			$this->load->model('login_model');

				if($this->login_model->login($this->input->post("txtCorreo"),md5($this->input->post("txtPassword")))){
					$this->session->set_userdata('usuario',$this->input->post("txtCorreo"));
					redirect('escritorio');
				}else{
					
					$alert = "Usuario o contraseña incorrecta. Si no estas registrado hazlo <a href='login/signin' class='alert-link'>aquí</a>";
					$this->session->set_userdata('alert', $alert);
					redirect("login");
					
				}
		}	
	}
}