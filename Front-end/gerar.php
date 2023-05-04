<script src="./js/selecionar_software.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?php

    include_once('conexao.php');
    
    // Cria uma variavel para armazenar as informações dadas pelo usuário
    $orcamento = $_POST["orcamento"];
    $desempenho = isset($_POST['desempenho']) ? $_POST['desempenho'] : null;
    $software_nome_string = $_POST['txtsoftwares'];
    $array_softwares = explode(",", $software_nome_string); 

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

    $query = "select pontuacao_gpu from requisito_software where nome = '{$software_nome}'";

    $result_pont_gpu = mysqli_query($mysqli, $query);

    while ($pontuacao_gpu = $result_pont_gpu->fetch_assoc()) {
        echo "Pontuação da GPU: $pontuacao_gpu['pontuacao_gpu'].<br>";
    }

    $query = "select pontuacao_cpu from requisito_software where nome = '{$software_nome}'";

    $result_pont_cpu = mysqli_query($mysqli, $query);

    while ($pontuacao_cpu = $result_pont_cpu->fetch_assoc()) {
        echo "Pontuação da CPU: $pontuacao_cpu['pontuacao_gpu'].<br>";
    }
    
    echo $orcamento . "<br>";
    echo $fps . "<br>";
    echo $grafico . "<br>";
    print_r($array_softwares);
    echo $software_nome_string . "<br>";
    echo count($array_softwares);
?>
