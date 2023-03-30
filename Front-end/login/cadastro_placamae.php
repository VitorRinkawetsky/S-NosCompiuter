<?php
    include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Placa Mãe</title>
</head>
<body>
    <h1>Cadastro de Placa Mãe</h1>
    <form action="" method="POST">
        <p>Nome da Placa Mãe: <input type="text" id="nome_placa_mae" name="nome_placa_mae"></p>

        <p>Soquete Placa Mãe: <input type="text" id="soquete_placa_mae" name="soquete_placa_mae"></p>

        <p>Interface Gráfica: <input type="text" id="interface_grafica_mae" name="interface_grafica_mae"></p>

        <p>Marca: <input type="text" id="marca_mae" name="marca_mae"></p>

        <p>Preço: <input type="text" id="preco_mae" name="preco_mae"></p>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

<?php
    include("conexao.php");
    session_start();

    $nome_mae = filter_input(INPUT_POST, 'nome_placa_mae', FILTER_SANITIZE_STRING);

    $soquete_mae = filter_input(INPUT_POST, 'soquete_placa_mae', FILTER_SANITIZE_STRING);

    $interface_grafica = filter_input(INPUT_POST, 'interface_grafica_mae', FILTER_SANITIZE_STRING);

    $marca = filter_input(INPUT_POST, 'marca_mae', FILTER_SANITIZE_STRING);

    $preco = filter_input(INPUT_POST, 'preco_mae', FILTER_SANITIZE_STRING);

    $query = "select nome_mae from placa_mae where nome_mae = '{$nome_mae}'";

    $resultado = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($resultado);

    if($row == 0){
        $sql = "insert into placa_mae (soquete_mae, interface_grafica, marca, preco, nome_mae) values('$soquete_mae', '$interface_grafica', '$marca', $preco, '$nome_mae')";

        $result = mysqli_query($mysqli, $sql);

        if(mysqli_insert_id($mysqli)) {
            echo "<p>Placa mãe cadastrada com sucesso!</p>";
        }
    }else {
        echo "Placa ja cadastrada";
    }
?>