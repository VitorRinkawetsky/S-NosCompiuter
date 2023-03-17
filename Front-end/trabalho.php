<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Games</title>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/horta" type="text/css" />
</head>

<body>
  <header>
    <a href="index.php"><button class="titulo">SóNosCompiuter</button></a>
  </header>

  <main>

    <h1>Trabalho</h1>

    <div class="games">
      <p class="pgames">Orçamento:</p>
      <input class="label orçamento" type="number" name = "orcamento" placeholder="R$">
      
      <div class="trabalho">
      <a href=""><img src="img/btn-casa.png" alt="btn-games"></a>
      <a href=""><img src="img/btn-empresa.png" alt="btn-trabalho"></a>
    </div>

      <div class="submit-line">
        <input class="busca" type="text" name = "pequisaApp" placeholder="Apps a serem usados"/>
        <button class="submit-lente" type="submit">
          <i class="fa fa-search"></i>
        </button>
        
      </div>
      <ul class ="resultado">

        </ul>
      <button class="proximo" type="submit" name="Próximo" id="proximo">Próximo</button>
    </div>

  </main>
</body>

</html>