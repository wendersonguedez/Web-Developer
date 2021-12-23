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

    echo "hello world! <br>";

    $nome = "wenderson";
    echo $nome . "<br>";

    define("PI", 3.14);
    define("nomeEmpresa", "Octopus Fx");

    $resultado = PI * 3;
    echo $resultado . "<br>";
    echo "Nome da empresa: " . nomeEmpresa . "<br>";

    $x = 3 + 5;
    $x = 3 - 5;
    $x = 3 * 5;
    $x = 16 / 5;
    $x = 16 % 5;

    $x = 3;
    $x ++;
    echo $x . "<br>";
    
    $x = 3;
    ++$x;
    echo $x . "<br>";

    $x = 3;
    $y = 1 + $x++;
    echo "x = " . $x . " e y = " . $y . "<br>";
    
    $x = 3;
    $y = 1 + ++$x;
    echo "x = " . $x . " e y = " . $y . "<br>";

    $x = 3;
    $x += 5;
    echo $x . "<br>";

    // ARREDONDAMENTO DE NUMEROS
    echo round(5.5, 0, PHP_ROUND_HALF_DOWN) . "<br>"; // arredondando para baixo
    echo round(5.5, 0, PHP_ROUND_HALF_UP) . "<br>"; // arredondando para cima
    echo round(5.5, 0, PHP_ROUND_HALF_EVEN) . "<br>"; // arredondando para o proximo numero par

    // comandos de decisao
    if("wenderson" == "wen" . "derson"){
        echo "condicao foi aceita <br>";
    } else{
        echo "negado <br>";
    }

    $x = 5;

    if($x < 5 && ++$x < 4){
        echo "a condicao foi aceita <br>";
    } else {
        echo "negado!! <br>";
    }
    echo $x . "<br>";

    // short if
    $x = 10 / 2 == 5 ? "é cinco <br>" : "nao é cinco <br>"; // ? é referente a caso a condicao seja verdadeira. : é referente a caso a condicao não ser aceita.
    echo $x;

    // no exemplo abaixo, vai ser lida apenas a primeira operacao para determinada condicao. com isso, podendo omitir os parenteses
    if( 2 == 2)
        echo "operacao 1 <br>";
    else
        echo "operacao 2 <br>";


    $i= 1;
    switch($i){

        case 0:
            echo "o valor de i é 0 <br>";
            break;
        
        case 1:
            echo "o valor de i é 1 <br>";
            break;
        
        default:
            echo "nenhum <br>";
            break;
    }
    for($i = 0; $i < 10; $i++){
        if($i == 5){
            break; // caso o valor 5 seja encontrado dentro do laço for, é feita a saida do laço, dando continuidade na execução do codigo abaixo.
            // exit(); apos encontrar o valor 5 dentro do laço for, a execução do arquivo php é interrompida.
            // continue; apos encontrar o valor 5 dentro do laço for, a execução do laço é abortada, ignorando o valor 5 e dando continuidade com seus sucessores.
        }
        echo $i . " ";
    }
    echo "<br>";

    $i = 0;
    while($i < 5){
        echo $i . " ";
        $i ++;
    }

    echo "<br>";

    $i = 0;
    do{
        echo $i . " ";
        $i++;
    }while($i < 10 );
    echo "<br>";


    echo $_SERVER["SERVER_ADDR"] . "<br>"; // endereco do servidor
    echo $_SERVER["SERVER_NAME"] . "<br>"; // nome do servidor
    echo $_SERVER["HTTP_USER_AGENT"] . "<br>"; // detalhes do navegador
    echo $_SERVER["REMOTE_ADDR"] . "<br>"; // ip do usuario
















    ?>



</body>

</html>