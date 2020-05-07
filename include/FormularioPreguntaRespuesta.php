<?php
require_once('include/transfer/PreguntaTransfer.php');
require_once('include/sa/PreguntaSA.php');
require_once('include/sa/RespuestaSA.php');
require_once('include/transfer/RespuestaTransfer.php');
require_once('include/sa/LigaSA.php');
require_once __DIR__.'/Form.php';

class FormularioPreguntaRespuesta extends Form {

	public function __construct(){}

	protected function procesaFormulario($datos){
		$result = array();

		$preg = isset($datos['preg']) ? $datos['preg'] : null;
		$codLiga = isset($datos['liga']) ? $datos['liga'] : null;
		$v = isset($datos['v']) ? nl2br($datos['v']) : null;
		$f1 = isset($datos['f1']) ? $datos['f1'] : null;
		$f2 = isset($datos['f2']) ? $datos['f2'] : null;
		$condi = isset($datos['condi']) ? $datos['condi'] : null;

		if((!empty($preg)) && (!empty($codLiga)) && (!empty($v)) && (!empty($f1)) && (!empty($f2)) && (!empty($condi))){
			if($codLiga != 0){
				
				$p = new PreguntaTransfer($preg, $codLiga);
				$preguntaSA = new PreguntaSA();

				$anadido = $preguntaSA->insertPregunta($p);
				
				if($anadido){
					$aux = $preguntaSA->getIdPregunta($p);
					$idP = $aux->IdPregunta;

					$r1 = new RespuestaTransfer($idP, $v, '1');
					$r2 = new RespuestaTransfer($idP, $f1, '0');
					$r3 = new RespuestaTransfer($idP, $f2, '0');

					$respuestaSA = new RespuestaSA();

					$i = 0;
					$valores = array();
					while($i < 3){
						$rand = rand(1, 3);
						if(!in_array($rand, $valores)){
							array_push($valores, $rand);
							$respuestaSA->insertRespuesta(${"r".$rand});
							$i++;
						}
					}
					
					$result = 'mostrarAlertas.php?codAlerta=19';
				}
				else{
					
					$result = 'mostrarAlertas.php?codAlerta=13';
				}
			}
			else{
				$result[] = "No has seleccionado una liga";
			}
		}
		else{
			//Mandar error de que faltan campos por rellenar
			$result[] = "Faltan campos por rellenar";
		}

	 	return $result;
	}

	protected function generaCamposFormulario($datosIniciales){

		$preg = '';
		$v = '';
		$f1 = '';
		$f2 = '';
		$codLiga = '';

		if($datosIniciales) {
			$preg = isset($datosIniciales['preg']) ? htmlspecialchars($datosIniciales['preg']) : $preg;
			$v = isset($datosIniciales['v']) ? htmlspecialchars($datosIniciales['v']) : $v;
			$f1 = isset($datosIniciales['f1']) ? htmlspecialchars($datosIniciales['f1']) : $f1;
			$f2 = isset($datosIniciales['f2']) ? htmlspecialchars($datosIniciales['f2']) : $f2;
			$codLiga = isset($datosIniciales['codLiga']) ? htmlspecialchars($datosIniciales['codLiga']) : $codLiga;
		}
	
		$html = '';
		$html .= '<legend>Nueva Pregunta</legend>';
		$html .= '<div class="formulario">';
        $html .= '<label>Pregunta:</label><br> <input type="text" name="preg" value="'.$preg.'"><br>';
        $html .= '<label>Selecciona la liga a la que pertenece:</label><br><br>';
        $html .= '<div class="caja">';
        $html .= '<select name ="liga">';
        $html .= '<option value="0">Ligas:</option>';
            $ligasa = new LigaSA();
            $res = $ligasa->devuelveLigaSA();
            while($valores = mysqli_fetch_array($res)){
                $html .= '<option value=' . $valores[0] . '> ' . $valores[1] . '</option>';
            }
        $html .='</select>';
        $html .= '</div>';
        $html .='<br><br>';
        $html .='<label>Respuesta correcta:</label><br> <input type="text" name="v" value="'.$v.'"><br>';          
        $html .='<label>Respuesta falsa 1:</label><br> <input type="text" name="f1" value="'.$f1.'"><br>';
        $html .='<label>Respuesta falsa 2:</label><br> <input type="text" name="f2" value="'.$f2.'"><br>';
        $html .='<input type="checkbox" name="condi" value="ok"><label>Confirmar enviar nueva pregunta.</label><br>';
        $html .='<button type="submit" class="botonEnviar" name="aceptar">Enviar</button>';
        $html .='</div>';

		return $html;
	}

}


?>