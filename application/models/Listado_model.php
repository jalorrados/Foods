<?php
class Listado_model extends CI_Model {

	public function getListado($categoria){//obtener todas las recetas segun la categoria

		 return R::find('receta','categoria = ? ', [$categoria] );

	}

}
?>
