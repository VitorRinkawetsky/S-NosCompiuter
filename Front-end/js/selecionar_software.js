function selecionarItem(item){

    item.classList.add("selected");
    console.log(item);

    var software_nome = item.innerText;
    console.log(software_nome);

    // Cria um objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Define a URL do arquivo PHP que irá receber os dados
    var url = "gerar.php";

    // Define o tipo de requisição e a URL de destino
    xhr.open("POST", url, true);

    // Define o tipo de conteúdo que será enviado (no caso, uma string)
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envia a requisição
    xhr.send("software_nome=" + software_nome);

    // Verifica se a requisição foi concluída com sucesso
    xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        // A resposta do servidor está disponível em xhr.responseText
        console.log(xhr.responseText);
    }
    };

    }