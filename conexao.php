<?php
$con = "mysql:dbname=ponto;host=localhost:3306";
$userdb="root";
$passdb="senha";

try {
	global $conect;
    $conect = new PDO($con,$userdb,$passdb);
} catch (PDOException $e) {
    echo "Falha na conexão" . $e->getMessenger();
}