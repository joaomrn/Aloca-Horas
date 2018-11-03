<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('cargo_model','cargomodel');
	}
 
	public function index()
	{
		$this->load->view('template/html_header');
		$this->load->view('template/master_page'); 
		$this->load->view('principal.php'); 
		$this->load->view('template/html_footer');
	}


	public function login(){
		$this->load->view('login.php');

	}

	public function usuarios(){

		$data['cargos'] = $this->cargomodel->list();
		var_dump($data);
		$this->load->view('template/html_header',$data);
		$this->load->view('template/master_page'); 
		$this->load->view('usuarios'); 
		$this->load->view('template/html_footer');
	}
}
