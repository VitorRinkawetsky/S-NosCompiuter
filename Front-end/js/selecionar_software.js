var softwares = [];
var i = 0;
var j = 1;

function selecionarItem(item){

    //momentaneamente ele só deixa o item selecionado amarelo só pra identificação
    item.classList.add("selected");

    //puxa o texto dpo software selecionado
    var software_nome = item.innerText;

    //validação para não ter softwares repetidos
    for(var k =0;k < j; k++) {

      if(software_nome == softwares[k]){
        alert("Software já inserido!");
        throw "";
      }
    }

    //adiciona o software a array(eu sei que o for é inutil porem está funcionando e prefiro não mudar)
    for(i;i < j;i++){

      softwares[i] = software_nome;
    }

    //somente para visualização não importa
    for(var o = 0;o < j;o++){
      console.log(o);
      console.log(softwares[o]);
    }

    // Exibe o texto fora da tabela
    const container = document.querySelector('#output');
    container.insertAdjacentHTML('beforeend', '<li>' + software_nome + '</li>');

    //j é a variavel para armazenar o numero total de softwares ja selecionados
    j++;

    // Use a função "fetch" para enviar a variável para o arquivo PHP via AJAX
    $.ajax({
        type: "POST",
        url: "gerar.php",
        data: { data: software_nome },
        success: function(response) {
          console.log("Requisição enviada com sucesso " + software_nome);
        }
      });
}






