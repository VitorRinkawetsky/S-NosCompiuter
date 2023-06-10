var softwares = [];
var i = 0;
var j = 1;

function selecionarItem(item) {
  // puxa o texto do software selecionado
  var software_nome = item.innerText;
  console.log(software_nome);

  // validação para não ter softwares repetidos
  for (var k = 0; k < j; k++) {
    if (software_nome == softwares[k]) {
      alert("Software já inserido!");
      throw "";
    }
  }

  softwares.push(software_nome);

  // somente para visualização não importa
  for (var o = 0; o < j; o++) {
    console.log(o);
    console.log(softwares[o]);
  }

  // Exibe o texto fora da tabela
  const container = document.querySelector('#output');
  var softwareId = 'software-' + j; // identificador único
  container.insertAdjacentHTML('beforeend', "<li id='" + softwareId + "' class='software-name'>" + software_nome + '<button type="button" onclick="removerSoftware(\'' + softwareId + '\')">Excluir</button></li>');

  // j é a variável para armazenar o número total de softwares já selecionados
  j++;

  // REQUISIÇÃO AJAX
  // cria o objeto XMLHttpRequest
  const xhttp = new XMLHttpRequest();
  // chama a função quando a requisição é recebida
  xhttp.onload = function() {
    document.querySelector("#demo").innerHTML = this.responseText;
  }
  // faz a requisição AJAX - método POST
  xhttp.open("POST", "resultArray.php");
  // adiciona um header para a requisição HTTP
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // especifica os dados que deseja enviar
  xhttp.send("array=" + softwares);
}

function removerSoftware(item) {
  console.log("Excluído");

  var softwareId = item;
  var softwareRemovido = document.getElementById(softwareId);

  if (softwareRemovido) {
    softwareRemovido.remove(); // Remove o elemento do HTML
  }

  var softwareIndex = softwares.findIndex(function(software) {
    return softwareId === 'software-' + (softwares.indexOf(software) + 1);
  });

  if (softwareIndex !== -1) {
    softwares.splice(softwareIndex, 1);
  }

  // REQUISIÇÃO AJAX
  // cria o objeto XMLHttpRequest
  const xhttp = new XMLHttpRequest();
  // chama a função quando a requisição é recebida
  xhttp.onload = function() {
    document.querySelector("#demo").innerHTML = this.responseText;
  }
  // faz a requisição AJAX - método POST
  xhttp.open("POST", "resultArray.php");
  // adiciona um header para a requisição HTTP
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // especifica os dados que deseja enviar
  xhttp.send("array=" + softwares);
}
