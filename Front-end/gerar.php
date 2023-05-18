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
    $valor_pc = 0;

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

    // Cria um loop para armazenar somente a maior pontuação de GPU e CPU
    for($i = 0; $i < count($array_softwares); $i++){

        // Pega as pontuações da GPU recomendada para rodar os softwares
        $query = "select pontuacao_gpu from requisito_software where nome = '{$array_softwares[$i]}'";
    
        $result_pont_gpu = mysqli_query($mysqli, $query);

        // Cria uma váriavel para armazenar o valor da pontuação vinda do banco de dados
        while ($resultado = $result_pont_gpu->fetch_assoc()) {
            $pontuacao_gpu = $resultado['pontuacao_gpu'];
        } 

        // Armazena a maior pontuação
        if($pont_gpu_final < $pontuacao_gpu){
            $pont_gpu_final = $pontuacao_gpu;
        } 

        // Pega as pontuações da CPU recomendada para rodar os softwares
        $query = "select pontuacao_cpu from requisito_software where nome = '{$array_softwares[$i]}'";

        $result_pont_cpu = mysqli_query($mysqli, $query);

        // Cria uma váriavel para armazenar o valor da pontuação vinda do banco de dados
        while ($resultado = $result_pont_cpu->fetch_assoc()) {
            $pontuacao_cpu = $resultado['pontuacao_cpu'];
        }

        // Armazena a maior pontuação
        if($pont_cpu_final < $pontuacao_cpu){
            $pont_cpu_final = $pontuacao_cpu;
        } 

        // Aumenta os pontos da CPU conforme o requerimento de performance do usuário
        if($fps == 144){
            $pont_cpu_final += 1500;
        }elseif($fps == 240){
            $pont_cpu_final += 3800;
        }elseif ($fps == 360) {
            $pont_cpu_final += 5500;
        }

        // Aumenta os pontos da GPU conforme o requerimento de performance do usuário
        if (strcmp($desempenho, "Médio") !== 1) {
            $pont_gpu_final += 3000;
        }elseif (strcmp($desempenho, "Alto") !== 1) {
            $pont_cpu_final += 4200;
        }elseif (strcmp($desempenho, "Ultra") !== 1) {
            $pont_cpu_final += 6000;
        }
    }
    
    // Procura CPUs no banco de dados correspondentes a pontuação de cpu obtida
    $query = "select nome_cpu from cpu where pontuacao = '{$pont_cpu_final}'";

    $resultado_cpu = mysqli_query($mysqli, $query);

    $resultados_cpu = array();

    // Caso encontre CPUs correspondentes armazena-as no array
    while ($resultado = $resultado_cpu->fetch_assoc()) {
        array_push($resultados_cpu, $resultado['nome_cpu']);
    }

    // Caso somente uma CPU tenha sido encontrada, armazena ela como CPU a ser utilizada
    if(count($resultados_cpu) == 1){
        $result_cpu_final = $resultados_cpu[0];
        echo "CPU necessária = $result_cpu_final<br>";

    // Caso não tenha sido encontrado, armazena a com a menor pontação acima da requerida
    }elseif($resultados_cpu == null){ 
        while($resultados_cpu == null){
            $pont_cpu_final++;

            $query = "select nome_cpu from cpu where pontuacao = '{$pont_cpu_final}'";

            $resultado_cpu = mysqli_query($mysqli, $query);

            $resultados_cpu = array();
            
            while ($resultado = $resultado_cpu->fetch_assoc()) {
                array_push($resultados_cpu, $resultado['nome_cpu']);
            }
        }
    }

    // Cria uma váriavel para armazenar o menor valor
    $valorMenor = 999999;

    // Cria um loop para ver os valores das peças
    for($i = 0; $i < count($resultados_cpu); $i++){

        $query = "select preco from cpu where nome_cpu = '{$resultados_cpu[$i]}'";

        $result_preco = mysqli_query($mysqli, $query);

        // Armazena o valor do preço da peça atual do loop
        while ($resultado = $result_preco->fetch_assoc()) {
            $resultado_preco = $resultado['preco'];
        }

        // Guarda qual o menor valor e o nome da peça mais barata
        if($resultado_preco < $valorMenor){
            $valorMenor = $resultado_preco;
            $result_cpu_final = $resultados_cpu[$i];
            $valor_pc += $valorMenor;
        }
    }

        // Procura GPUs no banco de dados correspondentes a pontuação de gpu obtida
        $query = "select nome_gpu from gpu where pontuacao = '{$pont_gpu_final}'";

        $resultado_gpu = mysqli_query($mysqli, $query);
    
        $resultados_gpu = array();
    
        // Caso encontre GPUs correspondentes armazena-as no array
        while ($resultado = $resultado_gpu->fetch_assoc()) {
            array_push($resultados_gpu, $resultado['nome_gpu']);
        }
    
        // Caso somente uma GPU tenha sido encontrada, armazena ela como GPU a ser utilizada
        if(count($resultados_gpu) == 1){
            $result_gpu_final = $resultados_gpu[0];
            echo "GPU necessária = $result_gpu_final<br>";
    
        // Caso não tenha sido encontrado, armazena a com a menor pontação acima da requerida
        }elseif($resultados_gpu == null){ 
            while($resultados_gpu == null){
                $pont_gpu_final++;
    
                $query = "select nome_gpu from gpu where pontuacao = '{$pont_gpu_final}'";
    
                $resultado_gpu = mysqli_query($mysqli, $query);
    
                $resultados_gpu = array();
                
                while ($resultado = $resultado_gpu->fetch_assoc()) {
                    array_push($resultados_gpu, $resultado['nome_gpu']);
                }
            }
        }
    
        // Cria uma váriavel para armazenar o menor valor
        $valorMenor = 999999;
    
        // Cria um loop para ver os valores das peças
        for($i = 0; $i < count($resultados_gpu); $i++){
    
            $query = "select preco from gpu where nome_gpu = '{$resultados_gpu[$i]}'";
    
            $result_preco = mysqli_query($mysqli, $query);
    
            // Armazena o valor do preço da peça atual do loop
            while ($resultado = $result_preco->fetch_assoc()) {
                $resultado_preco = $resultado['preco'];
            }
    
            // Guarda qual o menor valor e o nome da peça mais barata
            if($resultado_preco < $valorMenor){
                $valorMenor = $resultado_preco;
                $result_gpu_final = $resultados_gpu[$i];
                $valor_pc += $valorMenor;
            }
        }

    // Procura qual o soquete da CPU selecionada
    $query = "select soquete from cpu where nome_cpu = '{$result_cpu_final}'";

    $result_soquete = mysqli_query($mysqli, $query);
    
    while ($resultado = $result_soquete->fetch_assoc()) {
        $soquete_cpu = $resultado['soquete'];
    } 

    // Procura Placas mãe no banco de dados correspondentes ao soquete da CPU obtida
    $query = "select nome_mae from placa_mae where soquete_mae = '{$soquete_cpu}'";

    $result_mae = mysqli_query($mysqli, $query);
 
    $resultados_mae = array();
 
    // Caso encontre GPUs correspondentes armazena-as no array
    while ($resultado = $result_mae->fetch_assoc()) {
        array_push($resultados_mae, $resultado['nome_mae']);
    }

    // Cria uma váriavel para armazenar o menor valor
    $valorMenor = 999999;
    
    // Cria um loop para ver os valores das peças
    for($i = 0; $i < count($resultados_mae); $i++){

        $query = "select preco from placa_mae where nome_mae = '{$resultados_mae[$i]}'";

        $result_preco = mysqli_query($mysqli, $query);

        // Armazena o valor do preço da peça atual do loop
        while ($resultado = $result_preco->fetch_assoc()) {
            $resultado_preco = $resultado['preco'];
        }

        // Guarda qual o menor valor e o nome da peça mais barata
        if($resultado_preco < $valorMenor){
            $valorMenor = $resultado_preco;
            $result_mae_final = $resultados_mae[$i];
            $valor_pc += $valorMenor;
        }
    }

    if($valor_pc <= $orcamento){
        echo "CPU necessária = $result_cpu_final<br>";
        echo "GPU necessária = $result_gpu_final<br>";
        echo "Placa mãe necessária = $result_mae_final<br>"; 
    }else{
        echo "O orçamento é muito pequeno para montar um PC conforme requisitado!";
    }



    /*
    echo "Pontuaçao GPU: $pont_gpu_final <br>";
    echo "Pontuaçao CPU: $pont_cpu_final <br>";
    echo "Orçamento: $orcamento <br>";
    echo "Fps: $fps <br>";
    echo "grafico $grafico <br>";

    for($i = 0; $i < count($array_softwares); $i++){
        echo "Jogo: $array_softwares[$i] <br>";
    }*/
?>
