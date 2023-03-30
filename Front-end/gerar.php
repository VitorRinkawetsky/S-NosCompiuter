<?php

    include_once('conexao.php');

    $orcamento = $_POST["orcamento"];
    $desempenho = $_POST['desempenho'];
    $fps = $_POST['fps'];
    $grafico = $_POST['grafico'];
    $softwares = $_POST["pesquisaApp"];


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
    echo $softwares;
?>