<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class projetos_model extends CI_Model {
 
 public function list(){
	$this->db->from('projetos');
	$this->db->select('ID_projeto, nome, descricao');
	$result = $this->db->get();
	
	return $result->result_array();
 }

 public function create($camps){

	if (!(is_array($camps)) ){
		return false;
	}	 

	$result = $this->db->insert('projetos', $camps);

	return $result;
 }

 public function delete($id){
	
	$result = $this->db->delete('projetos','ID_projeto = '.$id);
	
	return $result;
 }

 public function alter($id, $camps){
	if (!(is_array($camps))){
		return false;
	}

	$this->db->where('ID_projeto',$id);
	return $this->db->update('projetos',$camps); 	
 }

}
