<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function index(){
		session_start();//inicia sesion y pasa los datos a la vista de perfil
		$datos['usuario']["apenom"] = $_SESSION["apenom"];
		$datos['usuario']["telefono"] = $_SESSION["telefono"];
		$datos['usuario']["email"] = $_SESSION["email"];
		
		enmarcar($this,"perfil",$datos);
		
	}
}
?>