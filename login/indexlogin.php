<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
    </header>
    <main>
        <h1>Login dos administradores</h1>

        <div class="games">
            <form action="" method="POST">
                <p>
                    <label class="label-login">Login:</label>
                    <input class="input-login" type="text" name="login">
                </p>
                <p>
                    <label class="label-login">Senha:</label>
                    <input class="input-login" type="password" name="senha">
                </p>
                <p>
                    <input class="proximo" type="submit" name="" id=""></input>
                </p>
            </form>
        </div>
    </main>

</body>

</html>

<?php
    include('conexao.php');

    if(isset($_POST['login']) || isset($_POST['senha'])) {
        if(strlen($_POST['login']) == 0) {
            echo "<div class='info'>Preencha o login</div>";
        }else if(strlen($_POST['senha']) == 0) {
            echo "<div class='info'>Preencha a senha</div>";
        }else{
            $login = $mysqli->real_escape_string($_POST['login']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "select * from admin_login where login = '$login'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;
            $resultado = $sql_query->fetch_assoc();

            if($quantidade == 0 || $quantidade > 1) {
                echo "<div class='info'>Login ou senha Inválido</div>";
            }else {
                if(password_verify($senha, $resultado['senha']) == 1) {
                    if(!isset($_SESSION)){
                        session_start();
                    }

                    $_SESSION['id'] = $resultado['id'];

                    header("Location: painel.php");

                }else {
                    echo "<div class='info'>Login ou senha Inválido</div>";
                }
            }
        }
    }
?>