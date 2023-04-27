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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
  </header>

    <h1>Cadastro de CPU</h1>
    <form action="" method="POST">
    <div class="games">
        <div>
        <p class="pgames">Nome da CPU:</p> 
        <input class="label orçamento" type="text" id="nome_cpu" name="nome_cpu">
        </div>

        <div>
        <p class="pgames">Marca:</p> 
        <input class="label orçamento" type="text" id="marca_cpu" name="marca_cpu">
        </div>

        <div>
        <p class="pgames">Soquete CPU:</p> 
        <input class="label orçamento" type="text" id="soquete_cpu" name="soquete_cpu">
        </div>

        <p class="pgames">Gráfico Integrado:</p> 
        <select name="grafico_integrado" id="grafico_integrado">
            <option value="true">Sim</option>
            <option value="false">Não</option>
        </select>

        <div>
        <p class="pgames">Pontuação:</p> 
        <input class="label orçamento" type="number" id="pontuacao_cpu" name="pontuacao_cpu">
        </div>

        <p class="pgames">Preço:</p> 
        <input class="label orçamento" type="text" id="preco_cpu" name="preco_cpu">

        <button class="proximo" type="submit">Cadastrar</button>
        </div>
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
    }else if($row >= 1) {                                           
        echo "CPU ja cadastrada";
    }
?>