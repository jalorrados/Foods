<?php
class Listado_model extends CI_Model {

	public function getUser($email) {//encontrar un usuario segun si email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getIdByEmail($email) {//encontrar un usuario segun si email

		$user = R::findOne('usuario','email = ? ', [$email] );
		return $user["id"];
		
	}


	public function getListado($categoria){//obtener todas las recetas segun la categoria

		 return R::find('receta','categoria = ? ', [$categoria] );

	}

	/*public function getAll() {//obtener totos los usuarios

		return R::findAll('usuario');
		
	}*/
}
?>
