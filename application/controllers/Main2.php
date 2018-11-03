<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
 
	public function index()
	{
		
		
		
	}


	public function login(){
		$this->load->view('login.php');

	}

	public function principal(){
		$this->load->view('template/master_page.html');
	}
}
