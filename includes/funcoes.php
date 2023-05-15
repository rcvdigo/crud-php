<?php
    //Função para verificar se a img existe, caso não exista pega o arquivo indisponivel.png
    function thumb($arq) {
        //$caminho = "fotos/$arq";
        $caminho = "$arq";
        //echo"++++  $caminho ++++";
        //Se por acaso o arquivo passado por parametro for nulo ou então se o arquivo do caminho não existir
        if (is_null($arq)) {
            //return "fotos/indisponivel.png";
            //echo"----  $caminho -----";
            return "https://github.com/rcvdigo/crud-php/blob/main/fotos/indisponivel.png?raw=true";
        } else {
            //echo"###### $caminho ########";
            return $caminho;
        }
    }
?>