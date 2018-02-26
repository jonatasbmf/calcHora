<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta charset='utf-8'>
<title>Tés - ticulo</title>
</head>
<body>
<form method="POST">
	<input type="time" name="entrada"/>
	<input type="time" name="saida">
	<input type="submit" name="enviar">
</form>

<?php 
require "conexao.php";
require "calc.php";

$ponto = new Calculadora();

	$h = $_POST['entrada'];
	$i = 1;
	$entradaS = $ponto->pEntrada($h, $i);
	$entradaH = $ponto->converteHora($entradaS);
	echo $entradaS;
	echo "<br>";
	echo $entradaH;

	$sql = "UPDATE setor SET p_entrada = :h where id = :id";
	$sql = $conect->prepare($sql);
	$sql->bindValue(":h", $entradaH);
	$sql->bindValue(":id",4);
	$sql->execute();
	

echo "<br>";
echo "<br>";
echo "<br>";

	$h = $_POST['saida'];
	$i = 1;
	$saidaS = $ponto->sSaida($h, $i);
	$saidaH = $ponto->converteHora($saidaS);
	echo $saidaS;
	echo "<br>";
	echo $saidaH;

echo "<br>";
echo "<br>";
echo "<br>";


if ($entradaS < $saidaS){
	echo "Hora Negativa";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$res = $saidaS - $entradaS;
	$res = $ponto->converteHora($res);
	echo $res;
} else {
	echo "Hora Positiva";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$res = $entradaS - $saidaS;
	$res = $ponto->converteHora($res);
	echo $res;
}