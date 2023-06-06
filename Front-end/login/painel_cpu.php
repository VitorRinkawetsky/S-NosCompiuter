<?php
    include('protect.php');
    include('conexao2.php');

    //verifica se foi clicado ou não no botão para excluir 
    if(isset($_GET['delete'])) {
        $id = (int)$_GET['delete'];
        $conexao->exec("DELETE from cpu where id=$id");
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

    <h1>Painel CPU</h1>
    <form action="" method="POST">
        <div class="painel">

            <table border="1">
                <tr>
                    <td class="tabela">ID</td>
                    <td class="tabela">Nome</td>
                    <td class="tabela">Marca</td>
                    <td class="tabela">Soquete</td>
                    <td class="tabela">Pontuação</td>
                    <td class="tabela">Preço</td>
                </tr>
                <?php

                // Consulta para obter todos os registros da tabela "cpu"
                $consulta = $conexao->query('SELECT * FROM cpu');

                // Exibir os registros
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo '<td class="id-peca">' . $registro['id'] . '</td>';
                    echo '<td class="id-peca">' . $registro['nome_cpu'] . '</td>';
                    echo '<td class="id-peca">' . $registro['marca'] . '</td>';
                    echo '<td class="id-peca">' . $registro['soquete'] . '</td>';
                    echo '<td class="id-peca">' . $registro['pontuacao'] . '</td>';
                    echo '<td class="id-peca">' . $registro['preco'] . '</td>';
                   // echo '<td class="pencil"> <a href="?delete='.$registro['id'].'"><img class="trash" src="../img/trash.png" alt=""></a> </td>';
                   echo '<td class="pencil"> <a href="?id_modal='.$registro['id'].'&modal_show=1"><img class="trash" src="../img/trash.png" alt=""></a> </td>';
                    echo '<td class="pencil"> <a href="edit_cpu.php?id='.$registro['id'].'"><img class="trash"  src="../img/pencil.png" alt=""></a> </td>';
                    echo "</tr>";
                }
            ?>
            </table>

            <div class="painel-container">
                <div class="div-painel">
                    <p class="style-p"><a class="style-href" href="cadastro_cpu.php">Cadastrar CPU</a></p>
                </div>

                <div class="div-painel">
                    <p class="style-p"><a class="style-href" href="painel.php">Voltar</a></p>
                </div>
            </div>
        </div>
    </form>
    <dialog id="modal-confirm">
        <a onclick="close_modal()" href="?modal_show=0">X</a>
        <div class="content">
            <span>Tem certeza que quer excluir o item selecionado?</span>
        </div>

        <?php
            $id = isset($_GET['id_modal']);
        ?>

        <a  href="?delete='fgf'">Excluir</a>
    </dialog>
    
    <script>
        let modal = document.getElementById('modal-confirm');

        function close_modal(){
        modal.close();
        }
    </script>
    <?php
        if(isset($_GET['modal_show'])){
            if($_GET['modal_show'] == 1){
                echo"<script>modal.showModal();</script>";
            }
        }
        ?>
</body>

</html>

<?php
    if(isset($_POST['id_modal'])) {
        $id_modal = (int)$_POST['id_modal'];
        echo "<p>$id_modal</p>";
    }
?>