<?php
    include('protect.php');
    include('conexao2.php');

    //verifica se foi clicado ou não no botão para excluir 
    if(isset($_GET['delete'])) {
        $id = (int)$_GET['delete'];
        $conexao->exec("DELETE from gpu where id=$id");
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

    <h1>Painel GPU</h1>
    <form action="" method="POST">
    <div class="painel">

        <table border = "1">
            <tr>
                <td class="tabela">ID</td>
                <td class="tabela">Nome</td>
                <td class="tabela">Marca</td>
                <td class="tabela">Chip Gráfico</td>
                <td class="tabela">Pontuação</td>
                <td class="tabela">Preço</td>
            </tr>
            <?php

                // Consulta para obter todos os registros da tabela "cpu"
                $consulta = $conexao->query('SELECT * FROM gpu');

                // Exibir os registros
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo '<td class="id-peca">' . $registro['id'] . '</td>';
                    echo '<td class="id-peca">' . $registro['nome_gpu'] . '</td>';
                    echo '<td class="id-peca">' . $registro['marca'] . '</td>';
                    echo '<td class="id-peca">' . $registro['chip_grafico'] . '</td>';
                    echo '<td class="id-peca">' . $registro['pontuacao'] . '</td>';
                    echo '<td class="id-peca">' . $registro['preco'] . '</td>';
                    echo '<td> <a  class="x" href="?delete='.$registro['id'].'">(X)</a> </td>';
                    echo '<td> <a  class="e" href="edit_gpu.php?id='.$registro['id'].'">(E)</a> </td>';
                    echo "</tr>";
                }
            ?>
        </table>
        
        <div class="painel-container">
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="cadastro_gpu.php">Cadastrar GPU</p>
            </div>

            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="painel.php">Voltar</p>
            </div>
        </div>    
    </div>
    </form>
</body>
</html>

