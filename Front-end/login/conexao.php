<?php
$host = "127.0.0.1:3312";
$db = "db_compiuter1";
$user = "root";
$senha = "";
$mysqli = new mysqli($host, $user, $senha, $db);

    if($mysqli->error) {
        die("Erro ao conectar". $mysqli->error);
    }

?>