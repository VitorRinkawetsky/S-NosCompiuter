<?php
    include('protect.php');
    include('conexao.php');

    
    $nome_cpu = filter_input(INPUT_POST, 'nome_cpu', FILTER_SANITIZE_STRING);

    $marca_cpu = filter_input(INPUT_POST, 'marca_cpu', FILTER_SANITIZE_STRING);

    $soquete_cpu = filter_input(INPUT_POST, 'soquete_cpu', FILTER_SANITIZE_STRING);

    $preco_cpu = filter_input(INPUT_POST, 'preco_cpu', FILTER_SANITIZE_STRING);

    $pontuacao_cpu = filter_input(INPUT_POST, 'pontuacao_cpu', FILTER_SANITIZE_STRING);

    $query = "select nome_cpu from cpu where nome_cpu = '{$nome_cpu}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if($nome_cpu == "" || $marca_cpu == "" || $soquete_cpu == "" || $preco_cpu == "" || $pontuacao_cpu == "") {
        $erro_geral = "Todos os campos precisa ser preenchidos!";
    }else if ($soquete_cpu < 0){
        $mensagem_soquete_invalido = "Insira um soquete válido!";
    }else if ($pontuacao_cpu < 0){
        $mensagem_pontuacao_invalido = "Insira uma pontuaçâo válida!";
    }else if ($preco_cpu < 0){
        $mensagem_preco_invalido = "Insira um preço válido!";
    }else{

        if($row == 0){
            $sql = "insert into cpu (marca, soquete, pontuacao, preco, nome_cpu) values('$marca_cpu', '$soquete_cpu', $pontuacao_cpu, '$preco_cpu', '$nome_cpu')";

            $result = mysqli_query($mysqli, $sql);

            if(mysqli_insert_id($mysqli)) {
                $mensagem_cpu_cadastrada = "CPU cadastrada com sucesso!";
            }
        }else if($row >= 1) {                                           
            echo "CPU ja cadastrada";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro CPU</title>
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

        <p class="pgames">Marca:</p> 
        <input class="label orçamento" type="text" id="marca_cpu" name="marca_cpu">

        <div>
        <p class="pgames">Soquete CPU:</p> 
        <input class="label orçamento" type="text" id="soquete_cpu" name="soquete_cpu">
        </div>

        <div>
        <p class="pgames">Pontuação:</p> 
        <input class="label orçamento" type="number" id="pontuacao_cpu" name="pontuacao_cpu">
        </div>

        <p class="pgames">Preço:</p> 
        <input class="label orçamento" type="text" id="preco_cpu" name="preco_cpu">

        <button class="proximo" type="submit">Cadastrar</button>
        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="painel_cpu.php">Voltar</a></p>
        </div>
        <?php
            if(isset($erro_geral)){
                echo "<p>".$erro_geral."</p>";
            }
            
            if(isset($mensagem_cpu_cadastrada)){
                echo "<p>".$mensagem_cpu_cadastrada."</p>";
            }

            if(isset($mensagem_soquete_invalido)){
                echo "<p>".$mensagem_soquete_invalido."</p>";
            }
            
            if(isset($mensagem_pontuacao_invalido)){
                echo "<p>".$mensagem_pontuacao_invalido."</p>";
            }

            if(isset($mensagem_preco_invalido)){
                echo "<p>".$mensagem_preco_invalido."</p>";
            }
        ?>
        </div>
    </form>
</body>
</html>