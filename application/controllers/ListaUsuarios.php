<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListaUsuarios extends CI_Controller {

	public function index(){

		$this->load->model('listaUsuarios_model');

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'inicio');

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			$datos['usuario']["listUser"] = "si";

			$datos['usuario']["allUsers"] = $this-> listaUsuarios_model->getAllUser();

			enmarcar($this, 'listaUsuarios',$datos);
		}
	}

	public function cambiarPermisos(){
		$datos = explode("-", $_POST["datosUser"]);

		if ($datos[1] == "admin") {
			$datos[1] = "user";

		}else if($datos[1] == "user"){
			$datos[1] = "editor";

		}else{
			$datos[1] = "admin";
		}

		$this->load->model('listaUsuarios_model');
		$this-> listaUsuarios_model->changePermisos($datos[0],$datos[1]);

	}

	public function eliminarUsuario(){
		$email = $_POST["emailUser"];

		$this->load->model('listaUsuarios_model');
		$this-> listaUsuarios_model->deleteUser($email);

	}
}
?>