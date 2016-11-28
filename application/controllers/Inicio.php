<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$dados = array(
			'titulo' => 'NECS | Página Inicial'
			);
		$this->load->view('index',$dados);
	}
}