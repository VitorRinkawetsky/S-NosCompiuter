<?php
    include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Softwares</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <header>
    <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
   </header>
    <h1>Cadastro de Softwares</h1>
    <form action="" method="POST">
        <div class="games">
          <div>
            <p class="pgames">Nome do Software:</p>
            <input class="label orçamento" type="text" id="nome_software" name="nome_software">
          </div>

            <p class="pgames">Pontuação GPU:</p>
            <input class="label orçamento" type="number" id="pontuacao_gpu" name="pontuacao_gpu">

            <div>
            <p class="pgames">Pontuação CPU:</p>
            <input class="label orçamento" type="number" id="pontuacao_cpu" name="pontuacao_cpu">
            </div>

            <p class="pgames">Preferência:</p> 
            <select name="preferencia" id="preferencia">
                <option value="gpu">gpu</option>
                <option value="cpu">cpu</option>
            </select>

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
    
    $nome_software = filter_input(INPUT_POST, 'nome_software', FILTER_SANITIZE_STRING);
    
    $pontuacao_gpu = filter_input(INPUT_POST, 'pontuacao_gpu', FILTER_SANITIZE_STRING);

    $pontuacao_cpu = filter_input(INPUT_POST, 'pontuacao_cpu', FILTER_SANITIZE_STRING);

    $preferencia = filter_input(INPUT_POST, 'preferencia', FILTER_SANITIZE_STRING);

    $query = "select nome_cpu from cpu where nome_cpu = '{$nome_software}'";

    $resultado = mysqli_query($mysqli, $query);

    $sql = "insert into requisito_software (nome, pontuacao_gpu, pontuacao_cpu, preferencia) values('$nome_software', '$pontuacao_gpu', '$pontuacao_cpu', '$preferencia')";

    $result = mysqli_query($mysqli, $sql);
?>