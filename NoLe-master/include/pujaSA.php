<?php
//session_start();
require_once('pujaTransfer.php');
require_once('pujaDAO.php');
require_once('productoOfreSA.php');
require_once('productoOfreTransfer.php');

class pujaSA {
  //No hemos puesto que extienda de un SA como DAO porque cada uno va a ser muy diferente
  // Si se ve que se pueden agrupar funciones, se creará y se extenderá de un SA que crearemos

    // Atributos
    protected $dao;

    // métodos
    public function getPuja($id) {
      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->getPuja($id);
    }

    public function getPujasPostor($idPostor, $estado) {
      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->getPujasPostor($idPostor, $estado); // Devuelve un array con las pujas que coincida con idPostor
    }

    

    public function getPujasProductoPendientes($idProducto) {
      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->getPujasProductoPendientes($idProducto); // Devuelve un transfer con la puja que coincida con idProducto
    }

    public function getPujasVendedorCerradas($idVendedor) { // Devuelve un array con las pujas que coincida con idVendedor
      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->getPujasVendedorCerradas($idVendedor); // El dao hace un join de producto y puja por id de producto, y filtra para que el id del vendedor (usuario dentro de producto) sea $idVendedor
    }

    public function terminarPuja($idPujaGanadora) {
      $ok = true;

      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
        $aux= $this->dao;
      //obtenemos la puja ganadora
       $pujaGanadora = $aux->getPuja($idPujaGanadora);

       //obtenemos el producto
       $idProducto = $pujaGanadora->getIdProducto();
       $productoOfreSA = new productoOfreSA();
       $producto =  $productoOfreSA->getProducto($idProducto);

       //obtenemos el nick del dueño del producto
       $owner = $pujaGanadora->getIdVendedor();

       //obtenemos el nick del ganador
       $idPostor = $pujaGanadora->getIdPostor();

      //Ganador cambiar estado puja = ganado

       $pujaGanadora->setFecha(date("Y-m-d H:i:s"));
       $pujaGanadora->setEstado("GANADA");
       $ok = $aux->editPuja($pujaGanadora);


      if($ok){//Demas cambiar estado a perdido
         $pujas = array();
         $pujas = $aux->getPujasProductoPendientes($idProducto);
         if ($pujas != NULL) {
        
           foreach ($pujas as $puja) {
             if($puja->getId() != $idPujaGanadora){
                $puja->setEstado("PERDIDA");
                $puja->setFecha(date("Y-m-d H:i:s"));
                $ok = $ok && $aux->editPuja($puja);
             }
           }
         }

        //Cambiar el producto a enpuja=0 e id del dueño

           if($ok){
             $producto->setEnPuja(0);
             $producto->setOwner($idPostor);
             $producto->setFechaSalida(date("Y-m-d H:i:s"));
             $ok = $ok && $productoOfreSA->editProducto($producto);


           $idTrueque = $pujaGanadora->getIdTrueque();


           if($idTrueque != NULL){
              $productoTrueque =$productoOfreSA->getProducto($idTrueque);
              $productoTrueque->setOwner($owner);
              $productoTrueque->setFechaSalida(date("Y-m-d H:i:s"));
              $ok = $ok && $productoOfreSA->editProducto($productoTrueque);
           }
         }
      }
      return $ok;
    }

    public function newPuja(pujaTransfer $puja) {
       if(!$this->dao){
          $this->dao= new pujaDAO();
        }
        $aux= $this->dao;

        return $aux->newPuja($puja);
    }

    public function editPuja(pujaTransfer $puja) {

      if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->editPuja($puja);
    }
     public function eliminarPendientes($idUser) {
        if(!$this->dao){
          $this->dao= new pujaDAO();
        }
      $aux= $this->dao;
      return $aux->eliminarPendientes($idUser);
     }
}

?>
