<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

        echo "Iniciando o arquivo <br>";

        // TRATANDO EXCEÇÕES
        // o comando try/catch serve para tratamento de excecoes, codigos que podem nao ser totalmente atendidos e assim gerando algum erro. 
        try{ // o try ira tentar executar os codigos que estao dentro dele, caso ocorra algum erro, ira desviar a excucao para o bloco catch
            mysql_connect("localhost");
        } 
        catch(Error $e){ // o bloco catch ira tratar o erro em questao. neste caso, ira retornar para o usuario que houve uma falha e qual é esta falha. o parametro passado esta indicando que se trata de um erro, que podera ser acessado atraves da variavel $e
            echo "Houve uma falha: " . $e -> getMessage() . "<br>";
        }

        echo "Finalizando o arquivo <br>";


        // OPERADOR ??

        $x = "teste";
        if(isset($x) == TRUE){
            $y = $x;
        } else {
            $y = "valor alternativo";
        }
        echo $y . "<br>";

        // codigo acima sendo feito apenas em uma linha
        $z = $x ?? "valor alternativo"; // o operador ?? verifica se a variavel do lado esquerdo ($x) tem algum valor. se tiver, esse valor é atrubuido para a variavel $z. senao tiver, o valor do lado direito é atribuido para a variavel $z
        echo $z . "<br>";
    ?>

</body>

</html>