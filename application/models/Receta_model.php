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
		//$arrayDatosIngredientes =[];
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

	public function createComentario($id_receta,$id_usuario,$tituloComentario,$descripcionComentario){

		$receta = R::load("receta",$id_receta);
		$usuario = R::load("usuario",$id_usuario);
		$valoracion = R::dispense("valoracion");

		$valoracion->titulo =$tituloComentario;
		$valoracion->descripcion =$descripcionComentario;
		$valoracion->usuario=$usuario;

		$receta->xownValoracionList[]=$valoracion;
		R::store($receta);

	}

	public function getValoraciones($id_receta){//obtener una receta segun el id

		 return R::find('valoracion','receta_id = ? ', [(int)$id_receta] );
		

	}

	public function getAllUser(){//obtener una receta segun el id

		 return R::findAll('usuario');

	}


	public function getNumberComentarios($id_receta){//obtener numero de recetas segun la categoria

		 return R::count('valoracion','receta_id = ? ', [(int)$id_receta] );
		

	}

}
?>
