function selecionarItem(item){

    item.classList.add("selected");
    console.log(item);

    var software_nome = item.innerText;
    console.log(software_nome);

    // Use a função "fetch" para enviar a variável para o arquivo PHP via AJAX
    $.ajax({
        type: "POST",
        url: "../gerar.php",
        data: { data: software_nome },
        success: function(response) {
          console.log("Requisição enviada com sucesso " + software_nome);
        }
      });
}