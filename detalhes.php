<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalhes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once "includes/acesso_banco_de_dados.php";
        require_once "includes/funcoes.php";
    ?>
</head>
<body>
    <main>
        <?php include_once "topo.php"; ?>
        <div id="corpo">
            <h1>Detalhes do jogo</h1>
            <?php
                $c = $_GET['cod'] ?? 0;
                $busca = $banco->query("SELECT * FROM jogos WHERE cod='$c'");
            ?>
            <table class="detalhes">
                <?php
                    if(!$busca) {
                        echo "<tr><td>Busca falhou! $banco->error";
                    } else {
                        if($busca->num_rows == 1) {
                            $reg = $busca->fetch_object();
                            $t = thumb($reg->capa);
                            echo "
                            <tr style='display: block;'>
                                <td rowspan='3' style='display: block;'><img src='$t' class='full'/></td>
                                <td style='display: block;'><h2>$reg->nome</h2> <span class='nota'>Nota: $reg->nota</span></td>                
                            </tr>
                            <tr style='display: block;'>
                                <td style='text-align: left; display: block;'>$reg->descricao</td>
                            </tr>
                            <tr style='display: block;'>
                                <td style='display: block;'>Adm</td>
                            </tr>
                            ";
                        } else {
                            echo "<tr><td>Nenhum registro encontrado";
                        }
                    }
                ?>
            </table>
            <a href="index.php"><img src="icones/icoback.png"/></a>
        </div>
        <?php include_once "rodape.php"; ?>
    </main>
</body>
</html>