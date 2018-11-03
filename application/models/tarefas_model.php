<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarefas_model extends CI_Model {

	 
 
	public function create($camps){
		
		if (!(is_array($camps)) ){
			return false;
		}		 

		$result = $this->db->insert('tarefas', $camps);
		
		return $result;
	}

	public function list(){
		
		$this->db->select('t.ID_tarefa , t.nome , t.descricao, 
						   t.horas_atribuidas, t.horas_gastas, t.hora_inicial,
						   t.hora_final, t.ID_projeto, t.ID_condicao, 
						   c.finalizada, c.reprovada, c.aprovada,
						   c.pendente, c.iniciada, c.em_andamento'	);   
		$this->db->from('tarefas t');
		$this->db->join('condicao c', 'c.ID_condicao = t.ID_condicao');

		$result = $this->db->get();

		
		return $result->result_array();
	}

	public function alter($id, $camps){
		
		if (!(is_array($camps))){
			return false;
		}
	
		$this->db->where('ID_tarefa',$id);
		return $this->db->update('tarefas',$camps); 	
	}

	public function delete($id){
	
		$result = $this->db->delete('tarefas','ID_tarefa = '.$id);
		
		return $result;
	}

	 
}
