<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_co extends CI_Controller{
	
	public function __construct(){
		

		parent::__construct();
		$this->load->library('Contato_Prototype');
		$this->load->model('Contatos_model','M_contatos');
		$this->title = 'Cadastrar';
		function __clone(){			
		}

		date_default_timezone_set('UTC');	
	}
	public function index(){

		$data['titulo'] =$title;
		$data['subtitulo']='Agenda';

		$this->load->view('html-header',$data);
		$this->load->view('header');
		$this->load->view('home_vi');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}
	
	public function add(){
		
		$contatoPrototype = new Cadastro_co();

		$contato1 = clone $contatoPrototype;

		$data['titulo'] =$title;
		$data['subtitulo']='Cadastrar Contato';	


		$data['erros'] = NULL;
		$data['sucesso']= NULL;


		$this->form_validation->set_rules('name','Name','required|min_length[5]|trim');
		$this->form_validation->set_rules('numero','Numero','required|max_length[12]');
		$this->form_validation->set_rules('birthday','Aniversario');
		
		if ($this->form_validation->run() == FALSE) {
			$data['erros'] = validation_errors('<li>','</li>');
		}else{ 
			$contato1->setName($this->input->post('name'));
			$contato1->setNumero($this->input->post('numero'));
			$contato1->setBirthday($this->input->post('birthday'));
			$contato1->setDate(date("Y-m-d H:i:s"));

			$dados['name'] = $contato1->getName(); 
			$dados['numero'] = $contato1->getNumero();
			$dados['birthday'] = $contato1->getBirthday();
			$dados['date'] = $contato1->getDate();
			if ($this->input->post('id') != NULL) {
				//se foi passado ele vai e fazer atualizar
				$this->M_contatos->editarContato($dados, $this->input->post('id'));
				redirect('');
			}else{
				//se nao foi passado um id ele addiciona um registro
				$this->M_contatos->addContato($dados);
				redirect('');
			}
			$data['sucesso'] = "Formulario validado com sucesso";
		}
		
		//$data['M_contatos'] = $this->M_contatos->getContatos();
		$this->load->view('html-header',$data);
		$this->load->view('header');
		$this->load->view('cadastro_vi');
		$this->load->view('footer');
		$this->load->view('html-footer');
		//Verifica se foi passado o campo nome vazio
	}


}
