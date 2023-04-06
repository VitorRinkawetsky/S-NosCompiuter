<?php
     $conteudo = file_get_contents('https://www.pichau.com.br/processador-intel-core-i9-13900-24-core-32-threads-2-0ghz-5-6ghz-turbo-cache-36mb-lga1700-bx8071513900');

     preg_match_all('/<h4 class="sc-d6a30908-1 bvBNDf finalPrice">(.*?)<\/h4>/', $conteudo, $matches);

     print_r($matches);
?>