<?php
    include('protect.php');
    include('conexao.php');

    //se o id vier vazio redireciona para o painel
    if(!isset($_GET['id'])) {
        header("Location: painel.php");
        exit;
    }
    //verifica se o id veio e atribui ele a uma variavel
    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    }

    $sql = "SELECT * from cpu where id = $id";
    $result = $mysqli->query($sql);
    $row = $result->FETCH_ASSOC();

    $nome = $row['nome_cpu'];
    $marca = $row['marca'];
    $soquete = $row['soquete'];
    $pontuacao = $row['pontuacao'];
    $preco = $row['preco'];
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

    <h1>Edição de CPU</h1>
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
    <div class="games">
        <div>
        <p class="pgames">Nome da CPU:</p> 
        <input class="label orçamento" type="text" id="nome_cpu" name="nome_cpu" value="<?php echo $nome; ?>">
        </div>

        <p class="pgames">Marca:</p> 
        <input class="label orçamento" type="text" id="marca_cpu" name="marca_cpu" value="<?php echo $marca; ?>">

        <div>
        <p class="pgames">Soquete CPU:</p> 
        <input class="label orçamento" type="number" id="soquete_cpu" name="soquete_cpu" value="<?php echo $soquete; ?>">
        </div>

        <div>
        <p class="pgames">Pontuação:</p> 
        <input class="label orçamento" type="number" id="pontuacao_cpu" name="pontuacao_cpu" value="<?php echo $pontuacao; ?>">
        </div>

        <p class="pgames">Preço:</p> 
        <input class="label orçamento" type="text" id="preco_cpu" name="preco_cpu" value="<?php echo $preco; ?>">

        <button class="proximo" type="submit">Editar</button>
        </div>
    </form>
    <div class="div-painel">
        <p class="style-p"><a class="style-href" href="painel_cpu.php">Voltar</a></p>
    </div>
</body>
</html>

<?php
    include("conexao.php");

    $id_cpu = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    $nome_cpu = filter_input(INPUT_POST, 'nome_cpu', FILTER_SANITIZE_STRING);

    $marca_cpu = filter_input(INPUT_POST, 'marca_cpu', FILTER_SANITIZE_STRING);

    $soquete_cpu = filter_input(INPUT_POST, 'soquete_cpu', FILTER_SANITIZE_STRING);

    $preco_cpu = filter_input(INPUT_POST, 'preco_cpu', FILTER_SANITIZE_STRING);

    $pontuacao_cpu = filter_input(INPUT_POST, 'pontuacao_cpu', FILTER_SANITIZE_STRING);

    $query = "select id from cpu where id = '{$id}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if($row == 1){

        $sql = "UPDATE cpu set nome_cpu = '$nome_cpu', marca = '$marca_cpu', soquete = '$soquete_cpu', preco = '$preco_cpu', pontuacao = '$pontuacao_cpu' where id = '$id'";

        $result = mysqli_query($mysqli, $sql);

        if(mysqli_insert_id($mysqli)) {
            echo "<p>CPU editada com sucesso!</p>";
        }
    }
?>