<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {


	public function index()
	{	
		$data["home"]= "active";
		$data["login"]= "";
		$data["signin"]= "";
		$data["disp"]= "";
		$this->load->view('cabecera',$data);
		$this->load->view('login');		
		$this->load->view('pie');
	}
}