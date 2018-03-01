<?php
class lp extends CI_Controller {
	public function crear() {
		enmarcar($this, 'lp/crearGET');
	}
	
	public function crearPost() {
		$this->load->model('lp_model');
		
		$nombre_lp = isset($_POST['lp']) ? $_POST['lp'] : null;
		
		try {
			$this -> lp_model -> create_lp($nombre_lp);
			$datos['mensaje']['texto'] = "Lenguaje $nombre_lp creado correctamente";
			$datos['mensaje']['nivel'] = 'ok';
		}
		catch (Exception $e) {
			$datos['mensaje']['texto'] = "Lenguaje $nombre_lp duplicado";
			$datos['mensaje']['nivel'] = 'error';
		}
		$this->load->view('lp/mostrar_mensaje',$datos);
	}

	public function listar() {
		/*$this->load->model('lp_model');
		$datos['body']['lenguajes'] = $this->lp_model->getAll();
		enmarcar($this, 'lp/listar',$datos);*/
		$this->listarPost();
	}

	public function listarPost($filtrop='') {
		if ($filtrop == '') {
			$filtro = isset($_POST['filtro'])?$_POST['filtro']:'';
		}else{
			$filtro = $filtrop;
		}
		
		$this->load->model('lp_model');
		$datos['lps'] = $this->lp_model->getAll($filtro);
		$datos['filtro'] = $filtro;
		enmarcar($this, 'lp/listar',$datos);
	}

	public function borrar() {
		$id = $_POST["lpid"];
		$this->load->model('lp_model');
		$this ->lp_model->borrarlp($id);
		//$this->listar();
		$this->listarPost($_POST['filtrohidden']);
	}

	public function modificar() {

		$datos['nombre'] = $_POST['lpnombre'];
		$datos['id'] = $_POST['lpid'];
		$datos['filtro'] = $_POST['filtrohidden'];

		enmarcar($this, 'lp/modificar', $datos);
	}

	public function modificardos() {

		$id = $_POST["lpiddos"];
		$nombre = $_POST["lpnombredos"];
		$filtro = $_POST["filtrohiddendos"];
		$this->load->model('lp_model');
		$this->lp_model->modificarlp($id, $nombre);
		$this->listarPost($filtro);

	}
}
?>