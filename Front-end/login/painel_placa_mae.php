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
    <title>Cadastro placa-Mãe</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
    </header>

    <h1>Painel Placa-Mãe</h1>
    <form action="" method="POST">
        <div class="painel">

            <table border="1">
                <tr>
                    <td class="tabela">ID</td>
                    <td class="tabela">Nome</td>
                    <td class="tabela">Pontuação CPU</td>
                    <td class="tabela">Pontuação GPU</td>
                </tr>
                <?php

                    // Consulta para obter todos os registros da tabela "cpu"
                    $consulta = $conexao->query('SELECT * FROM requisito_software');

                    // Exibir os registros
                    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo '<td class="id-peca">' . $registro['id'] . '</td>';
                        echo '<td class="id-peca">' . $registro['nome'] . '</td>';
                        echo '<td class="id-peca">' . $registro['pontuacao_cpu'] . '</td>';
                        echo '<td class="id-peca">' . $registro['pontuacao_gpu'] . '</td>';
                        echo '<td class="pencil"> <a href="?delete='.$registro['id'].'"><img class="trash" src="../img/trash.png" alt=""></a> </td>';
                        echo '<td class="pencil"> <a href="edit_placa_mae.php?id='.$registro['id'].'"><img class="trash"  src="../img/pencil.png" alt=""></a> </td>';
                        echo "</tr>";
                    }
                ?>
            </table>

            <div class="painel-container">
                <div class="div-painel">
                    <p class="style-p"><a class="style-href" href="cadastro_placa_mae.php">Cadastrar Placa-Mãe</a></p>
                </div>

                <div class="div-painel">
                    <p class="style-p"><a class="style-href" href="painel.php">Voltar</a></p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>