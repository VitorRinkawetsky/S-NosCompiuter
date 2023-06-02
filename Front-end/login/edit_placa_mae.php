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

    $sql = "SELECT * from placa_mae where id = $id";
    $result = $mysqli->query($sql);
    $row = $result->FETCH_ASSOC();

    $nome_placa_mae = $row['nome_mae'];
    $marca_placa_mae = $row['marca'];
    $soquete_placa_mae = $row['soquete_mae'];
    $preco_placa_mae = $row['preco'];

    $nome_mae = filter_input(INPUT_POST, 'nome_placa_mae', FILTER_SANITIZE_STRING);

    $soquete_mae = filter_input(INPUT_POST, 'soquete_mae', FILTER_SANITIZE_STRING);

    $marca = filter_input(INPUT_POST, 'marca_mae', FILTER_SANITIZE_STRING);

    $preco = filter_input(INPUT_POST, 'preco_mae', FILTER_SANITIZE_STRING);

    $query = "select nome_mae from placa_mae where nome_mae = '{$nome_mae}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if(empty($nome_mae) || empty($soquete_mae) || empty($marca) || empty($preco)) {
        $erro_geral = "Todos os campos precisa ser preenchidos!";
    }else if ($soquete_mae < 0){
        $mensagem_soquete_invalido = "Insira um soquete válido!";
    }else if ($preco < 0){
        $mensagem_preco_invalido = "Insira um preço válido!";
    }else{ 
        $sql = "UPDATE placa_mae set nome_mae = '$nome_mae', marca = '$marca', soquete_mae = '$soquete_mae', preco = '$preco' where id = '$id'";
    
        $result = mysqli_query($mysqli, $sql);
    
        header('Location: painel_placa_mae.php'); 
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Placa-Mãe</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <header>
    <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
   </header>
    <h1>Edição de Placa Mãe</h1>
    <form action="" method="POST">
        <div class="games">
        
        <div> 
        <p class="pgames">Nome da Placa Mãe:</p>
        <input class="label orçamento" type="text" id="nome_placa_mae" name="nome_placa_mae" value="<?php echo $nome_placa_mae; ?>">
        </div>

        <p class="pgames">Soquete Placa Mãe:</p>
        <input class="label orçamento" type="text" id="soquete_mae" name="soquete_mae" value="<?php echo $soquete_placa_mae; ?>">
        
        <div>
        <p class="pgames">Marca:</p>
        <input class="label orçamento" type="text" id="marca_mae" name="marca_mae" value="<?php echo $marca_placa_mae; ?>">
        </div>

        <p class="pgames">Preço:</p>
        <input class="label orçamento" type="text" id="preco_mae" name="preco_mae" value="<?php echo $preco_placa_mae; ?>">

        <button class="proximo" type="submit">Editar</button>
        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="painel_placa_mae.php">Voltar</a></p>
        </div>
        <?php
            if(isset($erro_geral)){
                echo "<p>".$erro_geral."</p>";
            }
            
            if(isset($mensagem_placa_mae_cadastrada)){
                echo "<p>".$mensagem_placa_mae_cadastrada."</p>";
            }

            if(isset($mensagem_soquete_invalido)){
                echo "<p>".$mensagem_soquete_invalido."</p>";
            }

            if(isset($mensagem_preco_invalido)){
                echo "<p>".$mensagem_preco_invalido."</p>";
            }

            if(isset($mensagem_placa_mae_nao_cadastrada)){
                echo "<p>".$mensagem_placa_mae_nao_cadastrada."</p>";
            }
        ?>
        </div>
    </form>
</body>
</html>