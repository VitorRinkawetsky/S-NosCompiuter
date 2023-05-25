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
        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="painel.php">Voltar</p>
        </div>
        </div>
        </form>
</body>
</html>

<?php
    include("conexao.php");

    $nome_gpu = filter_input(INPUT_POST, 'nome_gpu', FILTER_SANITIZE_STRING);

    $marca_gpu = filter_input(INPUT_POST, 'marca_gpu', FILTER_SANITIZE_STRING);

    $preco_gpu = filter_input(INPUT_POST, 'preco_gpu', FILTER_SANITIZE_STRING);

    $pontuacao_gpu = filter_input(INPUT_POST, 'pontuacao_gpu', FILTER_SANITIZE_STRING);

    $chip_grafico = filter_input(INPUT_POST, 'chip_grafico', FILTER_SANITIZE_STRING);

    $query = "select nome_gpu from gpu where nome_gpu = '{$nome_gpu}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if($row == 0){
        $sql = "insert into gpu (nome_gpu, marca, preco, pontuacao, chip_grafico) values('$nome_gpu', '$marca_gpu', '$preco_gpu', '$pontuacao_gpu', '$chip_grafico')";

        $result = mysqli_query($mysqli, $sql);

        if(mysqli_insert_id($mysqli)) {
            echo "<p>GPU cadastrada com sucesso!</p>";
        }
    }else if($row >= 1) {                                           
        echo "GPU ja cadastrada";
    }
?>