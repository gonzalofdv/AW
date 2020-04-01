<?php
require_once('EquipoDAO.php');

class EquipoSA {
	// Atributos
    protected $equipoDAO;
	
	public function newEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		equipoDAO->insert($equipo);
	}
	
	public function updateEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		equipoDAO->update($equipo);
	}
	
	public function deleteEquipo(EquipoTransfer $equipo){
		if(!$this->equipoDAO){
			$this->equipoDAO = new EquipoDAO();
		}
		equipoDAO->delete($equipo);
	}
	
}

?>