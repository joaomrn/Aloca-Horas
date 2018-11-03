<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('usuarios_model', 'usuariosmodel');
	} 

	 public function list(){

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->usuariosmodel->list();
		
		$this->load->view('api/json_export', $data);	
	 }

	 /**
	  * POST : cria um usuário através de um array associativo
	  * @param nome(string),email(string),senha(string),ID_cargo(int)
	  */
	 public function create(){
	 
		//leutura de inputs
			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['email'])){
				$camps['email'] = $this->input->post('email');
			}

			if (isset($_POST['senha'])){
				$camps['senha'] = $this->input->post('senha');
			}

			if (isset($_POST['cargo'])){
				$camps['ID_cargo'] = $this->input->post('cargo');
			}

			if (isset($_POST['admin'])){
				$camps['admin'] = $this->input->post('admin');
			}
			 
		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->usuariosmodel->create($camps);
		
		$this->load->view('api/json_export', $data);	
	 }

	 public function alter(){

			//leutura de inputs
			if (isset($_POST['id'])){
				$id = $this->input->post('id');
			}

			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['email'])){
				$camps['email'] = $this->input->post('email');
			}

			if (isset($_POST['senha'])){
				$camps['senha'] = $this->input->post('senha');
			}

			if (isset($_POST['cargo'])){
				$camps['ID_cargo'] = $this->input->post('cargo');
			}

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->usuariosmodel->alter($id,$camps);
		
		$this->load->view('api/json_export', $data);

	 }

	 public function delete(){
		
		//leutura de inputs
			if (isset($_POST['id'])){
				$id = $this->input->post('id');
				
				$result = $this->usuariosmodel->delete($id);
			}
			else{
				$result = false;
			}

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $result;
		
		$this->load->view('api/json_export', $data);		

		
	 }
}
