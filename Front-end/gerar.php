<script type="./js/selecionar_software"></script>
<?php

    include_once('conexao.php');
    
    // Cria uma variavel para armazenar as informações dadas pelo usuário
    $orcamento = $_POST["orcamento"];
    $desempenho = $_POST['desempenho'];
    $fps = $_POST['fps'];
    $grafico = $_POST['grafico'];

    // Receba a informação da variável "software_nome" enviada pela classe JavaScript via AJAX
    $data = json_decode(file_get_contents("php://input"), true);
    var_dump($data);

    // Armazene a informação em uma variável chamada "softwareNome_php"
    $software_nome = $data->software_nome;

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
    echo $software_nome
?>
