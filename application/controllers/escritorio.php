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
		
		$data['seccionSHC'] = "";
		$data['seccionDisp'] = "";
		$data['seccionHorarios'] = "";
		$data['tipoSeccion'] = 'Escritorio';
		
		$data["user"] = $this->session->userdata('usuario');
		$data["alert"] = $this->session->userdata('alert');

		$this->load->view('cabecera',$data);
			$this->load->view('menu');
			$this->load->view('cabecera-contenido',$data);

					$this->load->view('escritorio');

				$this->session->set_userdata('alert');
			$this->load->view('pie-contenido');
		$this->load->view('pie');
	}





}	