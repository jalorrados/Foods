<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receta extends CI_Controller {

	public function index(){
		$datos['usuario']["listUser"] = "no";
		if (isset($_GET["categoria"])) {
			//$datos['usuario']["categoria"] = $_GET["categoria"];

			switch ($_GET["categoria"]) {//comprobar todas las recetas y asignarle la url correspondiente
				case 'Alimentacion infantil':
				case 'infantil':
					$datos['usuario']["categoriaurl"] = "Alimentacion%20infantil";
					$datos['usuario']["categoria"] ='Alimentacion infantil';
					break;

				case 'Aperitivos y tapas':
				case 'tapas':
					$datos['usuario']["categoriaurl"] = "Aperitivos%20y%20tapas";
					$datos['usuario']["categoria"] ='Aperitivos y tapas';
					break;

				case 'Sopas y cremas':
				case 'sopas':
					$datos['usuario']["categoriaurl"] = "Sopas%20y%20cremas";
					$datos['usuario']["categoria"] ='Sopas y cremas';
					break;

				case 'Arroces y pastas':
				case 'pastas':
					$datos['usuario']["categoriaurl"] = "Arroces%20y%20pastas";
					$datos['usuario']["categoria"] ='Arroces y pastas';
					break;

				case 'Potajes y platos de cuchara':
				case 'potajes':
					$datos['usuario']["categoriaurl"] = "Potajes%20y%20platos de cuchara";
					$datos['usuario']["categoria"] ='Potajes y platos de cuchara';
					break;

				case 'Verduras y hortalizas':
				case 'verduras':
					$datos['usuario']["categoriaurl"] = "Verduras%20y%20hortalizas";
					$datos['usuario']["categoria"] ='Verduras y hortalizas';
					break;
			}

		}

		if (isset($_GET["idReceta"])) {
			$id=$_GET["idReceta"];
			$datos['usuario']['idrecetaactual'] = $id;
			$this->load->model('receta_model');
			$receta = $this-> receta_model->getRecetaById($id);
			$ingredientes = $this-> receta_model->getIngredientes($id);
			$especificacionIngrediente = $this-> receta_model->getEspecificacionIngrediente();
			$nombreIngredientes =[];
			foreach ($ingredientes as $ing) {
				foreach ($especificacionIngrediente as $esping) {
					if ($esping->id == $ing->especificacioningrediente_id) {
						array_push($nombreIngredientes,$esping);
					}
				}
			}
			
			$valoraciones = $this-> receta_model->getValoraciones($id);
			$allUsuarios = $this-> receta_model->getAllUser();
			$usuarios =[];
			foreach ($valoraciones as $valoracion) {
				foreach ($allUsuarios as $usuario) {
					if ($usuario['id'] == $valoracion["usuario_id"]) {
						if ($valoracion["titulo"]!="no") {//solo mete en el array a los usuarios que han comentado
							array_push($usuarios,$usuario);
						}
					}
				}
			}
			
			$datos['usuario']['media'] = $this -> receta_model -> getMediaPuntuacion($id);
			$datos['usuario']['useremailbyidreceta'] = $this -> receta_model -> getEmailUserByIdReceta($id);
			$datos['usuario']['valoraciones'] = $valoraciones;
			$datos['usuario']['usuarios'] = $usuarios;
			$datos['usuario']["receta"] = $receta;
			$datos['usuario']["datosIngredientes"] = $ingredientes;
			$datos['usuario']["nombreIngredientes"] = $nombreIngredientes;
			$datos['usuario']["id_receta"] = $id;
			
		}

		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'receta',$datos);

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			enmarcar($this, 'receta',$datos);
		}
		
	}
	public function crearComentario(){
		session_start();

		date_default_timezone_set('Europe/Madrid');
		$date = date('d/m/Y h:i:s a', time());

		$this->load->model('receta_model');
		$this->load->model('perfil_model');

		$id_usuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);

		
		if (isset($_POST["recetaId"])) {
			$id_receta =$_POST["recetaId"];
			$receta = $this-> receta_model->getRecetaById($id_receta);
			$valoraciones = $this -> receta_model -> getValoraciones($id_receta);
			$datos['usuario']['valoraciones'] = $valoraciones;
			//$num_comentarios = $this -> receta_model -> getNumberComentarios($id_receta);
			//$datos['usuario']['num_comentrios'] = $num_comentarios;
		} 

		if (isset($_POST["tituloComentario"])) {
			$tituloComentario=$_POST["tituloComentario"];
		}

		if (isset($_POST["descripcionComentario"])) {
			$descripcionComentario=$_POST["descripcionComentario"];
		}

		$this-> receta_model->createComentario($id_receta,$id_usuario,$tituloComentario,$descripcionComentario,$date);
		header("Location:".base_url()."receta?categoria=".$_POST["categoriahidden"]."&idReceta=".$_POST["recetaidhidden"]);

		
	}

	public function setRating(){
		session_start();
		$this->load->model('perfil_model');
		$this->load->model('receta_model');

		if (isset($_SESSION) && $_SESSION!=null && $_SESSION!="") {
			$id_usuario = $this -> perfil_model -> getIdByEmail($_SESSION["email"]);
			//echo $this -> receta_model -> getMediaPuntuacion($_POST["idReceta"]);

			if (isset($_POST["rating"]) && isset($_POST["idReceta"])) {
				$this->load->model('receta_model');
				$this-> receta_model->setStars($id_usuario,$_POST["idReceta"],$_POST["rating"]);
			
			}
		}
		
	}

	public function eliminarReceta(){
		$datos = $_POST["deleteRecipe"];

		$recetaId = explode("-",$datos);

		$this->load->model('receta_model');
		$this -> receta_model -> deleteRecipe($recetaId[1]);
		header("Location:".base_url()."listado?categoria=".$recetaId[0]);
	}

	public function editarReceta(){
		$datos['usuario']["listUser"] = "no";
		session_start();
		$info = $_GET["editRecipe"];
		$numing = $_GET["numing"];

		$recetaId = explode("-",$info);

		$this->load->model('receta_model');
		$receta = $this-> receta_model->getRecetaById($recetaId[1]);

		$ingredientes = $this-> receta_model->getIngredientes($recetaId[1]);
			$especificacionIngrediente = $this-> receta_model->getEspecificacionIngrediente();
			$nombreIngredientes =[];
			foreach ($ingredientes as $ing) {
				foreach ($especificacionIngrediente as $esping) {
					if ($esping->id == $ing->especificacioningrediente_id) {
						array_push($nombreIngredientes,$esping);
					}
				}
			}

		$datos['usuario']["receta"] = $receta;
		$datos['usuario']["datosIngredientes"] = $ingredientes;
		$datos['usuario']["nombreIngredientes"] = $nombreIngredientes;
		$datos['usuario']["numing"] = $numing;
		$datos['usuario']["apenom"] = $_SESSION["apenom"];
		$datos['usuario']["telefono"] = $_SESSION["telefono"];
		$datos['usuario']["email"] = $_SESSION["email"];
		$datos['usuario']["rol"] = $_SESSION["rol"];
		enmarcar($this, 'editarReceta',$datos);
		//header("Location:".base_url()."listado?categoria=".$recetaId[0]);
	}

	public function postEditarReceta(){
		session_start();
		$this->load->model('Receta_model');//carga el modelo
		$this->load->model('Perfil_model');//carga el modelo
		$idReceta = $_POST["idRecetaEscondido"];
		$nombrereceta = $_POST["nombreReceta"];
		$preparacion = $_POST["preparacionReceta"];
		$npersonas = $_POST["numPersonas"];
		//$ningredientes = $_POST["numIngredientes"];
		$nombreingrediente = array();
		$cantidad = array();
		$unidades = array();
		$categoria = $_POST["categoriaReceta"];
		$dificultad = $_POST["dificultad"];
		$previewImagensrc = $_POST["previewImagensrc"];

		/****Cogemos la imgen y la copiamos a la carpeta correspondiente****/
		$nombreimagenhidden = $_POST['hiddenimgeditareceta'];
		$nombreimagen = $_FILES['imgReceta']['name'];
		$carpeta = "./fotos/".$_SESSION["email"];

		//cogemos la url de la imagen para meterla en la bbdd
		if (isset($nombreimagen) && $nombreimagen != "" && $nombreimagen != " " && $nombreimagen != null) {
			//echo "<script>console.log( 'Entra en issets: " . $nombreimagen . "' );</script>";
			copy ( $_FILES['imgReceta']['tmp_name'], $carpeta."/".$nombreimagen );
			$urlimagen = "fotos/".$_SESSION["email"]."/".$nombreimagen;

		}else{
			//echo "<script>console.log( 'preview: " . $previewImagensrc . "' );</script>";
			//$cosa=explode($_SESSION["email"]."/",$previewImagensrc);
			//echo "<script>console.log( 'cosa de 1: " . $cosa[1] . "' );</script>";
			//$nombreimagen=$cosa[1];
			//copy ( $_FILES['imgReceta']['tmp_name'], $carpeta."/".$nombreimagen );
			//$urlimagen = "fotos/".$_SESSION["email"]."/".$nombreimagen;
			//echo "<script>console.log( 'url imagen: " . $urlimagen . "' );</script>";
			$cosa = explode("/Foods/",$nombreimagenhidden);
			$urlimagen = $cosa[1];

		}

		for ($i=0; $i < 100; $i++) {
			if (isset($_POST["ingrediente" . $i])) {
				array_push($nombreingrediente, $_POST["ingrediente" . $i]);
				array_push($cantidad, $_POST["cantidad" . $i]);
				array_push($unidades, $_POST["unidad" . $i]);

			}else{
				continue;
			}

		}
		
		$idUsuario = $this -> Perfil_model -> getIdByEmail($_SESSION["email"]);//obtiene el id del usuario

		$this -> Receta_model -> editReceta($idReceta,$idUsuario,$nombrereceta,$preparacion,$npersonas,$nombreingrediente,$cantidad,$unidades,$categoria,$dificultad,$urlimagen);//modifica la receta

		header('Location:'.base_url().'inicio');//carga la vista para crear una nueva receta
	}
	
}
?>