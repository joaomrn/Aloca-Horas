<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {
 
	/**
	 * Lista todos os usuários
	 */
	public function list(){
		
		$this->db->select('u.ID_usuario, u.nome, u.email, u.senha, u.ID_cargo, c.descricao as cargo ');  
		$this->db->from('usuarios as u');
		$this->db->join('cargos as c', 'u.ID_cargo = c.ID_cargo', 'left');
		$result = $this->db->get();

		return $result->result_array();
	}

	/**
	 * Cria um usuário novo
	 */
	public function create($camps){

		if (!(is_array($camps)) ){
			return false;
		}		 

		$result = $this->db->insert('usuarios', $camps);
			
		return $result;
	}

	/**
	 * Altera as informações de um usuário
	 */
	public function alter($id,$camps){
		if (!(is_array($camps))){
			return false;
		}

		$this->db->where('ID_usuario',$id);
		return $this->db->update('usuarios',$camps);
	}

	/**
	 * Deleta um usuário
	 */
	public function delete($id){

		return $this->db->delete('usuarios','ID_usuario ='.$id ); 
	}

}
