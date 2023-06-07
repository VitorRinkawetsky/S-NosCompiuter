<?php
    include('protect.php');
    include("conexao.php");

    //se o id vier vazio redireciona para o painel
    if(!isset($_GET['id'])) {
        header("Location: painel.php");
        exit;
    }

    //verifica se o id veio e atribui ele a uma variavel
    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    }

    $sql = "SELECT * from gpu where id = $id";
    $result = $mysqli->query($sql);
    $row = $result->FETCH_ASSOC();

    $nome = $row['nome_gpu'];
    $marca = $row['marca'];
    $chip_grafico_gpu = $row['chip_grafico'];
    $pontuacao = $row['pontuacao'];
    $preco = $row['preco'];


    $id_gpu = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $nome_gpu = filter_input(INPUT_POST, 'nome_gpu', FILTER_SANITIZE_STRING);

    $marca_gpu = filter_input(INPUT_POST, 'marca_gpu', FILTER_SANITIZE_STRING);

    $chip_grafico = filter_input(INPUT_POST, 'chip_grafico', FILTER_SANITIZE_STRING);

    $preco_gpu = filter_input(INPUT_POST, 'preco_gpu', FILTER_SANITIZE_STRING);

    $pontuacao_gpu = filter_input(INPUT_POST, 'pontuacao_gpu', FILTER_SANITIZE_STRING);

    $query = "select id from cpu where id = '{$id}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if(empty($nome_gpu) || empty($marca_gpu) || empty($preco_gpu) || empty($pontuacao_gpu) || empty($chip_grafico)) {
        $erro_geral = "Todos os campos precisa ser preenchidos!";
    }else if ($pontuacao_gpu < 0){
        $mensagem_pontuacao_invalido = "Insira uma pontuaçâo válida!";
    }else if ($preco_gpu < 0){
        $mensagem_preco_invalido = "Insira um preço válido!";
    }else{
        
        $sql = "UPDATE gpu set nome_gpu = '$nome_gpu', marca = '$marca_gpu', chip_grafico = '$chip_grafico', preco = '$preco_gpu', pontuacao = '$pontuacao_gpu' where id = '$id'";
    
        $result = mysqli_query($mysqli, $sql);
    
        header('Location: painel_gpu.php'); 
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CPU</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
    </header>

    <h1>Edição de GPU</h1>
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
        <div class="games">
            <div>
                <p class="pgames">Nome da GPU:</p>
                <input class="label orçamento" type="text" id="nome_gpu" name="nome_gpu" value="<?php echo $nome; ?>">
            </div>

            <p class="pgames">Marca:</p>
            <input class="label orçamento" type="text" id="marca_gpu" name="marca_gpu" value="<?php echo $marca; ?>">

            <div>
                <p class="pgames">Cip Gráfico:</p>
                <input class="label orçamento" type="text" id="chip_grafico" name="chip_grafico"
                    value="<?php echo $chip_grafico_gpu; ?>">
            </div>

            <div>
                <p class="pgames">Pontuação:</p>
                <input class="label orçamento" type="number" id="pontuacao_gpu" name="pontuacao_gpu"
                    value="<?php echo $pontuacao; ?>">
            </div>

            <p class="pgames">Preço:</p>
            <input class="label orçamento" type="text" id="preco_gpu" name="preco_gpu" value="<?php echo $preco; ?>">

            <div class="cadastrar-container">
                <button class="cadastrar" type="submit">Editar</button>
                <button class="cadastrar" type="submit"><a class="style-href" href="painel_gpu.php">Voltar</a></button>
            </div>
            <?php
                if(isset($erro_geral)){
                    echo "<p>".$erro_geral."</p>";
                }
                
                if(isset($mensagem_gpu_cadastrada)){
                    echo "<p>".$mensagem_gpu_cadastrada."</p>";
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

<?php
?>