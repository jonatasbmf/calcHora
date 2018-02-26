<?php
$hora = strtotime('17:15:00');
$hora1 = strtotime('17:18:00');
$total = $hora1 - $hora;
$total = date('H:i:s', $total);

echo "Total vindo da conversão para strtotime, calculado com os números inteiros e resultado convertido para date('H:i:s'): ".$total."<br><br>";
echo date('d/m/Y H:i:s');