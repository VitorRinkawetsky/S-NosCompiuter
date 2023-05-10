<script src="./js/selecionar_software.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<?php

    include_once('conexao.php');
    
    // Cria uma variavel para armazenar as informações dadas pelo usuário
    $orcamento = $_POST["orcamento"];
    $desempenho = isset($_POST['desempenho']) ? $_POST['desempenho'] : null;
    $software_nome_string = $_POST['txtsoftwares'];
    $array_softwares = explode(",", $software_nome_string); 
    $pont_gpu_final = 0;
    $pont_cpu_final = 0;

    // Caso o desempenho Geral seja nulo ele cria as variaveis para o FPS e o Gráfico avançado
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

    for($i = 0; $i < count($array_softwares); $i++){
        // Pega as pontuações da GPU recomendada para rodar os softwares
        $query = "select pontuacao_gpu from requisito_software where nome = '{$array_softwares[$i]}'";
    
        $result_pont_gpu = mysqli_query($mysqli, $query);

        // Cria uma váriavel para armazenar a informação vinda do banco de dados
        while ($resultado = $result_pont_gpu->fetch_assoc()) {
            $pontuacao_gpu = $resultado['pontuacao_gpu'];
        } 

        if($pont_gpu_final < $pontuacao_gpu){
            $pont_gpu_final = $pontuacao_gpu;
        } 

        // Pega as pontuações da CPU recomendada para rodar os softwares
        $query = "select pontuacao_cpu from requisito_software where nome = '{$array_softwares[$i]}'";

        $result_pont_cpu = mysqli_query($mysqli, $query);

        // Cria uma váriavel para armazenar a informação vinda do banco de dados
        while ($resultado = $result_pont_cpu->fetch_assoc()) {
            $pontuacao_cpu = $resultado['pontuacao_cpu'];
        }

        if($pont_cpu_final < $pontuacao_cpu){
            $pont_cpu_final = $pontuacao_cpu;
        } 
    }

    echo "Pontuaçao GPU: $pont_gpu_final <br>";
    echo "Pontuaçao CPU: $pont_cpu_final <br>";
    echo "Orçamento: $orcamento <br>";
    echo "Fps: $fps <br>";
    echo "grafico $grafico <br>";

    for($i = 0; $i < count($array_softwares); $i++){
        echo "Jogo: $array_softwares[$i] <br>";
    }
?>
