<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

	public function index(){

		//pasarle el nombre de la categoria(recibida por get) en la que he pulsado y los datos de las recetas
		enmarcar($this,"listado");
		
	}
}
?>