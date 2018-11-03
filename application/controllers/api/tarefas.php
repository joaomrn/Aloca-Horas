<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarefas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('tarefas_model', 'tarefasmodel');
	} 

	 public function list(){

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->tarefasmodel->list();
		
		$this->load->view('api/json_export', $data);	
	 }

	 /**
	  * POST : cria uma tarefa através de um array associativo
	  * @param nome(string),descricao(string),horas_atribuidas(string),ID_projeto(int),ID_condicao(int)
	  */
	 public function create(){
		 
		//leutura de inputs
			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['descricao'])){
				$camps['descricao'] = $this->input->post('descricao');
			}

			if (isset($_POST['horas_atribuidas'])){
				$camps['horas_atribuidas'] = $this->input->post('horas_atribuidas');
			}

			if (isset($_POST['horas_gastas'])){
				$camps['horas_gastas'] = $this->input->post('horas_gastas');
			}

			if (isset($_POST['hora_inicial'])){
				$camps['hora_inicial'] = $this->input->post('hora_inicial');
			}

			if (isset($_POST['hora_final'])){
				$camps['hora_final'] = $this->input->post('hora_final');
			}

			if (isset($_POST['ID_projeto'])){
				$camps['ID_projeto'] = $this->input->post('ID_projeto');
			}

			if (isset($_POST['ID_condicao'])){
				$camps['ID_condicao'] = $this->input->post('ID_condicao');
			}
			 
		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->tarefasmodel->create($camps);
		
		$this->load->view('api/json_export', $data);	
	 }

	 public function alter(){

		$camps = [];

		//leutura de inputs
			if (isset($_POST['id'])){
				$id = $this->input->post('id');
			}

			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['descricao'])){
				$camps['descricao'] = $this->input->post('descricao');
			}

			if (isset($_POST['horas_atribuidas'])){
				$camps['horas_atribuidas'] = $this->input->post('horas_atribuidas');
			}

			if (isset($_POST['horas_gastas'])){
				$camps['horas_gastas'] = $this->input->post('horas_gastas');
			}

			if (isset($_POST['hora_inicial'])){
				$camps['hora_inicial'] = $this->input->post('hora_inicial');
			}

			if (isset($_POST['hora_final'])){
				$camps['hora_final'] = $this->input->post('hora_final');
			}

			if (isset($_POST['ID_projeto'])){
				$camps['ID_projeto'] = $this->input->post('ID_projeto');
			}

			if (isset($_POST['ID_condicao'])){
				$camps['ID_condicao'] = $this->input->post('ID_condicao');
			}

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->tarefasmodel->alter($id,$camps);
		 
		$this->load->view('api/json_export', $data);

	 }

	 public function delete(){
		
		//leutura de inputs
			if (isset($_POST['id'])){
				$id = $this->input->post('id');
				
				$result = $this->tarefasmodel->delete($id);
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
