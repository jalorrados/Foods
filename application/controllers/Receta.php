<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receta extends CI_Controller {

	public function index(){
		if (isset($_GET["categoria"])) {
			$datos['usuario']["categoria"] = $_GET["categoria"];

			switch ($_GET["categoria"]) {//comprobar todas las recetas y asignarle la url correspondiente
				case 'Alimentacion infantil':
					$datos['usuario']["categoriaurl"] = "Alimentacion%20infantil";
					break;

				case 'Aperitivos y tapas':
					$datos['usuario']["categoriaurl"] = "Aperitivos%20y%20tapas";
					break;

				case 'Sopas y cremas':
					$datos['usuario']["categoriaurl"] = "Sopas%20y%20cremas";
					break;

				case 'Arroces y pastas':
					$datos['usuario']["categoriaurl"] = "Arroces%20y%20pastas";
					break;

				case 'Potajes y platos de cuchara':
					$datos['usuario']["categoriaurl"] = "Potajes%20y%20platos de cuchara";
					break;

				case 'Verduras y hortalizas':
					$datos['usuario']["categoriaurl"] = "Verduras%20y%20hortalizas";
					break;
			}

		}

		if (isset($_GET["idReceta"])) {
			$id=$_GET["idReceta"];
			$this->load->model('receta_model');
			$receta = $this-> receta_model->getRecetaById($id);
			$datos['usuario']["receta"] = $receta;
			
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
}
?>