<?php
class CrearReceta_model extends CI_Model {

	public function getUser($email) {//encontrar un usuario segun si email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getIdByEmail($email) {//encontrar un usuario segun si email

		$user = R::findOne('usuario','email = ? ', [$email] );
		return $user["id"];
		
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


	public function getAll() {//obtener todos los usuarios

		return R::findAll('usuario');
		
	}
	
	public function getRecetasUsuario($usuario){//obtener todas las recetas de un usuario
	
		return R::findAll('receta','usuario_id = ? ', [$usuario] );

	}
}
?>
