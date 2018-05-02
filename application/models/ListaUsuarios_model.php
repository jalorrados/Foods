<?php
class ListaUsuarios_model extends CI_Model {

	public function getAllUser(){

		 return R::findAll('usuario');

	}

	public function getIdByEmail($email) {

		$user = R::findOne('usuario','email = ? ', [$email] );
		return $user["id"];
		
	}

	public function changePermisos($email,$rol){

		$usuario = R::load('usuario',$this->getIdByEmail($email));
		
		$usuario->rol = $rol;

		R::store($usuario);
	}

	public function deleteUser($email){
		$idUsuario = $this->getIdByEmail($email);
		$usuario = R::load('usuario',$idUsuario);
		$idRecetas = R::getCol( "SELECT id FROM receta WHERE usuario_id= :id ",  array(':id'=>(int)$idUsuario));
		$idValoraciones = R::getCol( "SELECT id FROM valoracion WHERE usuario_id= :id ",  array(':id'=>(int)$idUsuario));

		foreach ($idRecetas as $idReceta) {
			$idIngredientes=R::getCol( "SELECT id FROM ingrediente WHERE receta_id= :idr ",  array(':idr'=>(int)$idReceta));

			$idEspIngredientes=R::getCol( "SELECT especificacioningrediente_id FROM ingrediente WHERE receta_id= :ides ",  array(':ides'=>(int)$idReceta));

			foreach ($idEspIngredientes as $idEspIngrediente) {//elimino las especificaciones de los ingredientes
				R::exec("DELETE FROM especificacioningrediente WHERE id=".(int)$idEspIngrediente);
			}

			foreach ($idIngredientes as $idIngrediente) {//elimino los ingredientes
				R::exec("DELETE FROM ingrediente WHERE id=".(int)$idIngrediente);
			}

			R::exec("DELETE FROM receta WHERE id=".(int)$idReceta);//finalmente elimino la receta

		}
		
		foreach ($idValoraciones as $idValoracion) {
			R::exec("DELETE FROM valoracion WHERE id=".(int)$idValoracion);
		}

		R::trash($usuario);//elimino al usuario
	}

}
?>
