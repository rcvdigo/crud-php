<?php
    //endereco
    //nome do BD
    //usuario
    //senha
    
    $endereco = "35.227.164.209";
    $banco = "testdb_tfqc   ";
    $usuario = "testdb_tfqc_user";
    $senha = "kvRZ7bPFDxh4dRaDpjz2aZq3PfZDLZn3";

    try {
        //Primeiro argumento DSN
        //Driver (SGBD)
        //host
        //porta
        //sgbd;host;port;dbname
        //usuario
        //senha
        //errmode
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo"Conectado no banco de dados!!!";



        
    } catch (PDOException $e) {
        //throw $th;
        echo"Falha ao conectar ao banco de dados. <br/>!!!";
        die($e->getMessage());
    }
?>