<?php
$host = "localhost";
$db = "db_sonoscompiuter";
$user = "root";
$senha = "";
$mysqli = new mysqli($host, $user, $senha, $db);


if($mysqli->connect_errno) {
    echo "Falha ma conexão com o banco de dados";
}else{
    echo "Conectando";
}
?>

