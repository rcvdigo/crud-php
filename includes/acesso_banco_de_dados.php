<?php
	// criando um objeto da biblioteca mysqli de conexao ao banco de dados 
	// $ serve para criar uma variavel
	// parametros (host, usuario, senha, banco)


	/*
	$banco = new mysqli("localhost", "root", "", "crud-php");
	if($banco->connect_errno) {
		echo "<p>Encontrei um erro $banco->errno -->$banco->connect_error</p>";
		die();
	}
	//Executando uma consulta com mysqli
	//Criando uma variavel $busca com o resultado da busca usando o metodo do mysqli
	$busca = $banco->query("SELECT * FROM generos");
	*/


	/*
	// ! operador de negação, se não der certo a busca faça isso:
	if(!$busca){
		echo "<p>Falha na busca! $banco->error</p>";
	} else {
		//Criando o objeto de consulta mysqli		
		while($reg = $busca->fetch_object()){
			print_r($reg);
		}
	}
	*/

	
    //endereco
    //nome do BD
    //usuario
    //senha
    
    $endereco = "35.227.164.209";
    $dbname = "testdb_tfqc   ";
    $usuario = "testdb_tfqc_user";
    $senha = "kvRZ7bPFDxh4dRaDpjz2aZq3PfZDLZn3";
	//$banco = new mysqli("localhost", "root", "", "crud-php");
    try {
        //Primeiro argumento DSN
        //Driver (SGBD)
        //host
        //porta
        //sgbd;host;port;dbname
        //usuario
        //senha
        //errmode
        $banco = new PDO("pgsql:host=$endereco;port=5432;dbname=$dbname", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo"Conectado no banco de dados!!!";
    } catch (PDOException $e) {
        //throw $th;
        echo"Falha ao conectar ao banco de dados. <br/>!!!";
        die($e->getMessage());
    }

?>