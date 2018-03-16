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
			R::store($usuario);
		}
		else {
			throw new Exception("email duplicada");
		}
		R::close();
	}

	public function getUser($email) {//encontrar un usuario segun si email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getAll() {//obtener totos los usuarios

		return R::findAll('usuario');
		
	}
}
?>