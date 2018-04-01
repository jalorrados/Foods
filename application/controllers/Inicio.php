<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){
		$dir = "./fotos";
		if (!is_dir ($dir)) {//crea carpea para almacenar las fotos
			mkdir($dir, 0777);
		}
		session_start();//iniciar sesion
		if (empty($_SESSION)) {//si esta vacia te lleva directamente a incio
			enmarcar($this, 'inicio');

		}else{//si no esta vacia te pasa los datos a las vistas
			$datos['usuario']["apenom"] = $_SESSION["apenom"];
			$datos['usuario']["telefono"] = $_SESSION["telefono"];
			$datos['usuario']["email"] = $_SESSION["email"];
			$datos['usuario']["rol"] = $_SESSION["rol"];
			enmarcar($this, 'inicio',$datos);
		}
		
	}

	public function loginPostComprobar(){//recibe la peticion ajax para comprobar si existe el usuario o no
		$valido = 'no';

		$this->load->model('inicio_model');//carga el modelo
		$email = $_GET["comprobarEmailLogin"];
		$pass = $_GET["comprobarPassLogin"];

		$usuario = $this -> inicio_model -> getUser($email);//obtengo el usuario para coger su rol

		if (isset($usuario["email"]) && ($usuario["email"]!=null) && ($usuario["email"]==$email)) {//que exista el email
			if ($usuario["pass"] == $pass) {//que coincidan las contraseñas
				$valido = 'si';
			}else{
				$valido = 'no';
			}
		}else{
			$valido = 'no';
		}

		echo $valido;

	}

	public function loginPost(){
		session_start();
		$this->load->model('inicio_model');//carga el modelo

		$usuario = $this -> inicio_model -> getUser($_POST["loginemail"]);//obtiene el usuario del login
		if ($usuario["pass"] == $_POST["loginpass"]) {//si la pass escrita coincide con la de la bbdd te loguea y pone los datos a la sesion

			$_SESSION["apenom"]=$usuario["apenom"];
			$_SESSION["email"]=$usuario["email"];
			$_SESSION["telefono"]=$usuario["telefono"];
			$_SESSION["urlimagen"]=$usuario["urlimagen"];
			$_SESSION["rol"]=$usuario["rol"];

			header('Location:'.base_url().'perfil');
		}
	}

	public function signPostComprobar(){//recibe la peticion ajax para comprobar si existe el usuario o no
		$existe = 'no';

		$this->load->model('inicio_model');//carga el modelo
		$email = $_GET["comprobarEmail"];

		$usuario = $this -> inicio_model -> getUser($email);//obtengo el usuario para coger su rol

		if (isset($usuario["email"]) && ($usuario["email"]!=null) && ($usuario["email"]==$email)) {//que exista el email
			$existe = 'si';
		}else{
			$existe = 'no';
		}

		echo $existe;

	}

	public function signPost(){
		$this->load->model('inicio_model');//carga el modelo

		//Falta comprobar con isset o empty
		$user = $_POST["signuser"];
		$email = $_POST["signemail"];
		$telefono = $_POST["signtlf"];
		$pass = $_POST["signpass"];

		$usuario = $this -> inicio_model -> getUser($email);//obtengo el usuario para coger su rol

		$this -> inicio_model -> crearUsuario($user,$email,$telefono,$pass);//crea el usuario
		session_start();//inicia sesion y le pasa los datos del usuario
		$_SESSION["apenom"]=$user;
		$_SESSION["email"]=$email;
		$_SESSION["telefono"]=$telefono;
		$_SESSION["urlimagen"]="assets/img/avatar.png";//cuando te registras sale la imagen por defecto
		$_SESSION["rol"]=$usuario["rol"];

		header('Location:'.base_url().'perfil');
	}

	public function logOut(){//cerrar sesion borra las variables de la sesion y la destruye
		session_start();
		session_unset();
		session_destroy();
		header('Location:'.base_url().'inicio');
	}

	public function buscar(){
		if (isset($_POST["buscar"])) {
			session_start();
			$datos['usuario']["palabraBuscada"] = $_POST["buscar"];
				$busqueda = $_POST["buscar"];
			if (isset($_SESSION) && $_SESSION!=null && $_SESSION!="") {

				$datos['usuario']["apenom"] = $_SESSION["apenom"];
				$datos['usuario']["telefono"] = $_SESSION["telefono"];
				$datos['usuario']["email"] = $_SESSION["email"];
				$datos['usuario']["rol"] = $_SESSION["rol"];


			}else{
				session_unset();
				session_destroy();
			}
			
			$this->load->model('inicio_model');


			if (empty($_GET["limite"])) {
					$listadoBuscar = $this-> inicio_model->getBuscarNombre($busqueda,0);
					$numRecetas = $this-> inicio_model->getNumberRecipes($busqueda);
					echo $busqueda;
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}else{
					$listadoBuscar = $this-> inicio_model->getBuscarNombre($busqueda,$_GET["limite"]);
					$numRecetas = $this-> inicio_model->getNumberRecipes($busqueda);
					echo $busqueda;
					
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}
				if (isset($_GET["activo"])) {
					$datos['usuario']["paginacionactive"] = $_GET["activo"];
				}else{
					$datos['usuario']["paginacionactive"] =1;
				}


			$datos['usuario']["listadoBuscar"] = $listadoBuscar;
			enmarcar($this, 'listadoBuscar',$datos);
		}else{
			session_start();
			if (isset($_SESSION) && $_SESSION!=null && $_SESSION!="") {

				$datos['usuario']["apenom"] = $_SESSION["apenom"];
				$datos['usuario']["telefono"] = $_SESSION["telefono"];
				$datos['usuario']["email"] = $_SESSION["email"];
				$datos['usuario']["rol"] = $_SESSION["rol"];


			}else{
				session_unset();
				session_destroy();
			}
			
			if (isset($_GET["palabraBuscada"])) {
				$busqueda =$_GET["palabraBuscada"];
				$datos['usuario']["palabraBuscada"] = $_GET["palabraBuscada"];
			}
			$this->load->model('inicio_model');


			if (empty($_GET["limite"])) {
					$listadoBuscar = $this-> inicio_model->getBuscarNombre($busqueda,0);
					$numRecetas = $this-> inicio_model->getNumberRecipes($busqueda);
					echo $busqueda;
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}else{
					$listadoBuscar = $this-> inicio_model->getBuscarNombre($busqueda,$_GET["limite"]);
					$numRecetas = $this-> inicio_model->getNumberRecipes($busqueda);
					echo $busqueda;
					
					if ($numRecetas%5 == 0) {
						$datos['usuario']["paginas"] = $numRecetas/5;
						
						
					}else{
						$datos['usuario']["paginas"] = ($numRecetas/5)+1;
						
					}
					
				}
				if (isset($_GET["activo"])) {
					$datos['usuario']["paginacionactive"] = $_GET["activo"];
				}else{
					$datos['usuario']["paginacionactive"] =1;
				}


			$datos['usuario']["listadoBuscar"] = $listadoBuscar;
			enmarcar($this, 'listadoBuscar',$datos);
		}
	}

}
?>