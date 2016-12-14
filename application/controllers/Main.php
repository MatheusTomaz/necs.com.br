<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{

		$this->load->helper(array('form'));

		$this->load->library(array('form_validation','session'));

		$dados = array(
			'titulo' => 'NECS | Página Inicial'
			);
		$this->load->view('index',$dados);
	}
	public function inscrever()
	{

		$dados = array(
			'titulo' => 'NECS | Inscrição'
			);
		$this->load->view('inscricao',$dados);
	}
	public function patrocinio()
	{

		$dados = array(
			'titulo' => 'NECS | Patrocínio'
			);
		$this->load->view('patrocinio',$dados);
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