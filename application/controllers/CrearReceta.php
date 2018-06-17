<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearReceta extends CI_Controller {

	public function index(){
		session_start();//inicia sesion y pasa los datos a la vista de perfil
		if (isset($_SESSION) && $_SESSION!=null && $_SESSION!="") {

			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["urlimagen"] = $_SESSION["urlimagen"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			$datos['usuario']["listUser"] = "no";
			
			enmarcar($this,"crearReceta",$datos);

		}else{
			header('Location:'.base_url().'inicio');
		}
		
		
	}


	public function nuevaReceta(){
		$this->load->model('CrearReceta_model');//carga el modelo
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
			$urlimagen = "assets/img/noimagen.jpg";
		}else{
			copy ( $_FILES['imgReceta']['tmp_name'], $carpeta."/".$nombreimagen );
			$urlimagen = "fotos/".$_SESSION["email"]."/".$nombreimagen;
		}

		for ($i=0; $i < $ningredientes; $i++) {
			array_push($nombreingrediente, $_POST["ingrediente" . $i]);
			array_push($cantidad, $_POST["cantidad" . $i]);
			array_push($unidades, $_POST["unidad" . $i]);
		}
		
		$idUsuario = $this -> CrearReceta_model -> getIdByEmail($_SESSION["email"]);//obtiene el id del usuario

		$this -> CrearReceta_model -> createRecipe($idUsuario,$nombrereceta,$preparacion,$npersonas,$nombreingrediente,$cantidad,$unidades,$categoria,$dificultad,$urlimagen);//crea la receta

		header('Location:'.base_url().'crearReceta');//carga la vista para crear una nueva receta
	}

	public function peticionAjaximagen(){
		session_start();
		echo base_url() . $_SESSION["urlimagen"];
	}
	
}
?>