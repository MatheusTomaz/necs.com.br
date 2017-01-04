<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{

		$this->load->helper(array('form'));

		$this->load->library(array('form_validation','session'));

		$dados = array(
			'titulo' => 'II SCS | Página Inicial'
			);
		$this->load->view('index',$dados);
	}
	public function organizacao()
	{

		$dados = array(
			'titulo' => 'II SCS | Organização'
			);
		$this->load->view('organizacao',$dados);
	}
	public function minicursos()
	{

		$dados = array(
			'titulo' => 'II SCS | Minicursos'
			);
		$this->load->view('minicursos',$dados);
	}
	public function programacao()
	{

		$dados = array(
			'titulo' => 'II SCS | Programação'
			);
		$this->load->view('programacao',$dados);
	}
	public function inscrever()
	{

		$dados = array(
			'titulo' => 'II SCS | Inscrição'
			);
		$this->load->view('inscricao',$dados);
	}
	public function trabalhos()
	{

		$dados = array(
			'titulo' => 'II SCS | Trabalhos'
			);
		$this->load->view('trabalhos',$dados);
	}
	public function local()
	{

		$dados = array(
			'titulo' => 'II SCS | Local'
			);
		$this->load->view('local',$dados);
	}
	public function hospedagem()
	{

		$dados = array(
			'titulo' => 'II SCS | Hospedagem'
			);
		$this->load->view('hospedagem',$dados);
	}
	public function patrocinio()
	{

		$dados = array(
			'titulo' => 'II SCS | Patrocínio'
			);
		$this->load->view('patrocinio',$dados);
	}
    public function cadastroParticipante()
    {

        $dados = array(
            'titulo' => 'II SCS | Inscrição'
            );
        $this->load->view('cadastroParticipante',$dados);
    }

	public function contato()
	{
		//Vetor que recebe parametros de aviso.
		$alerta = null;

		$this->load->helper(array('form'));

		$this->load->library(array('form_validation','session'));

		if($this->input->post('enviar') === "enviar")
		{
			$nome = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$mensagem = $this->input->post('message');

			$dados_contato = array(
				'nome'     => $nome,
				'email'     => $email,
				'phone'		=> $phone,
				'mensagem'     => $mensagem
				);
			var_dump($dados_contato);
			$this->load->library('email');

			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->from('noreply@scsufla.com', 'Contato Site');
			$this->email->to('wellytonmarcos@gmail.com');

			$this->email->subject('Contato Site');

			$mesg = $this->load->view('mail/index',$dados_contato,true);

			$this->email->message($mesg);
			if($this->email->send()){
				$alerta = array(
					"class" => "green",
					'mensagem' => "Mensagem Enviada<br>Em breve entraremos em contato.");
			}
			else{
				$alerta = array(
					"class" => "red",
					'mensagem' => "Atenção!<br>Não foi possível enviar a mensagem no momento. Tente novamente mais tarde.");
			}
		}
		$dados = array(
			'titulo' => 'II SCS | Contato',
			'alerta' => $alerta);

		$this->load->view('contato',$dados);

	}



	public function login()
	{
		$this->load->helper(array('form'));

		$this->load->library(array('form_validation','session'));

		$alerta = array(
			"class" => "red-text",
			'mensagem' => "".validation_errors());

		$dados = array(
			'titulo' => 'Login | SCS UFLA',
			'alerta' => $alerta);

		$this->load->view('login',$dados);
	}
}
