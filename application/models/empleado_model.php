<?php
class empleado_model extends CI_Model {
	public function create_empleado($nombre, $apellido1, $apellido2, $contrasena, $telefono, $idciudad) {
		$empleado = R::findOne('empleado','nombre=?',[$nombre]);
		
		if ($empleado == null)  {
			$empleado = R::dispense ( 'empleado' );
			$empleado -> nombre = $nombre;
			$empleado -> apellido1 = $apellido1;
			$empleado -> apellido2 = $apellido2;
			$empleado -> contrasena = $contrasena;
			$empleado -> telefono = $telefono;

			$ciudad = R::load('ciudad', $idciudad);

			$empleado -> ciudad = $ciudad;

			R::store($empleado);
			R::close();
			}
		else {
			R::close();
			throw new Exception();
		}
	}

	/*public function getAll() {
		return  R::findAll('empleado','order by nombre');
	}*/
	public function getAll($filtro) {
		return R::find('empleado',"nombre like ?", [ '%'.$filtro.'%' ]);
	}

	public function borrarempleado($id) {

		$empleado = R::load('empleado', $id);

		if($empleado->id !=0){
			R::trash($empleado);
		}

		R::close();

	}

	public function modificarempleado($id, $nombre){
		$empleado = R::load('empleado', $id);

		if($empleado->id !=0){
			$empleado->nombre = $nombre;
			R::store($empleado);
		}

		R::close();
	}
}
?>