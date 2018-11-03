<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class projetos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('projetos_model', 'projetosmodel');
	}
   
	/**
	 * POST : insere um projeto no banco de dados
	 */
	public function create(){
		
		//Leitura de inputs
			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['descricao'])){
				$camps['descricao'] = $this->input->post('descricao');
			}

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->projetosmodel->create($camps); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * POST : delete um proojeto no banco de dados pelo id
	 */
	public function delete(){
		
		// recebe os inputs via post
		$id = $this->input->post('id'); 

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->projetosmodel->delete($id); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * POST : altera um projeto
	 */
	public function alter(){
		
		//Leitura de inputs
			if (isset($_POST['id'])){
				$id = $this->input->post('id');
			}
			
			if (isset($_POST['nome'])){
				$camps['nome'] = $this->input->post('nome');
			}

			if (isset($_POST['descricao'])){
				$camps['descricao'] = $this->input->post('descricao');
			}

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->projetosmodel->alter($id,$camps); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * GET : lista todos os cargos de acordo a dscrição especificada
	 */
	public function list(){

		
		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->projetosmodel->list();
		
		$this->load->view('api/json_export', $data);

	}

}
