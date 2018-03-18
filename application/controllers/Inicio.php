<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){
		$dir = "./fotos";
		if (!is_dir ($dir)) {//crea carpea para almacenar las fotos
			mkdir($dir, 0777);
		}
		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'inicio');

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			enmarcar($this, 'inicio',$datos);
		}
		
	}

	public function loginPost(){
		session_start();
		$this->load->model('inicio_model');//carga el modelo

		$usuario = $this -> inicio_model -> getUser($_POST["loginemail"]);//obtiene el usuario del login
		if ($usuario["pass"] == $_POST["loginpass"]) {//si la pass escrita coincide con la de la bbdd te loguea y pone los datos a la sesion

			$_SESSION["apenom"]=$usuario["apenom"];
			$_SESSION["email"]=$usuario["email"];
			$_SESSION["telefono"]=$usuario["telefono"];
			$_SESSION["urlimagen"]=$usuario["urlimagen"];
			$_SESSION["rol"]="user";

			header('Location:'.base_url().'perfil');
		}
	}

	public function signPost(){
		$this->load->model('inicio_model');//carga el modleo

		//Falta comprobar con isset o empty
		$user = $_POST["signuser"];
		$email = $_POST["signemail"];
		$telefono = $_POST["signtlf"];
		$pass = $_POST["signpass"];

		$this -> inicio_model -> crearUsuario($user,$email,$telefono,$pass);//crea el usuario
		session_start();//inicia sesion y le pasa los datos del usuario
		$_SESSION["apenom"]=$user;
		$_SESSION["email"]=$email;
		$_SESSION["telefono"]=$telefono;
		$_SESSION["urlimagen"]="assets/img/avatar.png";//cuando te registras sale la imagen por defecto
		$_SESSION["rol"]="user";

		header('Location:'.base_url().'perfil');
	}

	public function logOut(){//cerrar sesion borra las variables de la sesion y la destruye
		session_start();
		session_unset();
		session_destroy();
		header('Location:'.base_url().'inicio');
	}

}
?>