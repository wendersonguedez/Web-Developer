<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datas e Funções Especiais</title>
</head>

<body>
    <?php
    /* O QUE É UM TIMESTAMP?
    TIMESTAMP é uma unidade de medida baseada em segundos. Todas as funções de data e hora tem como base a diferença em segundos da Era Unix, que é uma data especial para alguns programadores e é
    representada pela data de 01/01/1970 às 00:00:00. Ou seja, quando você captura o tempo do momento atual em php atraves da função time(), ele retorna o numero de segundos que já se passaram desde
    a Era Unix. Com esse dado retornado, você pode manipular esses dados (formatando ele) e apresentar da forma que desejar */

    // o comando time() retorna o timestamp Unix atual
    $agora = time();
    echo $agora . "<br>";

    // o comando date() possibilita a formatação de dados do tipo timestamp. o 1º parametro é como você vai apresentar os dados, podendo ser no formato americano (aaaa-mm-dd 00:00:00) ou brasileiro
    // o 2º parametro é o timestamp que será manipulado. se você omitir, será capturado o timestamp atual do servidor.
    echo date("Y-m-d H:i:s", time()) . "<br>";
    echo date("Y-m-d H:i:s") . "<br>";
    echo date("d-m-Y H:i:s") . "<br>";
    echo date("Y") . "<br>";

    // o comando strtotime() faz a interpretação de qualquer descrição (em texto) de data e hora para ser aplicado no timestamp base. o 1º parametro é a descrição que sera aplicada. e o 2º parametro é o timestamp base.
    $novotimestamp = strtotime("+ 1 day", time());
    echo date("d-m-Y H:i:s", $novotimestamp) . "<br>";
    // MAIS EXEMPLOS DE strtotime()
    echo date("d-m-Y H:i:s", strtotime("+ 8 day", time())) . "<br>";
    echo date("d-m-Y H:i:s", strtotime("next monday", time())) . "<br>";
    echo date("d-m-Y H:i:s", strtotime("last friday", time())) . "<br>";
    echo date("d-m-Y H:i:s", strtotime("+ 1 month", time())) . "<br>";
    echo date("d-m-Y H:i:s", strtotime("+ 10 hour", time())) . "<br>";
    echo date("d-m-Y H:i:s", strtotime("+ 1 week", time())) . "<br>";

    // o comando mktime() vai retornar o timestamp de determinada data. o parametro que precisa ser passado, consequecutivamente é (hora, minuto, segundo, mes, dia, ano).
    $timestampqlqr = mktime(0, 0, 0, 1, 1, 2000) . "<br>";
    echo $timestampqlqr;
    echo date("d/m/Y H:i:s", $timestampqlqr) . "<br>";

    // o comando checkdate() vai verificar se uma determinada data existe. o 1º parametro é a data em questão, tendo seus valores respectivamente (mês, dia, ano). o valor de retorno é do tipo booleano.
    $data1 = checkdate(2, 15, 2020);
    if ($data1 == TRUE) {
        echo "A data1 existe! <br>";
    } else {
        echo "A data1 não existe! <br>";
    }

    $data2 = checkdate(22, 15, 2020);
    if ($data == TRUE) {
        echo "A data2 existe! <br>";
    } else {
        echo "A data2 não existe! <br>";
    }

    #EXEMPLO PARA DIFERENÇA ENTRE DATAS
    $data1 = mktime(0, 0, 0, 11, 29, 2020);
    $data2 = mktime(0, 0, 0, 12, 31, 2020);

    $difsegundos = $data2 - $data1;
    echo "A diferença em segundos: " . $difsegundos . "<br>";

    #PARA CALCULAR A DIFERENÇA EM MINUTOS, SERÁ FEITA A DIVISÃO DOS SEGUNDOS POR 60, POIS 1 MINUTO TEM 60 SEGUNDOS
    $difminutos = ($data2 - $data1) / 60;
    echo "Diferença em minutos: " . $difminutos . "<br>";

    #PARA CALCULAR A DIFERENÇA EM HORAS, SERÁ FEITA A DIVISÃO DOS MINUTOS POR 60, POIS 1 HORA TEM 60 MINUTOS.
    $difhoras = ($data2 - $data1) / 60 / 60;
    echo "Diferença em horas: " . $difhoras . "<br>";

    #PARA CALCULAR A DIFERENÇA EM DIAS, SERÁ FEITA A DIVISÃO DAS HORAS POR 24, POIS 1 DIA TEM 24 HORAS.
    $difdias = ($data2 - $data1) / 60 / 60 / 24;
    echo "Diferença em dias: " . $difdias . "<br>";



    ?>
</body>

</html>