<script type="./js/selecionar_software"></script>
<?php

    include_once('conexao.php');
    
    // Cria uma variavel para armazenar as informações dadas pelo usuário
    $orcamento = $_POST["orcamento"];
    $desempenho = $_POST['desempenho'];
    $fps = $_POST['fps'];
    $grafico = $_POST['grafico'];

    // Cria e armazena os softwares escolhidos pelo usuário em um array
    $softwares = array();
    for($i = 0; $i < count($softwares); $i++){
        $softwares[$i] = $_POST['software_nome'];
    }

    // Da valores de FPS e desempenho caso as opções avançadas não tenham sido ativadas
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
    
    echo $orcamento;
    echo $fps;
    echo $grafico;
    echo $softwares[0];
?>
