<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function index(){
		session_start();//inicia sesion y pasa los datos a la vista de perfil
		$dir = './fotos/'.$_SESSION["email"];

		if (!is_dir ($dir)) {//creo una carpeta identificativa nombrandola como el email
			mkdir($dir, 0777);
		}

		$datos['usuario']["apenom"] = $_SESSION["apenom"];
		$datos['usuario']["telefono"] = $_SESSION["telefono"];
		$datos['usuario']["email"] = $_SESSION["email"];
		$datos['usuario']["urlimagen"] = $_SESSION["urlimagen"];
		$datos['usuario']["rol"] = $_SESSION["rol"];
		
		enmarcar($this,"perfil",$datos);
		
	}

	public function editarPerfil(){
		$this->load->model('perfil_model');//carga el modelo
		session_start();//inicia sesion y le vuelvo a asignar los nuevos valores a session
		$apenom = $_POST["perfilNombre"];
		$telefono = $_POST["perfilTelefono"];

		/****Cogemos la imgen y la copiamos a la carpeta correspondiente****/
		$nombre = $_FILES['imgUser']['name'];
		$carpeta = "./fotos/".$_SESSION["email"];
		copy ( $_FILES['imgUser']['tmp_name'], $carpeta."/".$nombre );

		$usuario = $this-> perfil_model->getUser($_SESSION["email"]);

		//cogemos la url de la imagen para meterla en la bbdd
		if ($nombre==null) {
			$urlimagen = $usuario->urlimagen;
		}else{
			$urlimagen = "fotos/".$_SESSION["email"]."/".$nombre;
		}
		
		$_SESSION["urlimagen"]=$urlimagen;//ponemos la url en la sesion

		
		$idUsuario = $this -> perfil_model -> getIdByEmail($_POST["perfilEmail"]);//obtiene el id del usuario

		$this -> perfil_model -> updateUser(1,$apenom,$telefono,$urlimagen);//se modifica los datos del usuario

		$_SESSION["apenom"]=$apenom;
		$_SESSION["telefono"]=$telefono;

		header('Location:'.base_url().'perfil');//vuelve a cargar el perfil
	}
}
?>