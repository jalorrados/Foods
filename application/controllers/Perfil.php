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

	public function crearReceta(){
		$this->load->model('perfil_model');//carga el modelo
		session_start();//inicia sesion y le vuelvo a asignar los nuevos valores a session
		$nombrereceta = $_POST["nombreReceta"];
		$preparacion = $_POST["preparacionReceta"];
		$npersonas = $_POST["numPersonas"];
		$ningredientes = $_POST["numIngredientes"];
		$nombreingrediente = array();
		$cantidad = array();
		$unidades = array();
		$categoria = $_POST["categoriaReceta"];
		$dificultad = $_POST["dificultad"];

		/****Cogemos la imgen y la copiamos a la carpeta correspondiente****/
		$nombreimagen = $_FILES['imgReceta']['name'];
		$carpeta = "./fotos/".$_SESSION["email"];

		//cogemos la url de la imagen para meterla en la bbdd
		if ($nombreimagen==null) {
			$urlimagen = "assets/img/noimage.png";
		}else{
			copy ( $_FILES['imgReceta']['tmp_name'], $carpeta."/".$nombreimagen );
			$urlimagen = "fotos/".$_SESSION["email"]."/".$nombreimagen;
		}

		for ($i=0; $i < $ningredientes; $i++) {
			array_push($nombreingrediente, $_POST["ingrediente" . $i]);
			array_push($cantidad, $_POST["cantidad" . $i]);
			array_push($unidades, $_POST["unidad" . $i]);
		}
		
		$idUsuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);//obtiene el id del usuario

		$this -> perfil_model -> createRecipe($idUsuario,$nombrereceta,$preparacion,$npersonas,$nombreingrediente,$cantidad,$unidades,$categoria,$dificultad,$urlimagen);//crea la receta

		header('Location:'.base_url().'perfil');//vuelve a cargar la vista perfil
	}
}
?>