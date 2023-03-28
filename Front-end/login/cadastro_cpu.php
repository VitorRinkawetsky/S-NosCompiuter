<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro CPU</title>
</head>
<body>
    <h1>Cadastro de CPU</h1>
    <form action="" method="POST">
        <p>Nome da CPU: <input type="text" id="nome_cpu" name="nome_cpu"></p>

        <p>Marca: <input type="text" id="marca_cpu" name="marca_cpu"></p>

        <p>Soquete CPU: <input type="text" id="soquete_cpu" name="soquete_cpu"></p>

        <p>Gráfico Integrado: <input type="text" id="grafico_integrado" name="grafico_integrado"></p>

        <p>Pontuação: <input type="number" id="pontuacao_cpu" name="pontuacao_cpu"></p>

        <p>Preço: <input type="number" id="preco_cpu" name="preco_cpu"></p>

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

    $preco_cpu = filter_input(INPUT_POST, 'preco_cpu', FILTER_SANITIZE_STRING);

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