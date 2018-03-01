<?php
class Empleado extends CI_Controller{
	public function crear() {
		$this->load->model("ciudad_model");
		$datos["ciudades"] = $this->ciudad_model->getAll();
		enmarcar($this, 'empleado/crearGET',$datos);
	}
	
	public function crearPost() {
		$this->load->model('empleado_model');
		
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : null;
		$apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : null;
		$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
		$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
		$idciudad = isset($_POST['ciudades']) ? $_POST['ciudades'] : null;
		
		try {
			$this -> empleado_model -> create_empleado($nombre, $apellido1, $apellido2, $contrasena, $telefono, $idciudad);
			$datos['mensaje']['texto'] = "Empleado $nombre creado correctamente";
			$datos['mensaje']['nivel'] = 'ok';
		}
		catch (Exception $e) {
			$datos['mensaje']['texto'] = "Empleado $nombre duplicado";
			$datos['mensaje']['nivel'] = 'error';
		}
		$this->load->view('empleado/mostrar_mensaje',$datos);
	}
}

?>