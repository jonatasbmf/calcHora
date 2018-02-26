<?php
$teste = strtotime('17:15:00');
$teste3 = strtotime('17:18:00');

$hora1 = $teste3;
$hora2 = $teste;

$total = $hora1 - $hora2;

$total1 = date('H:i:s', $total);

echo "Total vindo da conversao para date('H:i:s'): ".$total1."<br><br>";
