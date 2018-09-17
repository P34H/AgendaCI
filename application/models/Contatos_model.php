<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
	public function getContatos(){
        //ordenar pelo nome na tabela 		
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('contatos');
		return $query->result();
	}
	public function addContato($dados=NULL){
                                //nomde da tabela no bd  		
		if ($dados != NULL):
			$this->db->insert('contatos',$dados);
		endif;
	}
	public function getContatoByName($name){
        //ordenar pelo nome na tabela 		
		//$this->db->order_by('name', 'asc');
		$this->db->like('name',$name);
		$qr = $this->db->get('contatos');
		return $qr->result();
	}
	// pegar contatos por id
	public function getContatoByID($id = NULL){
                                //nome da tabela no bd  		
		if ($id != NULL):
			                 //campo no bd e id passado como paramentro para funçao
			$this->db->where('id',$id);
			//limitar para apenas um registro
			$this->db->limit(1);
			//pega os contatos
			$query = $this->db->get("contatos");
			//retorna o registro
			return $query->row();
		endif;

			//retorna falso para o controle	
	}
	public function editarContato($dados =NULL,$id=NULL){
		//se foi passado os dados
		if ($dados != NULL && $id != NULL):
			                  //nome db, dados, array condiçao id
			$this->db->update('contatos', $dados, array('id' => $id));
		endif;
	}
	public function apagarContato($id =NULL){
		if($id != NULL):
			$this->db->delete('contatos', array('id' =>$id ));
		endif;
	}
}