<?php
require "calc.php";

$calc = new Calculadora;

$teste = strtotime('17:15:00');
$teste3 = strtotime('17:18:00');

$hora1 = $teste3;
$hora2 = $teste;

$total = $hora1 - $hora2;

$total2 = $calc->converteHora($total);
$total2 = date('H:i:s', strtotime($total2));
echo "<br><br>";
echo $total."<br> <br>";

$total1 = date('H:i:s', $total);

echo "Total 1 vindo da conversao de date('H:i:s'): ".$total1."<br><br>";
echo "Total 2 vindo da função converteHora: ".$total2;
echo "<br><br><br>";

echo $teste."<br> <br>";
echo $teste3."<br> <br>";

$teste = date('H:i', $teste);
$teste3 = date('H:i', $teste3);

echo $teste."<br> <br>";
echo $teste3."<br> <br>";

