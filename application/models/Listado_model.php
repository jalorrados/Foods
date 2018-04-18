<?php
class Listado_model extends CI_Model {

	public function getListado($categoria){//obtener todas las recetas segun la categoria

		 return R::find('receta','categoria = ? ', [$categoria] );

	}

	public function getListadoLimit($categoria,$limite){//obtener todas las recetas segun la categoria y un limite

		return R::getAll( "SELECT id,nombre,preparacion,urlimagen FROM receta WHERE categoria= :cat LIMIT :lim ,5",  array(':cat'=>$categoria ,':lim'=>(int)$limite));

	}

	public function getNumberRecipes($categoria){//obtener numero de recetas segun la categoria

		 return R::count('receta','categoria = ? ', [$categoria] );
		

	}

}
?>
