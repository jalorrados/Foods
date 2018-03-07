<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){

		enmarcar($this, 'inicio');
		
	}

	public function loginPost(){
		enmarcar($this,"perfil");
	}
}
