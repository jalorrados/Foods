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

	/*public function getBuscarNombre($palabra){
		return R::find("receta","nombre LIKE ?",["%".$palabra."%"]);
	}*/

	public function getBuscarNombre($palabra,$limite){//obtener todas las recetas segun la categoria y un limite

		return R::getAll( "SELECT id,nombre,preparacion,categoria,urlimagen FROM receta WHERE nombre LIKE :nom LIMIT :lim ,5",  array(':nom'=>'%'.$palabra.'%' ,':lim'=>(int)$limite));

	}

	public function getNumberRecipes($palabra){//obtener numero de recetas segun la categoria

		 return R::count("receta","nombre LIKE ?",["%".$palabra."%"]);
		

	}

	/*public function getBuscarPreparacion($palabra){
		return R::find("receta","preparacion LIKE ?",["%".$palabra."%"]);
	}*/
}
?>
