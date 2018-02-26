<?php
class Calculadora{

	public function __construct(){


	}

	public function pEntrada($hinformada, $idcolaborador){

		global $conect;

		$sql = "SELECT p_entrada from setor as s 
				JOIN usuario as u
					on u.setor_id = s.id
				where u.id = $idcolaborador";

		$sql = $conect->query($sql);
		$feedbacksql = $sql->errorInfo();

		if ($feedbacksql[0] == 00000){
			if($sql->rowCount() > 0){
				$hc = $sql->fetch();
				$horacadastrada = $hc['p_entrada'];
			}
		} else {
			echo "Erro na consulta da primeira entrada cadastrada.";
		}

		$p_entrada = $this->converteSegundo($horacadastrada);
		$h_informada = $this->converteSegundo($hinformada);


		if (  ($h_informada >= $p_entrada - 600) && ($h_informada <= $p_entrada + 600) ){
			return $p_entrada;
		} else {
			return $h_informada;
		}
	}


	public function sSaida($hinformada, $idcolaborador){

		global $conect;

		$sql = "SELECT s_saida from setor as s 
				JOIN usuario as u
					on u.setor_id = s.id
				where u.id = $idcolaborador";

		$sql = $conect->query($sql);
		$feedbacksql = $sql->errorInfo();

		if ($feedbacksql[0] == 00000){
			if($sql->rowCount() > 0){
				$hc = $sql->fetch();
				$horacadastrada = $hc['s_saida'];
			}
		} else {
			echo "Erro na consulta da Segunda saída cadastrada.";
		}

		$s_saida = $this->converteSegundo($horacadastrada);
		$h_informada = $this->converteSegundo($hinformada);


		if (  ($h_informada >= $s_saida - 600) && ($h_informada <= $s_saida + 600) ){
			return $s_saida;
		} else {
			return $h_informada;
		}
	}


	public function converteSegundo($var)	{
		$hora = explode(":",$var);
		$segundo = ($hora[0] * 3600) + ($hora[1] * 60) + $hora[2];
		return $segundo;
	}

	public function converteHora($var)	{
		
		$hora_ponto = floor($var / 3600);
		echo $hora_ponto . " Hora ponto <br>";
			$var = $var - ($hora_ponto*3600);
		echo $var . " sobra para calculo dos minutos <br>";
		$min_ponto = floor($var / 60);
		echo $min_ponto." o que foi convertico para min <br>";
			$var = $var - ($min_ponto*60);
		echo $var." o que sobra para os segundos <br>";
		$secs_ponto = $var;
		echo $secs_ponto . " o segundo <br>";
		$hora = $hora_ponto.":".$min_ponto.":".$secs_ponto;

		return $hora;
	}

}
	