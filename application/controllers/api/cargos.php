<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cargos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('cargo_model', 'cargomodel');
	}
   
	/**
	 * POST : insere um cargo no banco de dados
	 */
	public function create(){
		
		// recebe os inputs via GET
		$desc = $this->input->post('desc');

		echo $this->input->get('desc');
		
		
		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->cargomodel->create($desc); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * POST : delete um cargo no banco de dados pelo id
	 */
	public function delete(){
		
		// recebe os inputs via post
		$id = $this->input->post('id'); 

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->cargomodel->delete($id); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * POST : altera um cargo
	 */
	public function alter(){
		
		$id = $this->input->post('id');
		$desc = $this->input->post('desc');

		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->cargomodel->alter($id,$desc); 
		
		$this->load->view('api/json_export', $data);

	}

	/**
	 * GET : lista todos os cargos de acordo a dscrição especificada
	 */
	public function list(){

		
		// tudo o que está em $data será passado para a view
		$data = [];
		$data['content'] = $this->cargomodel->list();
		
		$this->load->view('api/json_export', $data);

	}

}
