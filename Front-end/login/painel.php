<script src="../js/logout.js"></script>

<?php
    include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem vindo a tela de cadastros</h1>
    <p><a href="cadastro_cpu.php">Cadastrar CPU</p>
    <p><a href="cadastro_gpu.php">Cadastrar GPU</p>
    <p><a href="cadastro_placamae.php">Cadastrar Placa Mãe</p>
    <p><a href="cadastro_software.php">Cadastrar Software</p>

    <button onclick="logout()">Deslogar</button>
</body>
</html>