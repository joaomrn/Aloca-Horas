<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cargo_model extends CI_Model {
 
	/**
	 * Cria um cargo no banco de dados
	 * @param $desc descrição/nome do cargo
	 */
	public function create($desc){
		 

		if ( !( strlen($desc) <= 20 ) || !( strlen($desc) > 0 ) ){
			// return false;
		}
		
		$data = [ 'descricao' => $desc ];

		$result = $this->db->insert('cargos', $data);

		return $result;
	}

	/**
	 * Deleta um cargo à partir do id
	 * @param $id id do cargo que será deletado
	 */
	public function delete($id){

		$result = $this->db->delete('cargos', ['ID_cargo' => $id] );
		
		//  $this->db->count_all_results(); // numero de linhas afetadas
	 

		return $result;
	}

	/**
	 * Altera a descrição/nome de um cargo à partir do id
	 */
	public function alter($id, $desc){

		$fields['descricao'] = $desc;

		
		$this->db->where('ID_cargo', $id);
		$result = $this->db->update('cargos', $fields);
		 
		return $result;
	}

	/**
	 * Lista todos os cargos
	 */
	public function list(){

		$this->db->select('ID_cargo, descricao');  
		$result = $this->db->get('cargos');

		return $result->result_array();
	}

}
