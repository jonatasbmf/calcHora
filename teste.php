<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta charset='utf-8'>
<link href="assets/css/estilo.css" rel="stylesheet">
<title>Controle de Ponto</title>
</head>

<form method="POST">
	<input type="time" name="entrada"/>
	<input type="time" name="saida">
	<input type="submit" name="enviar">
</form>

<?php
if (isset($_POST['entrada']) && !empty($_POST['entrada'])){

$entrada = $_POST['entrada'];
$saida = $_POST['saida'];

$hora1 = explode(":",$entrada);
$hora2 = explode(":",$saida);

echo "<div class='box'>";
	echo "<div class='box_l'>";
		echo $entrada . "<br><br>";
		$acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
				echo $acumulador1_h = $hora1[0] * 3600 . "<br>";
				echo $acumulador1_m = $hora1[1] * 60 . "<br>";
				echo $acumulador1_s = $hora1[2] . "<br>";
				echo $acumulador1 . "<br><br>";
	echo "</div>";
	echo "<div class='box_r'>";
		echo $saida	 . "<br><br>";
		$acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
				echo $acumulador2_h = $hora2[0] * 3600 . "<br>";
				echo $acumulador2_m = $hora2[1] * 60 . "<br>";
				echo $acumulador2_s = $hora2[2] . "<br>";
				echo $acumulador2 . "<br><br>";

	echo "</div>";
echo "</div>";


echo "<div class='box'>";
	echo "<div class='box_l'>";
		echo "<strong> FORMULA DE SUBTRAÇÃO SERÁ CORRETA SE </strong> <br>";
		echo "<strong> Se hora INICIAL < FINAL </strong> <br><br><br>";
		$resultado = $acumulador1 - $acumulador2;
			echo "Horario informado convertido em segundos: ". $resultado . "<br><br>";

			$hora_ponto = ceil($resultado / 3600);
				$resultado = $resultado - ($hora_ponto*3600);
					echo "Resultado anterior/3600: => ". $hora_ponto . "<br><br>";
			
			$min_ponto = ceil($resultado / 60)*-1;
				$resultado = $resultado - ($min_ponto*60*-1);
					echo "Resultado anterior /60: => " . $min_ponto . "<br><br>";

			$secs_ponto = $resultado;
					echo "Segundos: " . $secs_ponto . "<br><br>";

					//Grava na variável resultado final
					$tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
					echo $tempo . "<br><br>";	

	echo "</div>";	
	echo "<div class='box_l'>";
		echo "<strong> FORMULA DE SUBTRAÇÃO SERÁ CORRETA SE </strong> <br>";
		echo "<strong> Se hora INICIAL > FINAL </strong> <br><br><br>";
		$resultado = $acumulador1 - $acumulador2;
			echo "Horario informado convertido em segundos: ". $resultado . "<br><br>";

			$hora_ponto = floor($resultado / 3600);
				$resultado = $resultado - ($hora_ponto*3600);
					echo "Resultado anterior/3600: => ". $hora_ponto . "<br><br>";
			
			$min_ponto = floor($resultado / 60);
				$resultado = $resultado - ($min_ponto*60);
					echo "Resultado anterior /60: => " . $min_ponto . "<br><br>";

			$secs_ponto = $resultado;
					echo "Segundos: " . $secs_ponto . "<br><br>";

					//Grava na variável resultado final
					$tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
					echo $tempo . "<br><br>";	

	echo "</div>";
	echo "<div class='box_r'>";
		echo "<strong> PARA SOMA DE HORAS, NÃO IMPORTA SEQUENCIA. </strong> <br>";
		echo "<strong> Se hora INICIAL > FINAL </strong> <br>";
		echo "<strong> Se hora INICIAL < FINAL </strong> <br><br>";
		$resultado1 = $acumulador1 + $acumulador2;
			echo "Horario informado convertido em segundos: ". $resultado1 . "<br><br>";


			$hora_ponto = floor($resultado1 / 3600);
				$resultado1 = $resultado1 - ($hora_ponto * 3600);
					echo "Resultado anterior/3600: => ". $hora_ponto . "<br><br>";
			
			$min_ponto = floor($resultado1 / 60);
				$resultado1 = $resultado1 - ($min_ponto * 60);
					echo "Resultado anterior /60: => " . $min_ponto . "<br><br>";

			$secs_ponto = $resultado1;
					echo "Segundos: " . $secs_ponto . "<br><br>";

				//Grava na variável resultado final
				$tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
				echo $tempo;
	echo "</div>";
echo "</div>";

}
/* Erro do Sql
* Comando a ser usado: print_r($sql->errorInfo());
*
* Se erro 00000 passa batido;
* Se qualquer outro erro, fazer um tratamento;
*
*/
