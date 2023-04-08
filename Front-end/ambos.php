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

    <h1>Ambos</h1>

    <div class="games">
      <p class="pgames">Orçamento:</p>
      <input class="label orçamento" type="number" name = "orcamento" placeholder="R$">
      <br>
      <p class="pgames">Desempenho geral:</p>

      <select name = "desempenho" id = "btnDesempenhoGeral">
        <option value="Alto">Alto</option>
        <option value="Médio">Médio</option>
        <option value="Baixo">Baixo</option>
      </select>
      <br>
      <p class="pgames">Configurações avançadas:</p>
      <select id="onOff">
        <option value="Off" selected>Off</option>
        <option value="On">On</option>
      </select>

      <div class="avançado">
        <p class="pavançado">FPS:</p>
        <select name = "fps" class="selectavançado" id = "btnFps">
          <option value="60" selected>60</option>
          <option value="144">144</option>
          <option value="240">240</option>
          <option value="360">360</option>
        </select>
        <br><br>
        <p class="pavançado">Gráficos:</p>
        <select name = "grafico" class="selectavançado" id = "btnGrafico">
          <option value="ultra" selected>Ultra</option>
          <option value="Alto">Alto</option>
          <option value="Médio">Médio</option>
          <option value="Baixo">Baixo</option>
        </select>
      </div>

      <div class="submit-line">
        <input class="busca" type="text" name = "pesquisaJogo" placeholder="Jogo desejado"/>
        <button class="submit-lente" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
      <div class="submit-line">
        <input class="busca" type="text" name = "pesquisaApp" placeholder="Apps a serem usados"/>
        <button class="submit-lente" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
      <ul class ="resultado">

        </ul>
      <form action="final.php">
      <input class="proximo" type="submit" name="Próximo" id="proximo"></input>
      </form>
      
    </div>

  </main>

  <script src="./js/games.js"></script>
</body>

</html>