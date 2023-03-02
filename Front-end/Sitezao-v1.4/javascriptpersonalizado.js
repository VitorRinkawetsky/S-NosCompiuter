$(function() {
    //pesquisar softwares sem refresh
    $("#pesquisa").keyup(function() {
        var pesquisar = $(this).val();

        //verificar se a algo digitado

        if(pesquisa != ''){
            var dados = {
            palavra : pesquisa
            }
            $.post('busca.php', dados, function(retorna){
                //mostra dentro da ul os resultados obtidos
                $(".resultado").html(retorna);
            });
        }else{
            $(".resultado").html('');
        }
    });
});