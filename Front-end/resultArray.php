<?php 
    // obtém dados (string) enviados pelo JavaScript e transforma em array PHP
    //transforma a string de itens separados em array
    $array_produtos = filter_input(INPUT_POST, 'array', FILTER_SANITIZE_SPECIAL_CHARS);
    $array_produtos = explode(",", $array_produtos); 

    //mostra o conteúdo do array 
   
     print_r($array_produtos); 
     ?>

 