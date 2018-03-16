<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receta extends CI_Controller {

	public function index(){
		//coge el id de la receta pulsada y le pasa los datos a la vista
		//coger de la bbdd el nombre de la categoria de la que procede y pasarselo
		enmarcar($this,"receta");
		
	}
}
?>