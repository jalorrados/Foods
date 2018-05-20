<?php
class Receta_model extends CI_Model {

	public function getRecetaById($id){//obtener una receta segun el id

		 return R::load('receta',$id);

	}

	public function getEspecificacionIngrediente(){//obtener una receta segun el id

		 return R::findAll('especificacioningrediente');

	}

	public function getIngredientes($id){

		$ingredientesReceta =[];
		//$arrayDatosIngredientes =[];
		$allIngrediente =  R::findAll('ingrediente');

		foreach ($allIngrediente as $ing) {

			if ($ing->receta_id == $id) {
				array_push($ingredientesReceta, $ing);
			}
		}
		/*for ($i=0; $i < count($ingredientesReceta); $i++) { 
			$arrayDatosIngredientes=[$ingredientesReceta[$i]->especificacioningrediente_id[$i]->nombre,$ingredientesReceta[$i]->cantidad,$ingredientesReceta[$i]->unidades];
		}

		return $arrayDatosIngredientes;*/
		return $ingredientesReceta;
	}

	public function createComentario($id_receta,$id_usuario,$tituloComentario,$descripcionComentario){
		$titulonulo=R::getCell( 'SELECT titulo FROM valoracion where receta_id = ? and usuario_id = ?', [(int)$id_receta,(int)$id_usuario] );
		
		if ($titulonulo != "no") {
			$receta = R::load("receta",$id_receta);
			$usuario = R::load("usuario",$id_usuario);
			$valoracion = R::dispense("valoracion");

			$valoracion->titulo =$tituloComentario;
			$valoracion->descripcion =$descripcionComentario;
			$valoracion->puntuacion =null;
			$valoracion->usuario=$usuario;

			$receta->xownValoracionList[]=$valoracion;
			R::store($receta);

		}else{
			$id=R::getCell( 'SELECT id FROM valoracion where receta_id = ? and usuario_id = ?', [(int)$id_receta,(int)$id_usuario] );

			$valoracion = R::load("valoracion",$id);
			$valoracion->titulo =$tituloComentario;
			$valoracion->descripcion =$descripcionComentario;

			R::store($valoracion);
		}

	}

	public function getValoraciones($id_receta){//obtener valoracion por id de la receta

		 return R::find('valoracion','receta_id = ? ', [(int)$id_receta] );
		

	}

	public function getAllUser(){

		 return R::findAll('usuario');

	}


	public function getNumberComentarios($id_receta){//obtener numero de recetas segun la categoria

		return R::count('valoracion','receta_id = ? ', [(int)$id_receta]);
		

	}

	public function setStars($id_usuario,$id_receta,$puntos){
		$id=R::getCell( 'SELECT id FROM valoracion where receta_id = ? and usuario_id = ?', [(int)$id_receta,(int)$id_usuario] );

		if ($id !=null) {
			$valoracion = R::load("valoracion",$id);
			$valoracion->puntuacion = $puntos;


			R::store($valoracion);
		}else{
			$receta = R::load("receta",$id_receta);
			$usuario = R::load("usuario",$id_usuario);
			$valoracion = R::dispense("valoracion");

			$valoracion->titulo ="no";
			$valoracion->descripcion ="no";
			$valoracion->puntuacion =$puntos;
			$valoracion->usuario=$usuario;

			$receta->xownValoracionList[]=$valoracion;
			R::store($receta);
		}
		

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


	public function getEmailUserByIdReceta($id_receta){
		$id=R::getCell( 'SELECT usuario_id FROM receta where id = ?', [(int)$id_receta] );
		$email_user=R::getCell( 'SELECT email FROM usuario where id = ?', [(int)$id] );

		return $email_user;
	}

	public function deleteRecipe($idReceta){

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

	public function editReceta($id){//actualiza el usuario
		$user = R::load('receta', $id);

		if($user->id !=0){
			$user->apenom = $nombre;
			$user->telefono = $telefononuevo;
			$user->urlimagen = $urlimagennueva;
			R::store($user);
		}

		R::close();
	}


}
?>
