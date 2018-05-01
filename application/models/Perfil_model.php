<?php
class Perfil_model extends CI_Model {

	public function getUser($email) {//encontrar un usuario segun si email

		return R::findOne('usuario','email = ? ', [$email] );
		
	}

	public function getIdByEmail($email) {

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

	public function getMediaPuntuacion($id_receta){
		$allPuntuaciones = R::getCol( "SELECT puntuacion FROM valoracion WHERE receta_id= :id ",  array(':id'=>(int)$id_receta));
		$total = 0;

		foreach ($allPuntuaciones as $stars) {
			$total+=$stars;
		}

		if (count($allPuntuaciones)==0) {
			return 0;
		}else{
			return $total/count($allPuntuaciones);
		}
	}

	public function getMediaUser($user_id){
		$idRecetas = R::getCol( "SELECT id FROM receta WHERE usuario_id= :iduser ",  array(':iduser'=>(int)$user_id));
		$mediaUser = 0;
		if ($idRecetas != null && count($idRecetas)!=0) {

			foreach ($idRecetas as $idReceta) {
				
				if ($this->getMediaPuntuacion($idReceta)!= null) {
					$mediaUser+=$this->getMediaPuntuacion($idReceta);
				}
				
			}
			$mediaUser= (int)$mediaUser/(int)count($idRecetas);
		}

		return $mediaUser;
	}

}
?>
