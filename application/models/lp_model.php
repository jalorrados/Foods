<?php
class lp_model extends CI_Model {
	public function create_lp($nombre_lp) {
		$lp = R::findOne('lp','nombre=?',[$nombre_lp]);
		
		if ($lp == null)  {
			$lp = R::dispense ( 'lp' );
			$lp -> nombre = $nombre_lp;
			R::store($lp);
			R::close();
			}
		else {
			R::close();
			throw new Exception();
		}
	}

	/*public function getAll() {
		return  R::findAll('lp','order by nombre');
	}*/
	public function getAll($filtro) {
		return R::find('lp',"nombre like ?", [ '%'.$filtro.'%' ]);
	}

	public function borrarlp($id) {

		$lp = R::load('lp', $id);

		if($lp->id !=0){
			R::trash($lp);
		}

		R::close();

	}

	public function modificarlp($id, $nombre){
		$lp = R::load('lp', $id);

		if($lp->id !=0){
			$lp->nombre = $nombre;
			R::store($lp);
		}

		R::close();
	}
}
?>