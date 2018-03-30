<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function index(){

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			$nombreCategorias=["infantil","tapas","sopas","pastas","potajes","verduras"];
			$totalNumCategorias = [];//meto todas las cantidades de las categorias en un array que recorreré en la vista de categorias
			$this->load->model('categorias_model');
			foreach ($nombreCategorias as $categoria) {

				array_push($totalNumCategorias,$this-> categorias_model->getNumberRecipes($categoria));//obtengo la cantidad de recetas de una categoria y la meto en el array
			}

			$datos['usuario']["totalNumCategorias"] = $totalNumCategorias;//le paso los datos a la vista


			enmarcar($this, 'categorias',$datos);

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];

			$nombreCategorias=["infantil","tapas","sopas","pastas","potajes","verduras"];
			$totalNumCategorias = [];//meto todas las cantidades de las categorias en un array que recorreré en la vista de categorias
			$this->load->model('categorias_model');
			foreach ($nombreCategorias as $categoria) {

				array_push($totalNumCategorias,$this-> categorias_model->getNumberRecipes($categoria));//obtengo la cantidad de recetas de una categoria y la meto en el array
			}

			$datos['usuario']["totalNumCategorias"] = $totalNumCategorias;//le paso los datos a la vista


			enmarcar($this, 'categorias',$datos);
		}
		
	}
}
?>