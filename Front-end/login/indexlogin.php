<?php
    include('conexao.php');

    if(isset($_POST['login']) || isset($_POST['senha'])) {
        if(strlen($_POST['login']) == 0) {
            echo "Preencha o login";
        }else if(strlen($_POST['senha']) == 0) {
            echo "Preencha a senha";
        }else{
            $login = $mysqli->real_escape_string($_POST['login']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "select * from admin_login where login = '$login' and senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];

                header("Location: painel.php");

            }else {
                echo "Login ou senha incorretos";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login dos administradores</h1>
    <form action="" method="POST">
        <p>
            <label>Login</label>
            <input type="text" name="login">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Enviar</button>
        </p>
    </form>
</body>
</html>