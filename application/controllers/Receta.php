<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receta extends CI_Controller {

	public function index(){
		if (isset($_GET["categoria"])) {
			//$datos['usuario']["categoria"] = $_GET["categoria"];

			switch ($_GET["categoria"]) {//comprobar todas las recetas y asignarle la url correspondiente
				case 'Alimentacion infantil':
				case 'infantil':
					$datos['usuario']["categoriaurl"] = "Alimentacion%20infantil";
					$datos['usuario']["categoria"] ='Alimentacion infantil';
					break;

				case 'Aperitivos y tapas':
				case 'tapas':
					$datos['usuario']["categoriaurl"] = "Aperitivos%20y%20tapas";
					$datos['usuario']["categoria"] ='Aperitivos y tapas';
					break;

				case 'Sopas y cremas':
				case 'sopas':
					$datos['usuario']["categoriaurl"] = "Sopas%20y%20cremas";
					$datos['usuario']["categoria"] ='Sopas y cremas';
					break;

				case 'Arroces y pastas':
				case 'pastas':
					$datos['usuario']["categoriaurl"] = "Arroces%20y%20pastas";
					$datos['usuario']["categoria"] ='Arroces y pastas';
					break;

				case 'Potajes y platos de cuchara':
				case 'potajes':
					$datos['usuario']["categoriaurl"] = "Potajes%20y%20platos de cuchara";
					$datos['usuario']["categoria"] ='Potajes y platos de cuchara';
					break;

				case 'Verduras y hortalizas':
				case 'verduras':
					$datos['usuario']["categoriaurl"] = "Verduras%20y%20hortalizas";
					$datos['usuario']["categoria"] ='Verduras y hortalizas';
					break;
			}

		}

		if (isset($_GET["idReceta"])) {
			$id=$_GET["idReceta"];
			$this->load->model('receta_model');
			$receta = $this-> receta_model->getRecetaById($id);
			$ingredientes = $this-> receta_model->getIngredientes($id);
			$especificacionIngrediente = $this-> receta_model->getEspecificacionIngrediente();
			$nombreIngredientes =[];
			foreach ($ingredientes as $ing) {
				foreach ($especificacionIngrediente as $esping) {
					if ($esping->id == $ing->especificacioningrediente_id) {
						array_push($nombreIngredientes,$esping);
					}
				}
			}
			
			$valoraciones = $this-> receta_model->getValoraciones($id);
			$allUsuarios = $this-> receta_model->getAllUser();
			$usuarios =[];
			foreach ($valoraciones as $valoracion) {
				foreach ($allUsuarios as $usuario) {
					echo "<script>console.log( 'Debug Objects: " . $valoracion . "' );</script>";
					if ($usuario['id'] == $valoracion["usuario_id"]) {
						array_push($usuarios,$usuario);
					}
				}
			}
			
			$datos['usuario']['valoraciones'] = $valoraciones;
			$datos['usuario']['usuarios'] = $usuarios;
			$datos['usuario']["receta"] = $receta;
			$datos['usuario']["datosIngredientes"] = $ingredientes;
			$datos['usuario']["nombreIngredientes"] = $nombreIngredientes;
			$datos['usuario']["id_receta"] = $id;
			
		}

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'receta',$datos);

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			enmarcar($this, 'receta',$datos);
		}
		
	}
	public function crearComentario(){
		session_start();
		$this->load->model('receta_model');
		$this->load->model('perfil_model');

		$id_usuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);

		
		if (isset($_POST["recetaId"])) {
			$id_receta =$_POST["recetaId"];
			$receta = $this-> receta_model->getRecetaById($id_receta);
			$valoraciones = $this -> receta_model -> getValoraciones($id_receta);
			$datos['usuario']['valoraciones'] = $valoraciones;
			//$num_comentarios = $this -> receta_model -> getNumberComentarios($id_receta);
			//$datos['usuario']['num_comentrios'] = $num_comentarios;
		} 

		if (isset($_POST["tituloComentario"])) {
			$tituloComentario=$_POST["tituloComentario"];
		}

		if (isset($_POST["descripcionComentario"])) {
			$descripcionComentario=$_POST["descripcionComentario"];
		}

		$this-> receta_model->createComentario($id_receta,$id_usuario,$tituloComentario,$descripcionComentario);

		switch ($receta->categoria) {//comprobar todas las recetas y asignarle la url correspondiente
			case 'infantil':
				$datos['usuario']["categoriaurl"] = "Alimentacion%20infantil";
				$datos['usuario']["categoria"] ='Alimentacion infantil';
				break;

			case 'tapas':
				$datos['usuario']["categoriaurl"] = "Aperitivos%20y%20tapas";
				$datos['usuario']["categoria"] ='Aperitivos y tapas';
				break;

			case 'sopas':
				$datos['usuario']["categoriaurl"] = "Sopas%20y%20cremas";
				$datos['usuario']["categoria"] ='Sopas y cremas';
				break;

			case 'pastas':
				$datos['usuario']["categoriaurl"] = "Arroces%20y%20pastas";
				$datos['usuario']["categoria"] ='Arroces y pastas';
				break;

			case 'potajes':
				$datos['usuario']["categoriaurl"] = "Potajes%20y%20platos de cuchara";
				$datos['usuario']["categoria"] ='Potajes y platos de cuchara';
				break;

			case 'verduras':
				$datos['usuario']["categoriaurl"] = "Verduras%20y%20hortalizas";
				$datos['usuario']["categoria"] ='Verduras y hortalizas';
				break;

		}

		$ingredientes = $this-> receta_model->getIngredientes($id_receta);
		$especificacionIngrediente = $this-> receta_model->getEspecificacionIngrediente();
		$nombreIngredientes =[];
		foreach ($ingredientes as $ing) {
			foreach ($especificacionIngrediente as $esping) {
				if ($esping->id == $ing->especificacioningrediente_id) {
					array_push($nombreIngredientes,$esping);
				}
			}
		}

		$valoraciones = $this-> receta_model->getValoraciones($id_receta);
		$allUsuarios = $this-> receta_model->getAllUser();
		$usuarios =[];
		foreach ($valoraciones as $valoracion) {
			foreach ($allUsuarios as $usuario) {
				echo "<script>console.log( 'Debug Objects: " . $valoracion . "' );</script>";
				if ($usuario['id'] == $valoracion["usuario_id"]) {
					array_push($usuarios,$usuario);
				}
			}
		}
			
			

		$datos['usuario']['valoraciones'] = $valoraciones;
		$datos['usuario']['usuarios'] = $usuarios;
		$datos['usuario']["receta"] = $receta;
		$datos['usuario']["datosIngredientes"] = $ingredientes;
		$datos['usuario']["nombreIngredientes"] = $nombreIngredientes;
		$datos['usuario']["id_receta"] = $id_receta;

		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'receta',$datos);

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			enmarcar($this, 'receta',$datos);
		}
	}
}
?>