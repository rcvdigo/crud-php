<?php
    //Função para verificar se a img existe, caso não exista pega o arquivo indisponivel.png
    function thumb($arq) {
        $caminho = "fotos/$arq";
        //Se por acaso o arquivo passado por parametro for nulo ou então se o arquivo do caminho não existir
        if (is_null($arq) || !file_exists($caminho)) {
            return "fotos/indisponivel.png";
        } else {
            return $caminho;
        }
    }
?>