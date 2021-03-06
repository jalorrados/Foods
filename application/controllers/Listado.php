<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

	public function index(){
		$datos['usuario']["listUser"] = "no";
		//falta pasarle el nombre de la categoria(recibida por get) en la que he pulsado y los datos de las recetas
		if (isset($_GET["categoria"])) {
				$datos['usuario']["categoria"] = $_GET["categoria"];
				$categoriabbdd = "";

				switch ($_GET["categoria"]) {//comprobar todas las recetas y asignarle la url correspondiente
					case 'Alimentacion infantil':
						$categoriabbdd = "infantil";
						break;

					case 'Aperitivos y tapas':
						$categoriabbdd = "tapas";
						break;

					case 'Sopas y cremas':
						$categoriabbdd = "sopas";
						break;

					case 'Arroces y pastas':
						$categoriabbdd = "pastas";
						break;

					case 'Potajes y platos de cuchara':
						$categoriabbdd = "potajes";
						break;

					case 'Verduras y hortalizas':
						$categoriabbdd = "verduras";
						break;
				}
				$this->load->model('listado_model');
				if (empty($_GET["limite"])) {//si limite esta vacio es que es la primera pagina y no se ha pulsado a otra
					//if (empty($_POST["ordenListado"]) || $_POST["ordenListado"]=="viejo") {
						$listado = $this-> listado_model->getListadoLimit($categoriabbdd,0);
					//}else{
						//$listado = $this-> listado_model->getListadoLimitDesc($categoriabbdd,0);
					//}
					
					$numRecetas = $this-> listado_model->getNumberRecipes($categoriabbdd);
					
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}else{
					//if (empty($_POST["ordenListado"]) || $_POST["ordenListado"]=="viejo") {
					//	$listado = $this-> listado_model->getListadoLimit($categoriabbdd,$_GET["limite"]);
					//}else{
						$listado = $this-> listado_model->getListadoLimit($categoriabbdd,$_GET["limite"]);
					//}
					$numRecetas = $this-> listado_model->getNumberRecipes($categoriabbdd,$_GET["limite"]);
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}
				//$listado = $this-> listado_model->getListado($categoriabbdd);
				$datos['usuario']["listado"] = $listado;

				if (isset($_GET["activo"])) {
					$datos['usuario']["paginacionactive"] = $_GET["activo"];
				}else{
					$datos['usuario']["paginacionactive"] =1;
				}
		}

		session_start();//iniciar sesion
		$datos['usuario']["listUser"] = "no";
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