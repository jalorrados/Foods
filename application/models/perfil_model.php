<?php
class Perfil_model extends CI_Model {

	public function getUser($email) {//encontrar un usuario segun si email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getIdByEmail($email) {//encontrar un usuario segun si email

		$user = R::findOne('usuario','email = ? ', [$email] );
		return $user["id"];
		
	}


	public function updateUser($id,$nombre,$telefononuevo,$urlimagennueva){//actualiza el usuario
		$user = R::load('usuario', $id);

		if($user->id !=0){
			$user->apenom = $nombre;
			$user->telefono = $telefononuevo;
			$user->urlimagen = $urlimagennueva;
			R::store($user);
		}

		R::close();
	}

	public function getAll() {//obtener totos los usuarios

		return R::findAll('usuario');
		
	}
}
?>