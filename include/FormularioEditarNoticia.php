<?php
require_once('include/sa/LigaSA.php');
require_once('include/sa/NoticiaSA.php');
require_once('Form.php');

class FormularioEditarNoticia extends Form {

    private $idNoticia;

    public function __construct($idN){
        $this->idNoticia = $idN;
    }

    protected function procesaFormulario($datos){
        $result = array();

		$titular = isset($datos['titular']) ? htmlspecialchars($datos['titular']) : null;
		$cuerpo = isset($datos['cuerpo']) ? htmlspecialchars(nl2br($datos['cuerpo'])) : null;
		$condi = isset($datos['condi']) ? htmlspecialchars($datos['condi']) : null;
		$codLiga = isset($datos['liga']) ? htmlspecialchars($datos['liga']) : null;
		

		if((!empty($titular)) && (!empty($cuerpo)) && (!empty($condi))){
            $noticiaSA = new NoticiaSA();
            $noticiaSA->updateNoticia($idNoticia, $titular, $cuerpo, $codLiga);
            $result = 'mostrarAlertas.php?codAlerta=26';
		}
		else{
			//Errores en formulario
			$result[] = "Faltan campos por rellenar";
		}

        return $result;
    }

    protected function generaCamposFormulario($datosIniciales){

        $noticiaSA = new noticiaSA();
        $noticia = $noticiaSA->getNoticia($this->idNoticia);

        $titular = $noticia->getTitular();
        $cuerpo = $noticia->getTexto();
        $codLiga = $noticia->getCodLiga();

        $ligasa = new LigaSA();
        $nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;

		if($datosIniciales) {
			$titular = isset($datosIniciales['titular']) ? $datosIniciales['titular'] : $titular;
			$cuerpo = isset($datosIniciales['cuerpo']) ? $datosIniciales['cuerpo'] : $cuerpo;
			$codLiga = isset($datosIniciales['liga']) ? $datosIniciales['liga'] : $codLiga;
            $ligasa = new LigaSA();
            $nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;
		}
	
		$html = '';
        $html .= '<legend>Edite su noticia</legend>';
		$html .= '<div class="formulario">';
        $html .= '<label>Titular:</label><br> <input type="text" name="titular" value="'.$titular.'"><br>';
        $html .= '<textarea name="cuerpo" rows="10" cols="40">'.$cuerpo.'</textarea><br>';
        $html .= '<select name="liga">';
        $html .= '<option value="'.$codLiga.'">'.$nombreLiga.'</option>';
            $ligasa=new LigaSA();
            $res=$ligasa->devuelveLigaSA();
            while($valores = mysqli_fetch_array($res)){
                $html .= '<option value=' . $valores[0] . '> ' . $valores[1] . '</option>';
            }
        $html .='</select>';
        $html .='<br>';
        $html .='<input type="checkbox" name="condi" value="ok"><label>Confirmar enviar noticia.</label><br>';
        $html.='<button type="submit" class="botonEnviar" name="aceptar">Aceptar</button>';
        $html .='</div>';
        return $html;
    }

}

?>