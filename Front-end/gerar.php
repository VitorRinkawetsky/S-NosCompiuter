<script type="./js/selecionar_software"></script>
<?php

    include_once('conexao.php');

    $orcamento = $_POST["orcamento"];
    $desempenho = $_POST['desempenho'];
    $fps = $_POST['fps'];
    $grafico = $_POST['grafico'];


    $softwares = array($_POST['software_nome']);


    $soft = "select * from requisito_software where nome like '%$softwares%'";
    $resultado_softwares = mysqli_query($mysqli, $soft);


    if($desempenho !== null){
        if($desempenho == "Baixo"){
            $fps = 60;
            $grafico = "Baixo";
        } elseif($desempenho == "Médio"){
            $fps = 60;
            $grafico = "Médio";
        } elseif($desempenho == "Alto"){
            $fps = 60;
            $grafico = "Alto";
        }
    }
    
    echo $desempenho;
    echo $orcamento;
    echo $fps;
    echo $grafico;
    echo $softwares[0];
?>
