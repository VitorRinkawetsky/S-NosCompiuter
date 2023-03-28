<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro GPU</title>
</head>
<body>
    <h1>Cadastro de GPU</h1>
    <form action="" method="POST">
        <p>Nome da GPU: <input type="text" id="nome_gpu" name="nome_gpu"></p>

        <p>Interface: <input type="text" id="interface_gpu" name="interface_gpu"></p>

        <p>Chip Gráfico: <input type="text" id="chip_grafico" name="chip_grafico"></p>

        <p>Marca: <input type="text" id="marca_gpu" name="marca_gpu"></p>

        <p>Pontuação: <input type="number" id="pontuacao_gpu" name="pontuação_gpu"></p>

        <p>Preço: <input type="number" id="preco_gpu" name="preco_gpu"></p>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

<?php
    include("conexao.php");
    session_start();

    $nome_cpu = filter_input(INPUT_POST, 'nome_cpu', FILTER_SANITIZE_STRING);

    $marca_cpu = filter_input(INPUT_POST, 'marca_cpu', FILTER_SANITIZE_STRING);

    $soquete_cpu = filter_input(INPUT_POST, 'soquete_cpu', FILTER_SANITIZE_STRING);

    $grafico_integrado = filter_input(INPUT_POST, 'grafico_integrado', FILTER_SANITIZE_STRING);

    $preco_cpu = filter_input(INPUT_POST, 'preco_mae', FILTER_SANITIZE_STRING);

    $pontuacao_cpu = filter_input(INPUT_POST, 'pontuacao_cpu', FILTER_SANITIZE_STRING);

    $query = "select nome_cpu from cpu where nome_cpu = '{$nome_cpu}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if($row == 0){
        $sql = "insert into cpu (marca, soquete, grafico_integrado, pontuacao, preco, nome_cpu) values('$marca_cpu', '$soquete_cpu', '$grafico_integrado', $pontuacao_cpu, '$preco_cpu', '$nome_cpu')";

        $result = mysqli_query($mysqli, $sql);

        if(mysqli_insert_id($mysqli)) {
            echo "<p>CPU cadastrada com sucesso!</p>";
        }
    }else {
        echo "CPU ja cadastrada";
    }
?>