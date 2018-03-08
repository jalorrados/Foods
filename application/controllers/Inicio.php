<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){

		enmarcar($this, 'inicio');
		
	}

	public function loginPost(){
		header('Location:'.base_url().'perfil');
	}
}
