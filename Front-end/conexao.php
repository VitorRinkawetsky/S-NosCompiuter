<?php
$host = "localhost";
$db = "db_compiuter1";
$user = "root";
$senha = "";
$mysqli = new mysqli($host, $user, $senha, $db);

    if($mysqli->error) {
        die("Erro ao conectar");
    }

?>

