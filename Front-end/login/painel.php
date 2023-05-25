<script src="../js/logout.js"></script>

<?php
    include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
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
 
    <h1>Bem vindo a tela de cadastros</h1>

    <div class="painel">
            <div class="flexbox">
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="painel_cpu.php">Painel CPU</p>
            </div>
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="cadastro_gpu.php">Cadastrar GPU</p>
            </div>
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="cadastro_placamae.php">Cadastrar Placa Mãe</p>
            </div>
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="cadastro_software.php">Cadastrar Software</p>
            </div>
            <div class="div-painel">
                <p class="style-p"><a class="style-href" href="cadastro_admin.php">Cadastrar Login de Adiministrador</p>
            </div>
            </div>
       <button class="proximo" onclick="logout()">Deslogar</button>
    </div>
    <br>
    

    
    </main>
</body>
</html>