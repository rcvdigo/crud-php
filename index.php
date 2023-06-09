<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://github.com/rcvdigo/crud-php/blob/main/estilos/main.css">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Crud Com PHP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php
        require_once "includes/acesso_banco_de_dados.php";
        require_once "includes/funcoes.php";
        $ordenar = $_GET['o'] ?? "n";
        $search = $_GET['c'] ?? "";
    ?>
</head>
<body>
    <?php include_once "topo.php"; ?><p> </p>
    <form method="get" id="busca" action="index.php">
        Buscar: <input type="tex" name="c" size="10" maxlength="40" placeholder="Digite aqui..." id="campo_busca"/>
        <input type="submit" value="Ok" id="btn-enviar" class="btn btn-primary"/>
        <br/>Ordenar: 
                      <a href="index.php?o=n&c=<?php echo $search; ?>">Nome</a>| 
                      <a href="index.php?o=p&c=<?php echo $search; ?>">Produtora</a> | 
                      <a href="index.php?o=n1&c=<?php echo $search; ?>">Nota Alta</a> | 
                      <a href="index.php?o=n2&c=<?php echo $search; ?>">Nota Baixa</a> |
                      <a href="index.php?o=n"> Mostrar Todos </a>
                      <p></p>
    </form>
    <main>
        <div class="m-auto text-center" id="corpo">
            <table class="table listagem">
                <?php
                    //$busca = $banco->query("SELECT * FROM jogos ORDER BY nome");
                    //$sql = "SELECT J.nota, P.produtora, G.genero, J.cod, J.nome, J.capa FROM jogos J, generos G, produtoras P WHERE J.genero = G.cod AND J.produtora = P.cod ";
                    $sql = "SELECT J.nota, P.produtora, G.genero, J.cod, J.nome, J.capa FROM jogos J INNER JOIN generos G ON J.genero = G.cod INNER JOIN produtoras P ON J.produtora = P.cod ";
                    
                    //SELECT * FROM public.django_content_type ORDER BY id ASC 
                    if(!empty($search)) {
                        $sql .= "WHERE J.nome LIKE '$search%' OR P.produtora LIKE '$search%' OR G.genero  LIKE '$search%' ";
                    }

                    switch ($ordenar) {
                        case "p":
                            $sql .= "ORDER BY P.produtora";
                            break;
                        case "n1":
                            $sql .= "ORDER BY J.nota DESC";
                            break;
                        case "n2":
                            $sql .= "ORDER BY J.nota ASC";
                            break;
                        default:
                            $sql .= "ORDER BY J.nome";
                            break;
                    }
                    
                    $busca = $banco->query($sql);
                    //$busca->fetchObject();
                    
                    if(!$busca){
                        echo "<tr><td>Infelizmente a busca deu errado";
                    } else {
                        if ($busca->num_rows == 0) {
                            echo "<tr><td>Nenhum registro encontrado";
                        } else {
                            //Colunas do formulário
                            echo'
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Capa</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Adm</th>
                                </tr>
                            </thead>
                            ';
                            //Imprimindo os dados do Banco da tabela JOGOS
                            echo"<tbody>";
                            while($reg=$busca->fetch_object()){
                                //Criando variável para verificar se a img existe.
                                $t = thumb($reg->capa);
                                echo"
                                        <tr>
                                            <td><img src='$t' class='mini'/></td>
                                            <td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a> <br/> Genero: [$reg->genero] <br/>Produtora: [$reg->produtora] </td>
                                            <td>Adm</td>
                                        </tr>
                                            
                                    ";
                            }
                            echo"</tbody>";
                        }
                    }
                ?>
            </table>
            <div class="m-auto pt-4 pb-2 text-center">
                <div class="m-auto pt-4 pb-2 text-center">
                        <a href="" class="btn btn-primary"><</a>
                        <a href="" class="btn btn-primary">></a>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "rodape.php"; ?>
</body>
</html>
<!--                
            <div class="col-8 m-auto pt-2 pb-2 text-center">
            <h1>Crud Com PHP - Desenvolvedor: <a href="https://www.linkedin.com/in/rodrigo-camur%C3%A7a-vera-53a950215/" target="_blank">Rodrigo</a></h1>
        </div>
        <div class="col-8 m-auto pt-3 pb-2 text-center">
            <a href="/form" class="btn btn-success">Adicionar</a>
        </div>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ dbs.id }}</th>
                        <td>{{ dbs.modelo }}</td>
                        <td>{{ dbs.marca }}</td>
                        <td>
                            <a href="/view/{{dbs.id}}/" class="btn btn-dark">Visualizar</a>
                            <a href="/edit/{{dbs.id}}/" class="btn btn-primary">Editar</a>
                            <a href="/delete/{{dbs.id}}/" class="btn btn-danger btnDel">Deletar</a>
                        </td>
                    </tr>
                </tbody>
-->