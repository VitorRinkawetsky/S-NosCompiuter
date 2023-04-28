<?php
    include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroGPU</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
  </header>
  <h1>Cadastro de GPU</h1>
  <form action="" method="POST">
  <div class="games">
        <div>
        <p class="pgames">Nome da GPU:</p> 
        <input class="label orçamento" type="text" id="nome_gpu" name="nome_gpu">
        </div>
        
        <p class="pgames">Interface:</p> 
        <input class="label orçamento" type="text" id="interface_gpu" name="interface_gpu">

        <div>
        <p class="pgames">Chip Gráfico:</p> 
        <input class="label orçamento" type="text" id="chip_grafico" name="chip_grafico">
        </div>

        <p class="pgames">Marca:</p> 
        <input class="label orçamento" type="text" id="marca_gpu" name="marca_gpu">

        <div>
        <p class="pgames">Pontuação:</p> 
        <input class="label orçamento" type="number" id="pontuacao_gpu" name="pontuacao_gpu">
        </div>

        <p class="pgames">Preço:</p> 
        <input class="label orçamento" type="text" id="preco_gpu" name="preco_gpu">

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