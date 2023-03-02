<?php 
//incluir a conexão com o banco
    include_once('conexao.php');

    //recuperaro valor da palavra
    $softwares = $_POST['palavra'];

    //pesquisar no banco de dados nome do software
    $softwares = "select nome from requisito_software where nome like '%$softwares%'";
    $resultado_softwares = mysqli_query($mysqli, $softwares);

    if(mysqli_num_rows($resultado_softwares) <= 0) {
        echo "Nenhum software encontrado";
    }else {
        echo "Encontrado";
    }
?>