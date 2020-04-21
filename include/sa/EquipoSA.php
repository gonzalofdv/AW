<?php
require_once('EquipoDAO.php');

class EquipoSA {
	// Atributos
    protected $equipoDAO;
	
	public function newEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		$aux = $this->equipoDAO;
		$aux->insert($equipo);
	}
	
	public function updateEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		$aux = $this->equipoDAO;
		$aux->update($equipo);
	}
	
	public function deleteEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		$aux = $this->equipoDAO;
		$aux->delete($equipo);
	}
	
}

?>