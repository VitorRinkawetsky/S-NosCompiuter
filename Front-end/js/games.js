// Pega o valor do botão On/Off
var onOff = document.getElementById('onOff');

// Cria uma variavel para o botão
var selectGeral = document.getElementById('btnDesempenhoGeral');
var selectFps = document.getElementById('btnFps');
var selectGrafico = document.getElementById('btnGrafico');

// Desabilita os botões das opções avançadas
selectFps.disabled = true;
selectGrafico.disabled = true;

// Cria um evento para ao alterar o valor de On/Off os botões sejam ativados e desativados
onOff.addEventListener('change', function(){
    if(onOff.value == 'On'){
        selectGeral.disabled = true;
        selectFps.disabled = false;
        selectGrafico.disabled = false;
    
    } else {
        selectGeral.disabled = false;
        selectFps.disabled = true;
        selectGrafico.disabled = true;
    
    }
});

