<?php
class Inicio_model extends CI_Model {
	public function crearUsuario($apenom,$email,$telefono,$pass) {//crear usuario

		$user = R::findOne('usuario','email=?',[$email]);

		if ($user == null)  {
			$usuario = R::dispense ('usuario');
			$usuario -> apenom = $apenom;
			$usuario -> email = $email;
			$usuario -> telefono = $telefono;
			$usuario -> pass = $pass;
			$usuario -> urlimagen ="assets/img/avatar.png";//cuando te registras sale la imagen por defecto
			$usuario -> rol ="user";//rol por defecto
			R::store($usuario);
		}
		
		R::close();

	}

	public function getUser($email) {//encontrar un usuario segun su email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getAll() {//obtener todos los usuarios

		return R::findAll('usuario');
		
	}
}
?>