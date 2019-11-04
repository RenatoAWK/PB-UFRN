<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function inicio(){
		 $this -> load -> view('inicio');
	}
	public function empenhos(){
		 $this -> load -> view('empenhos');
	}
	public function processos(){
		 $this -> load -> view('processos');
	}
}
