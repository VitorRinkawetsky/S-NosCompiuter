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
    <div class="games">

        <table border = "1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Marca</td>
                <td>Soquete</td>
                <td>Pontuação</td>
                <td>Preço</td>
            </tr>
            <?php

                // Consulta para obter todos os registros da tabela "cpu"
                $consulta = $conexao->query('SELECT * FROM cpu');

                // Exibir os registros
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo '<td >' . $registro['id'] . '</td>';
                    echo '<td >' . $registro['nome_cpu'] . '</td>';
                    echo '<td >' . $registro['marca'] . '</td>';
                    echo '<td >' . $registro['soquete'] . '</td>';
                    echo '<td >' . $registro['pontuacao'] . '</td>';
                    echo '<td >' . $registro['preco'] . '</td>';
                   // echo '<td> <a href="?delete='.$registro['id'].'">(X)</a> </td>';
                    echo '<td><div class="wrapper"><form method="post" action="./painel_cpu.php"><input type="hidden" id="abrirModal" name="abrirModal" onclick="abrirModal()"></input><input type="hidden" value="'.$registro['id'].'" id="id_modal" name="id_modal"></input><button type="submit">Abrir</button></form></div></td>';
                    echo '<td> <a href="edit_cpu.php?id='.$registro['id'].'">(E)</a> </td>';
                    echo "</tr>";
                }
            ?>
        </table>
        
                        <div class="wrapper">
                            <a href="#demo-modal">Abrir modal</a>
                        </div>

                        <div id="demo-modal" class="modal">
                            <div class="content">
                                <h1 class="title-modal">Tem certeza que deseja excluir?</h1>

                                <a class="title-modal" href="?delete='.$id_modal.'">(X)</a>

                                <div class="footer">
                                <a href="#" class="footer-btn-close" onclick="fecharModal()"> Fechar </a>
                                </div>

                                <a href="#" class="close" onclick="fecharModal()">&times;</a>
                        
                                <?php
                                    if(isset($_GET['id_modal'])) {
                                        $id_modal = $_GET['id_modal'];
                                        echo "<p>$id_modal</p>";
                                    }
                                ?>
                            </div>
                        </div>


        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="cadastro_cpu.php">Cadastrar CPU</a></p>
        </div>

        <div class="div-painel">
            <p class="style-p"><a class="style-href" href="painel.php">Voltar</a></p>
        </div>
    </div>
    </form>
</body>
</html>
<script>
    function fecharModal() {
        let el = document.getElementById('demo-modal');
            el.classList.remove('modal-show');
            el.classList.add('modal');
    }

    function abrirModal() {
        let el = document.getElementById('demo-modal');
            el.classList.remove('modal');
            el.classList.add('modal-show');
    }
</script>


<?php
    if(isset($_POST['id_modal'])) {
        $id_modal = (int)$_POST['id_modal'];
        echo "<p>$id_modal</p>";
    }
?>

