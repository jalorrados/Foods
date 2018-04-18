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

	public function createRecipe($idUsuario,$nombrereceta,$preparacion,$npersonas,$nombreingrediente,$cantidad,$unidades,$categoria,$dificultad,$urlimagen){

		$usuario = R::load('usuario', $idUsuario);
		$receta = R::dispense ('receta');
		$receta -> nombre = $nombrereceta;
		$receta -> preparacion = $preparacion;
		$receta -> numpersonas = $npersonas;
		$receta -> categoria = $categoria;
		$receta -> dificultad = $dificultad;
		$receta -> urlimagen = $urlimagen;
		$receta -> usuario = $usuario;

		for ($i=0; $i < count($nombreingrediente); $i++) {
			$especificacioningrediente = R::dispense ('especificacioningrediente');
			$ingrediente = R::dispense ('ingrediente');
			$especificacioningrediente -> nombre = $nombreingrediente[$i];
			$ingrediente -> cantidad = $cantidad[$i];
			$ingrediente -> unidades = $unidades[$i];
			$ingrediente -> receta = $receta;
			$ingrediente -> especificacioningrediente = $especificacioningrediente;
			R::store($ingrediente);
		}
		
		R::close();
		
	}

	/*public function getRecipe($nombre) {//encontrar un usuario segun si email

		return R::findOne('usuario','nombre = ? ', [$nombre] );
		
	}

	public function getIdRecipeByEmail($nombre) {//encontrar un usuario segun si email

		$user = R::findOne('usuario','nombre = ? ', [$email] );
		return $user["id"];
		
	}*/

	public function getAll() {//obtener todos los usuarios

		return R::findAll('usuario');
		
	}
	
	public function getRecetasUsuario($usuario){//obtener todas las recetas de un usuario
	
		return R::findAll('receta','usuario_id = ? ', [$usuario] );

	}
}
?>
