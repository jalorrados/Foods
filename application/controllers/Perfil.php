<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function index(){
		session_start();//inicia sesion y pasa los datos a la vista de perfil
		if (isset($_SESSION) && $_SESSION!=null && $_SESSION!="") {
			$dir = './fotos/'.$_SESSION["email"];

			if (!is_dir ($dir)) {//creo una carpeta identificativa nombrandola como el email
				mkdir($dir, 0777);
			}

			$this->load->model('perfil_model');//carga el modelo
			$idUser = $this-> perfil_model->getIdByEmail($_SESSION["email"]);
			$mediaUser = $this-> perfil_model->getMediaUser($idUser);

			$datos['usuario']["mediaUser"] = $mediaUser;
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["urlimagen"] = $_SESSION["urlimagen"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			
			enmarcar($this,"perfil",$datos);

		}else{
			header('Location:'.base_url().'inicio');
		}
		
		
	}

	public function editarPerfil(){
		$this->load->model('perfil_model');//carga el modelo
		session_start();//inicia sesion y le vuelvo a asignar los nuevos valores a session
		$apenom = $_POST["perfilNombre"];
		$telefono = $_POST["perfilTelefono"];

		/****Cogemos la imgen y la copiamos a la carpeta correspondiente****/
		$nombre = $_FILES['imgUser']['name'];
		$carpeta = "./fotos/".$_SESSION["email"];
		copy ( $_FILES['imgUser']['tmp_name'], $carpeta."/perfil.".pathinfo($nombre, PATHINFO_EXTENSION));

		$usuario = $this-> perfil_model->getUser($_SESSION["email"]);

		//cogemos la url de la imagen para meterla en la bbdd
		if ($nombre==null) {
			$urlimagen = $usuario->urlimagen;
		}else{
			$urlimagen = "fotos/".$_SESSION["email"]."/perfil.".pathinfo($nombre, PATHINFO_EXTENSION);
		}
		
		$_SESSION["urlimagen"]=$urlimagen;//ponemos la url en la sesion

		
		$idUsuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);//obtiene el id del usuario

		$this -> perfil_model -> updateUser($idUsuario,$apenom,$telefono,$urlimagen);//se modifica los datos del usuario

		$_SESSION["apenom"]=$apenom;
		$_SESSION["telefono"]=$telefono;

		header('Location:'.base_url().'perfil');//vuelve a cargar el perfil
	}

	public function peticionAjaximagen(){
		session_start();
		echo base_url() . $_SESSION["urlimagen"];
	}
	
	public function verRecetasUsuario(){
		session_start();
		$this->load->model('perfil_model');
		$usuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);
		$datosReceta = $this -> perfil_model -> getRecetasUsuario($usuario);
		$datos['usuario']["apenom"] = $_SESSION["apenom"];
		$datos['usuario']["rol"] = $_SESSION["rol"];
		$datos['usuario']["recetaUsuario"] = $datosReceta;
		
		enmarcar($this,"recetasUsuario",$datos);
	}
}
?>