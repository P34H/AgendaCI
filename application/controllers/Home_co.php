<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_co extends CI_Controller {

	
	public function __construct(){
		
		parent::__construct();
		
		$this->load->model('Contatos_model','M_contatos');
		
		date_default_timezone_set('UTC');	
	}
	public function index(){

		$data['titulo'] ='Pagina Inicial';
		$data['subtitulo']='Agenda';

		
		if ($this->input->post('PesqPrimeiro')!= NULL || $this->input->post('PesqUltimo')!= NULL) {
			if ($this->input->post('PesqPrimeiro') != NULL) {
				$Pesquisar = $this->input->post('PesqPrimeiro');
			}else {
				$Pesquisar = $this->input->post('PesqUltimo');	
			}
			$data['M_contatos'] = $this->M_contatos->getContatoByName($Pesquisar);
		}else {
			$data['M_contatos'] = $this->M_contatos->getContatos();
		}
		$this->load->view('html-header',$data);
		$this->load->view('header');
		$this->load->view('home_vi');
		$this->load->view('footer');
		$this->load->view('html-footer');
	}
	// public function Buscar(){

	// 	//PEGA DADOS DO MODEL
	// 	$Pesquisar = $this->input->post('Pesquisar');
	// 	$data['M_contatos'] = $this->M_contatos->getContatoByName($Pesquisar);
	// 	//$dados['contato'] = $query;
	// 	// foreach ($data as $d){
	// 	// 	echo "<pre>";
	// 	// 	print_r($d);
	// 	// 	echo "</pre>";
	// 	// }
	// 	$data['titulo'] ='Pagina Inicial';
	// 	$data['subtitulo']='Agenda';
	//     $this->load->view('html-header',$data);
	// 	$this->load->view('header');
	// 	$this->load->view('home_vi');
	// 	$this->load->view('footer');
	// 	$this->load->view('html-footer');		
	// }

	public function add(){
		//echo "Função add ";
		$data['titulo'] ='Cadastrar';
		$data['subtitulo']='Cadastrar Contato';	
		if ($this->input->post('id') != NULL){
			$data['titulo'] ='Editar';
			$data['subtitulo']='Editar Contato';
		}   

		$data['erros'] = NULL;
		$data['sucesso']= NULL;

		$this->form_validation->set_rules('name','Name','required|min_length[5]|trim');
		$this->form_validation->set_rules('numero','Numero','required|max_length[14]');
		$this->form_validation->set_rules('birthday','Aniversario');

		if ($this->form_validation->run() == FALSE) {
			$data['erros'] = validation_errors('<li>','</li>');
		}else {
			$dados['name'] = $this->input->post('name');
			$dados['numero'] = $this->input->post('numero');
			$dados['birthday'] = $this->input->post('birthday');
			$dados['date'] = date("Y-m-d H:i:s");
			//verifica se foi passodo um id via post a id dos contatos
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
	public function Editar($id=NULL){
		//echo "Função Editar ";
		$data['titulo'] ='Editar';
		$data['subtitulo']='Editar Contato';

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->M_contatos->getContatoByID($id);//resultado positivo ou negativo
		if($query == NULL) {
			redirect('');
		}
		//array onde vai guardar os dados dos contatos para passa com parametro para a view	
		$data['contato'] = $query;

		$this->load->view('html-header',$data);
		$this->load->view('header');
		$this->load->view('editar_vi',$data);
		$this->load->view('footer');
		$this->load->view('html-footer');
		//redirect('');			
	}
	// public function Salvar(){
 //                                       //primeiro paramentro e nome do campo e segundo o texto do campo o terceiro paramento regras de validação 

	// 		//pega os dados passados via post pelo param name
	// 	$dados['name'] = $this->input->post('name');
	// 	$dados['numero'] = $this->input->post('numero');
	// 	$dados['birthday'] = $this->input->post('birthday');
	// 	$dados['date'] = date("Y-m-d H:i:s");
	// 		//verifica se foi passodo um id via post a id dos contatos
	// 	if ($this->input->post('id') != NULL) {
	// 			//se foi passado ele vai e fazer atualizar
	// 		$this->M_contatos->editarContato($dados, $this->input->post('id'));
	// 		redirect('');
	// 	}else{
	// 			//se nao foi passado um id ele addiciona um registro
	// 		$this->M_contatos->addContato($dados);
	// 		redirect('');
	// 	}

		

	// }
	public function Apagar($id=NULL){
		//echo "Função Apagar";
		if ($id == NULL) {
			//echo "O id esta NULL";
		}
		$query = $this->M_contatos->getContatoByID($id);

		if ($query != NULL) {
			$this->M_contatos->apagarContato($query->id);
			redirect('');
		}else{
			redirect('');
		}

	}

}
