<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function index(){

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'categorias');

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			enmarcar($this, 'categorias',$datos);
		}
		
	}
}
?>