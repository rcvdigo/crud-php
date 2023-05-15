<?php
    echo "<footer>";
    echo"<p>Acessado por ". $_SERVER['SERVER_NAME'] ." em". date('d/m/Y') ."</p>";
    echo"<p>Desenvolvido por Rodrigo Camurça Vera &copy; 2023</p>";
    echo"</footer>";
    $banco->close();
    //$banco = null;
?>