
<?php
    include('protect.php');
    include('conexao2.php');

    //verifica se foi clicado ou não no botão para excluir 
    if(isset($_GET['delete'])) {
        $id = (int)$_GET['delete'];
        $conexao->exec("DELETE from requisito_software where id=$id");
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

    <h1>Painel Software</h1>
    <form action="" method="POST">
    <div class="games">

        <table border = "1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Pontuação CPU</td>
                <td>Pontuação GPU</td>
            </tr>
            <?php

                // Consulta para obter todos os registros da tabela "cpu"
                $consulta = $conexao->query('SELECT * FROM requisito_software');

                // Exibir os registros
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo '<td >' . $registro['id'] . '</td>';
                    echo '<td >' . $registro['nome'] . '</td>';
                    echo '<td >' . $registro['pontuacao_cpu'] . '</td>';
                    echo '<td >' . $registro['pontuacao_gpu'] . '</td>';
                    echo '<td> <a href="?delete='.$registro['id'].'">(X)</a> </td>';
                    echo '<td> <a href="edit_software.php?id='.$registro['id'].'">(E)</a> </td>';
                    echo "</tr>";
                }
            ?>
        </table>

        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="cadastro_software.php">Cadastrar Software</a></p>
        </div>

        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="painel.php">Voltar</a></p>
        </div>

    </div>
    </form>
</body>
</html>

