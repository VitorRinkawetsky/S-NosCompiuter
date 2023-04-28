<script src="./js/selecionar_software.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?php

    include_once('conexao.php');
    
    // Cria uma variavel para armazenar as informações dadas pelo usuário
    $orcamento = $_POST["orcamento"];
    $desempenho = isset($_POST['desempenho']) ? $_POST['desempenho'] : null;
    $software_nome = $_POST['data'];

    if($desempenho == null) {
        $fps = $_POST['fps'];
        $grafico = $_POST['grafico'];
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
    
    echo $orcamento . "<br>";
    echo $fps . "<br>";
    echo $grafico . "<br>";
    echo $software_nome;
?>
