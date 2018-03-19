<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receta extends CI_Controller {

	public function index(){
		//*******Lo Qoe Falta*****/
		//coge el id de la receta pulsada y le pasa los datos a la vista
		//coger de la bbdd el nombre de la categoria de la que procede y pasarselo
		//***********************/

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'receta');

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			enmarcar($this, 'receta',$datos);
		}
		
	}
}
?>