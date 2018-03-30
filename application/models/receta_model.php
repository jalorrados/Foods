<?php
class Receta_model extends CI_Model {

	public function getRecetaById($id){//obtener una receta segun el id

		 return R::load('receta',$id);

	}

}
?>
