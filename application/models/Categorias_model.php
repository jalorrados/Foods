<?php
class Categorias_model extends CI_Model {

	public function getNumberRecipes($categoria){//obtener todas las recetas segun la categoria

		 return R::count( 'receta', ' categoria = ? ', [ $categoria ] );

	}

}
?>
