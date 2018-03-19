<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

	public function index(){
		//falta pasarle el nombre de la categoria(recibida por get) en la que he pulsado y los datos de las recetas
		if (isset($_GET["categoria"])) {
				$datos['usuario']["categoria"] = $_GET["categoria"];
		}

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'listado',$datos);

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];


			enmarcar($this, 'listado',$datos);
		}
	}
}
?>