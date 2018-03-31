<?php
class Receta_model extends CI_Model {

	public function getRecetaById($id){//obtener una receta segun el id

		 return R::load('receta',$id);

	}

	public function getEspecificacionIngrediente(){//obtener una receta segun el id

		 return R::findAll('especificacioningrediente');

	}

	public function getIngredientes($id){

		$ingredientesReceta =[];
		$arrayDatosIngredientes =[];
		$allIngrediente =  R::findAll('ingrediente');

		foreach ($allIngrediente as $ing) {

			if ($ing->receta_id == $id) {
				array_push($ingredientesReceta, $ing);
			}
		}
		/*for ($i=0; $i < count($ingredientesReceta); $i++) { 
			$arrayDatosIngredientes=[$ingredientesReceta[$i]->especificacioningrediente_id[$i]->nombre,$ingredientesReceta[$i]->cantidad,$ingredientesReceta[$i]->unidades];
		}

		return $arrayDatosIngredientes;*/
		return $ingredientesReceta;
	}

}
?>
