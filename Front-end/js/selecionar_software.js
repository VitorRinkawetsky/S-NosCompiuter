function selecionarItem(item){

    item.classList.add("selected");
    console.log(item);

    var software_nome = item.innerText;
    console.log(software_nome);

    // Use a função "fetch" para enviar a variável para o arquivo PHP via AJAX
    fetch('gerar.php', {
    method: 'POST',
    body: JSON.stringify({ software_nome: software_nome }),
    headers: { 'Content-Type': 'application/json' }
    })
    .then(response => {
    console.log('Informação enviada com sucesso para o arquivo gerar.php.' + software_nome);
    })
    .catch(error => {
    console.error('Ocorreu um erro ao enviar a informação para o arquivo gerar.php:', error);
    });
}